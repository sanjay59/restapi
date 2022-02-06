<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Research</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	 <link href="{{url('assets')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('assets')}}/css/custom.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('assets')}}/css/style.min.css" rel="stylesheet" type="text/css"/>

  <script src="{{url('assets')}}/js/jquery.min.js" type="text/javascript"></script>
	<style>
	.container{padding-top:60px;}
	h5{font-size:30px;font-weight:600;}
	.search-form .form-control,.search-form .btn{height:50px !important;font-size:14px !important;}
	.search-form .form-control{width:400px;padding:10px 20px !important;}
	.search-form .btn{font-weight:500;padding:0 40px !important;}
	@media(max-width:575px){
		.search-form .form-control{width:100%;}
	}
</style>
</head>
<body>

<div class="container">
	<h5 class="text-center mb-4 mb-sm-5">WOW Research</h5>
	<div class="search-form d-sm-flex w-100 justify-content-center">
		<div class="form-group">
			<input type="text" placeholder="Write Any Keyword" class="form-control search-input">
			<span class="error-msg text-danger search-error"></span>
		</div>
		<div class="form-group ml-sm-3">
			<button type="button" class="btn search-btn text-uppercase">Search</button>
		</div>
	</div>
</div>
<script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
	<script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>