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

        <div id="fdk" style="display:none">
          <a class="close" data-dimiss="alert" aria-hidden="true">&times;</a>
          <span id="msg"></span>
        </div>


        <form id="login_form" action="{{ URL::to('user/login')}}" method="POST">
          <!--Email-->
          <div class="form-group">
            <label for="inputEmail">Username </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
           </div>

           <div class="form-group">
             <label for="inputPassword">Password </label>
             <input type="password" class="form-control" name="password" id="password" placeholder="Password">
           </div>

           <div class="">
             <button type="button" id="sign_in" name="button">Sign In</button>
             <button type="reset" name="button">Reset</button>

           </div>

        </form>

            <img src="img/loading.gif" alt="" style="display:none" id="loader" class="pull-right"/>



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


      function redirect(url){
        window.location = url;

      }



        $(document).ready(function(){
            $('#loader').hide();


            $('#sign_in').on('click',function(){

                var login_form = $('#login_form').serializeArray(); // ("name"= "username", "value": "")
                var url         = $('#login_form').attr('action');

                //alert(url);
              loader('on');
               $.post(url, login_form,function(data){
                    //alert(data);
                    loader('off');

                    if(data =="fail"){
                      $('#fdk').addClass('alert alert-danger').fadeIn(1000, function(){
                          $(this).hide();
                      });
                      $('#msg').text('Invalid User');

                      $.each(login_form, function(i,k){
                          $('#' + k.name).val('');
                      });


                    }

                    else {

                      $('#fdk').addClass('alert alert-success').fadeIn(3000, function(){
                          $(this).hide();
                      });
                      $('#msg').text('Successfuly logged in .... redictecting  ');
                      //redirect('dashboard');

                    }

               });



            });
        });
      </script>


  </body>
</html>
