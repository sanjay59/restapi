<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
		.swal2-container.swal2-backdrop-show, .swal2-container.swal2-noanimation {
      background: rgb(255 255 255 / 80%) !important;
    }
    .swal2-popup {
      background: #da4040;
      width: 28em !important;
     /* background-co: url({{url('orient-electric/images/main-background.png')}}) center no-repeat !important;
      background-size: cover !important;*/
    }
    /*.swal2-icon{width: 40px !important;height: 40px !important;border-color: #fff !important;
      color: #fff !important;border-width: 2px !important;}
      .swal2-icon .swal2-icon-content{font-size:30px !important;}
      .swal2-title{font-size:16px !important;font-weight:400 !important;
        color: #ffffff !important;}
        .swal2-styled.swal2-confirm{font-size:13px !important;border:none !important;outline: none !important;background:#a02d32 !important;}*/
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xl-6 justify-center">
				<form method="post" action="{{url('save-user')}}">
					@csrf
					<div class="form-group">
						<label for="exampleInputEmail1">Name</label>
						<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			
		</div>
	</div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	 @if ($message = Session::get('msg'))
        <script>

          swal.fire({
            title: "{{$message}}",
            icon: "warning",
            button: "OK",
          });
        </script>
        @endif
</body>
</html>