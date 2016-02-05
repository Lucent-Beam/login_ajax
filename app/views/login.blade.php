<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.js">

    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
      <div class="col-md-3">

      </div>

      <div class="col-md-6">
        <br>
        <h3>Login</h3>
        <form id="login_form" action="{{ URL::to('user/login')}}" method="post">
          <!--Email-->
          <div class="form-group">
            <label for="inputEmail">Username </label>
            <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Username">
           </div>

           <div class="form-group">
             <label for="inputPassword">Password </label>
             <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
           </div>

           <div class="">
             <button type="button" id="sign_in" name="button">Sign In</button>
             <button type="reset" name="button">Reset</button>

           </div>

        </form>
        <div type="hidden" id="loader">
            <label for="">Cargando</label>
        </div>


      </div>


      <div class="col-md-3">

      </div>



      <script type="text/javascript">

      function loader(v){
        if (v == 'on'){
            $('#login_form').css({
              opacity : 0.2

            });

            $('#loader').show();
            }
            else {
                $('#login_form').css({
                  opacity : 1

                });
              $('#loader').hide();

            }

      }



        $(document).ready(function(){
            $('#loader').hide();
            $('#sign_in').on('click',function(){

                loader('on');

                var login_form = $('#login_form').serializeArray(); // ("name"= "username", "value": "")
                var url         = $('#login_form').attr('action');

                alert(url);

               $.post(url, login_form,function(data){



               });



            });
        });
      </script>


  </body>
</html>
