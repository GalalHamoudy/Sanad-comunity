URL = window.URL || window.webkitURL;

var gumStream; 						
var rec; 							
var input; 							


var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext 

var recordButton = document.getElementById("recordButton");
var stopButton 	= document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");
var news 		= document.getElementById("news");
var where_type 	= document.getElementById("where_type").getAttribute('value');



//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
	news.innerHTML = "تم الضغط علي التسجيل الصوتي";

	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/
    
    var constraints = { audio: true, video:false }

 	/*
    	Disable the record button until we get a success or fail from getUserMedia() 
	*/

	recordButton.disabled = true;
	stopButton.disabled = false;
	pauseButton.disabled = false

	/*
    	We're using the standard promise based getUserMedia() 
    	https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		// console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		console.log('where_type');

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device

		*/
		audioContext = new AudioContext();

		//update the format 
		document.getElementById("formats").innerHTML="  التنسيق: القناة الاولي pcm @ "+audioContext.sampleRate/1000+"kHz"

		/*  assign to gumStream for later use  */
		gumStream = stream;
		
		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/* 
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input,{numChannels:1})

		//start the recording process
		rec.record()

		news.innerHTML = '<i class="zmdi zmdi-mic"></i> تم بدا التسجيل الصوتي ...';

	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
    	recordButton.disabled = false;
    	stopButton.disabled = true;
    	pauseButton.disabled = true
	});
}

function pauseRecording(){
	// console.log("pauseButton clicked rec.recording=",rec.recording );
	if (rec.recording){
		news.innerHTML = '<i class="zmdi zmdi-info"></i> تم ايقاف التسجيل الصوتي مؤقتا';
		//pause
		rec.stop();
		pauseButton.innerHTML='<i class="zmdi zmdi-play"></i> استمرار';
	}else{
		news.innerHTML = ' <i class="zmdi zmdi-mic"></i> تم استئناف التسجيل الصوتي ...';
		//resume
		rec.record()
		pauseButton.innerHTML='<i class="zmdi zmdi-pause"></i> ايقاف مؤقت';

	}
}

function stopRecording() {
	news.innerHTML = ' <i class="zmdi zmdi-cloud-done"></i> تم الانتهاء من التسجيل الصوتي';

	//disable the stop button, enable the record too allow for new recordings
	stopButton.disabled = true;
	recordButton.disabled = false;
	pauseButton.disabled = true;

	//reset button just in case the recording is stopped while paused
	pauseButton.innerHTML='<i class="zmdi zmdi-pause"></i> ايقاف مؤقت';
	
	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
	
	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var li = document.createElement('tr');
	var th1 = document.createElement('th');
	var th2 = document.createElement('th');
	var th3 = document.createElement('th');
	var th4 = document.createElement('th');
	// var th5 = document.createElement('th');
	var link = document.createElement('a');

	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;

	//save to disk link
	link.href = url;
	link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	link.innerHTML = "التحميل الي الجهاز";

	//add the new audio element to li
	th1.appendChild(au);
	li.appendChild(th1);
	
	//add the filename to the li
	th2.appendChild(document.createTextNode(filename+".wav "));
	li.appendChild(th2);

	//add the save to disk link to li
	th3.appendChild(link);
	li.appendChild(th3);


	console.log(where_type);
	if(where_type == 're_comment'){
		//upload link
		var upload = document.createElement('a');
		upload.href="#";
		upload.innerHTML = "رفع التسجيل الصوتي";
		upload.addEventListener("click", function(event){
			var xhr=new XMLHttpRequest();
			xhr.onload=function(e) {
				if(this.readyState === 4) {
					//   console.log("Server returned: ",e.target.responseText);
				}
			};
			var fd=new FormData();
			fd.append("audio_data",blob, filename);
			xhr.open("POST","upload_re_com.php",true);
			xhr.send(fd);
		})
		li.appendChild(document.createTextNode (" "))//add a space in between
		th4.appendChild(upload)//add the upload link to li
		li.appendChild(th4)//add the upload link to li

		//add the li element to the ol
		recordingsList.appendChild(li);
	}else{
		//upload link
		var upload = document.createElement('a');
		upload.href="#";
		upload.innerHTML = "رفع التسجيل الصوتي";
		upload.addEventListener("click", function(event){
			var xhr=new XMLHttpRequest();
			xhr.onload=function(e) {
				if(this.readyState === 4) {
					//   console.log("Server returned: ",e.target.responseText);
				}
			};
			var fd=new FormData();
			fd.append("audio_data",blob, filename);
			xhr.open("POST","upload_re.php",true);
			xhr.send(fd);
		})
		li.appendChild(document.createTextNode (" "))//add a space in between
		th4.appendChild(upload)//add the upload link to li
		li.appendChild(th4)//add the upload link to li

		//add the li element to the ol
		recordingsList.appendChild(li);
	}

}