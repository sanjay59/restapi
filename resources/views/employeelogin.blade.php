<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8"/>
  <title>Team Login</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="description"/>
  <meta content="" name="author"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="{{url('assets')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('assets')}}/css/custom.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('assets')}}/css/style.min.css" rel="stylesheet" type="text/css"/>

  <script src="{{url('assets')}}/js/jquery.min.js" type="text/javascript"></script>

</head>
<body>
  <div class="container">
    <div class="row h-100vh align-items-center">
      <div class="col-lg-5 mx-auto">
       <form class="login-form" id="loginForm" action="{{url('/check-employee')}}"  method="post">
        @csrf
        <h3 class="form-title">Login in to Your Account</h3>
        <div class="form-group">
          <div class="d-flex">
             <div class="input-radio mr-4">
              <input type="radio" name="role" id="team" value="1" @if(old('role')=='1')  @endif checked="">
              <label for="team" class="mb-0">Creative</label>
            </div>
            <div class="input-radio mr-4">
              <input type="radio" name="role" id="vendor" value="2"  @if(old('role')=='2')  @endif>
              <label for="vendor" class="mb-0">Ops & Production</label>
            </div>
            <div class="input-radio mr-4">
              <input type="radio" name="role" id="admin" value="3"  @if(old('role')=='3')  @endif>
              <label for="admin" class="mb-0">Admin</label>
            </div>
            

          </div>
        </div>
          <div class="form-group">
            <input  type="email" name="email" placeholder="Email ID" id="email" value="{{old('email')}}" class="form-control" required="">
            <span class="error-msg text-danger email-error" ></span>
          </div>
          <div class="form-group">
            <input type="password" name="password" placeholder="Password" id="password" value="{{old('email')}}" class="form-control" required="">
            <span class="error-msg text-danger password-error"></span>
          </div>
          <button type="submit" class="btn mt-0 text-uppercase" id="login-btn">Login</button>
        </form>
        <script>
          $(document).ready(function(){
            $('#admin').change(function(){
              var checked = $('#admin').is(':checked');
              if(checked){
                $('#loginForm').attr('action','{{url('/check-admin')}}');
              }
              else{
                $('#loginForm').attr('action','{{url('/check-employee')}}');
              }
            })  
          });
          $(document).ready(function(){
            $('#team').change(function(){
              var checked = $('#team').is(':checked');
              if(checked){
                $('#loginForm').attr('action','{{url('/check-employee')}}');
              }
              else{
                $('#loginForm').attr('action','{{url('/check-admin')}}');
              }
            })  
          });
          $(document).ready(function(){
            $('#vendor').change(function(){
              var checked = $('#vendor').is(':checked');
              if(checked){
                $('#loginForm').attr('action','{{url('/check-productuser')}}');
              }
              else{
                $('#loginForm').attr('action','{{url('/check-employee')}}');
              }
            })  
          });
        </script>
        @if ($message = Session::get('check'))
        <div class="alert alert-danger position-relative mb-0 mt-3 border-0" role="alert">
          {{$message}}
        </div>
        @endif
        @if ($message = Session::get('checkuser'))
        <div class="alert alert-danger position-relative mb-0 mt-3 border-0" role="alert">
          {{$message}}
        </div>
        @endif
      </div>
    </div>
  </div>


  <script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
  <script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>

  <script>
    $('#login-btn').click(function(){
     var email = $('#email').val();
     var password = $('#password').val();

     if(email == '')  
     {  
      $('.email-error').html('Email ID is required'); 
    }else{
      $('.email-error').html(''); 

    }
    if(password == '')  
    {  
      $('.password-error').html('Password is required'); 
    }else{
      $('.password-error').html(''); 

    } 
    if(email=='' && password==''){
      return false;
    }
  });
</script>

</body>
</html>