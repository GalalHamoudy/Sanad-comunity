// ######################## profile ################################################
    // ---------------------------------------------------------------------------
    function See($id_post, $id_user) {
        $.ajax({
            method: 'POST',
            url: "ajax/see.php",
            data: {
                id_post: $id_post,
                id_user: $id_user,
            },
            success: function(){
                profile_posts();
                index_posts();
                post_post();
                friend_posts();
            },
            error: function (xhr, status, error) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: 'حدث خطا اثناء التفاعل'
                })
                
            }
        });


    }
    // ---------------------------------------------------------------------------
    function delete_story($id_story, $id_user) {
        $.ajax({
            method: 'POST',
            url: "ajax/delete_story.php",
            data: {
                id_story: $id_story,
                id_user: $id_user,
            },
            success: function (data, status, xhr) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'تم الحذف بنجاح'
                })
                profile_story();
            },
            error: function (xhr, status, error) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: 'حدث خطا اثناء الحذف'
                })
            }
        });
    }
    // ---------------------------------------------------------------------------
    function delete_post($id_post, $id_user_post) {
        $.ajax({
            method: 'POST',
            url: "ajax/delete_post.php",
            data: {
                id_post: $id_post,
                id_user_post: $id_user_post,
            },
            success: function (data, status, xhr) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'تم الحذف بنجاح'
                })
                profile_posts();
            },
            error: function (xhr, status, error) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: 'حدث خطا اثناء الحذف'
                })
            }
        });
    }
        // ---------------------------------------------------------------------------
    function delete_post_re($id_post, $id_user_post) {
        $.ajax({
            method: 'POST',
            url: "ajax/delete_post_re.php",
            data: {
                id_post: $id_post,
                id_user_post: $id_user_post,
            },
            success: function (data, status, xhr) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'تم الحذف بنجاح'
                })
                profile_posts();
            },
            error: function (xhr, status, error) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: 'حدث خطا اثناء الحذف'
                })
            }
        });
    }
    // ---------------------------------------------------------------------------
    function profile_story() {
        $.ajax({
            url: "ajax/profile_story.php",
            success: function (data, status, xhr) {
                $('#profile_story').html(xhr.responseText)
            }
        });
    }
    // ---------------------------------------------------------------------------
    function profile_posts() {
        $.ajax({
            url: "ajax/profile_posts.php",
            success: function (data, status, xhr) {
                $('#profile_posts').html(xhr.responseText)
            }
        });
    }
    // ---------------------------------------------------------------------------

    // ######################## index ################################################
    // ---------------------------------------------------------------------------
    function index_story() {
        $.ajax({
            url: "ajax/index_story.php",
            success: function (data, status, xhr) {
                $('#index_story').html(xhr.responseText)
            }
        });
    }
    // ---------------------------------------------------------------------------
    function index_posts() {
        $.ajax({
            url: "ajax/index_posts.php",
            success: function (data, status, xhr) {
                $('#index_posts').html(xhr.responseText)
            }
        });
    }
    // ---------------------------------------------------------------------------

    // ######################## post ################################################
    // ---------------------------------------------------------------------------
    function post_post() {
        $.ajax({
            url: "ajax/post_post.php",
            success: function (data, status, xhr) {
                $('#post_post').html(xhr.responseText)
            }
        });
    }
    // ---------------------------------------------------------------------------
    function show_comments(){
        $.ajax({
            url: "ajax/show_comments.php",
            success: function (data, status, xhr) {
                $('#show_comments').html(xhr.responseText)
            }
        });
    }
    // ######################## friend ################################################
    // ---------------------------------------------------------------------------
    function friend_posts() {
        $.ajax({
            url: "ajax/friend_posts.php",
            success: function (data, status, xhr) {
                $('#friend_posts').html(xhr.responseText)
            }
        });
    }
    // ---------------------------------------------------------------------------
    function friend_story(){
        $.ajax({
            url: "ajax/friend_story.php",
            success: function (data, status, xhr) {
                $('#friend_story').html(xhr.responseText)
            }
        });
    }


    // ######################## login ################################################
    // ---------------------------------------------------------------------------
    function login(){
        $("#login_form").submit(function(e){
            e.preventDefault();
          });
        $.ajax({
                method: 'POST',
                url: "ajax/login.php",
                data: {
                    login_id:$('#login_id').val(),
                    login_pass:$('#login_pass').val(),
                     },
                     success: function(data, status, xhr){
                        if(xhr.responseText == 'true'){
                            // -------------------------
                            let timerInterval
                            Swal.fire({
                            title: 'تم تسجيل الدخول بنجاح',
                            html: 'سيتم تحويلك للصفحة الشخصية بعد <b></b> .',
                            timer: 2000,
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                    b.textContent = Swal.getTimerLeft()
                                    }
                                }
                                }, 100)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                window.location.href = "profile.php";
    
                            }
                            })
                            // ------------------------------
                        }else{
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                                icon: 'error',
                                title: 'بيانات المستخدم غير صحيحة '
                            })
                        }
                     },
                     error: function(){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                                icon: 'error',
                                title: 'حدث خطا اثناء تسجيل الدخول '
                            })
                     }
            });
    
    
    }
    // ---------------------------------------------------------------------------


    // ######################## Post ################################################
    // ---------------------------------------------------------------------------
    function getFile() {
        document.getElementById("upfile").click();
      }

      function sub(obj) {
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];

        event.preventDefault();
      }

      $(document).ready(function (e) {
        $("#uploadForm").on('submit', (function (e) {
          e.preventDefault();
          var form = new FormData(this);
          form.append('text_post', $('#text_post').val());
          form.append('id_post', $('#id_post').val());


          $.ajax({
            url: "ajax/post.php",
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data, status, xhr) {

              if (xhr.responseText == "good_text") {
                show_comments();
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-start',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'success',
                  title: 'تم التعليق بنجاح'
                })
                $('#text_post').val('');
              }
              if (xhr.responseText == "good_img") {
                show_comments();
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-start',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'success',
                  title: 'تم التعليق واضافة الصورة بنجاح'
                })
                $('#text_post').val('');
              }
              if (xhr.responseText == "") {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-start',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })
                Toast.fire({
                  icon: 'error',
                  title: 'لايمكنك نشر نعليق فارغ'
                })
              }
              if (xhr.responseText == "img_error") {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-start',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })
                Toast.fire({
                  icon: 'error',
                  title: 'هذه الصورة لاتتوافق مع سياسات الموقع'
                })
              }
            },
            error: function () {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: 'error',
                title: 'حدث خطا اثناء التعليق'
              })
            }
          });
        }));
      });
    // ---------------------------------------------------------------------------

    // ######################## add_Post ################################################
    // ---------------------------------------------------------------------------
    function getFile() {
        document.getElementById("upfile").click();
    }

    function sub(obj) {
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
        document.myForm.submit();
        event.preventDefault();
    }

    // ---------------------------------------------------------------------------




    // ######################## Chat ################################################
    // ---------------------------------------------------------------------------
    setInterval(function(){
        online();
        chats();
    }, 5000)
    function online() {
        $.ajax({
            url: "ajax/online.php",
            success: function (data, status, xhr) {
            }
        });
    }
    function chats() {
        $.ajax({
            url: "ajax/chats.php",
            success: function (data, status, xhr) {
                $('#chats').html(xhr.responseText)
            }
        });
    }
    function send_chat() {
        $.ajax({
            url: "ajax/send_chat.php",
            method: 'Post',
            data: {
                text: $('#text').val(),
                help_id: $('#help_id').val()
            },
            success: function (data, status, xhr) {
                $('#text').val('');
                chat();
            }
        });
    }
    function id_chat($id = $('#help_id').val()) {
        $('#help_id').val($id)
        $.ajax({
            url: "ajax/id_chat.php",
            method: 'Post',
            data: {
                id: $id,
            },
            success: function (data, status, xhr) {
                $('#id_chat').html(xhr.responseText)
            }
        });
    }