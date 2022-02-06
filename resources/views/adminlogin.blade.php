<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8"/>
	<title>Admin Login</title>

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

				<form class="login-form" action ="{{url('/check-admin')}}" method="post">
                  @csrf
					<h3 class="form-title">Admin Login</h3>
					<div class="form-group">
						<input type="email" name="email" id="email" placeholder="Email ID" class="form-control">
						<span class="error-msg text-danger display email-error" ></span>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" placeholder="Password" class="form-control">
						<span class="error-msg text-danger password-error"></span>
					</div>
					<button type="submit" class="btn mt-0 text-uppercase" id="login-btn">Login</button>
				</form>
				@if ($message = Session::get('check'))
				<div class="alert alert-danger position-relative mb-0 mt-3 border-0" role="alert">
					Login detail is incorrect
				</div>
				@endif

				<!-- <div class="alert alert-success position-relative mb-0 mt-3 border-0" role="alert">
					Login Successfully
				</div> -->

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
      if(email=='' || password==''){
        return false;
      }
    });
  </script>

</body>
</html>