$(document).on('submit', '#form-login', function(event) {
        event.preventDefault();
        /* Act on the event */
        var un = $('#username').val();
        var pw = $('#password').val();
        $.ajax({
              url: 'data/user_login.php',
              type: 'post',
              dataType: 'json',
              data: {
                un:un,
                pw:pw
              },
              success: function (data) {
                // console.log(data);
                if(data.valid == true){
                  window.location = data.url;
                }else{
                  alert('Invalid Username / Password!');
                }
              },
              error: function(){
                alert('Error: Login.js L13+');
              }
            });//end a req
      });