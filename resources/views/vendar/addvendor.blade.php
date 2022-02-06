<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8"/>
	<title></title>

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
<body class="page-header-fixed    page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">


	<div class="page-header page-main-header navbar navbar-fixed-top h-auto">
		<div class="page-header-inner px-0">
			<div class="page-top w-100 px-0 d-flex h-auto">
				@include('vendar/navbar')
			</div>
		</div>
	</div>
	<div class="clearfix"></div>


	<div class="page-container">
		<div class="page-content-wrapper mb-5 pb-5">
			<div class="container">
				<div class="row">

					<div class="col-lg-11 col-xl-9 mx-auto">
						<h5 class="py-4 mb-0 text-center">Add Vendor</h5>

						<div class="comman-modal">
							<form id="vendorform" action="{{url('save-vender')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-4 form-group">
										<label>Event Name</label>
										<select name="evt_id" id="evt_id" class="form-control"/>
										<option value="" selected>Select Event</option>
										@foreach($getevent as $e)
										<option {{ old('vcat_id') == $e->id ? "selected" : "" }} value="{{$e->id}}" >{{$e->name}}</option>
										@endforeach
									</select>
										<span class="error-msg event_error text-danger"></span>
									</div>
									<div class="col-md-4 form-group">
										<label>Category</label>
										<select name="vcat_id" id="vcat_id" class="form-control"/>
										<option value="" selected>Select Category</option>
										@foreach($cat as $c)
										<option {{ old('vcat_id') == $c->id ? "selected" : "" }} value="{{$c->id}}" >{{$c->name}}</option>
										@endforeach
									</select>
									<span class="error-msg vcat_id_error text-danger"></span>
								</div>
								<!-- <div class="col-md-4 form-group d-none">
									<label>Check Company Name</label>
									<select id="cc_name" class="form-control">
										@foreach($v_id as $v)
										<option value="{{$v->vcat_id}}">{{$v->company_name}}</option>
										@endforeach
									</select>
									<span class="error-msg vcat_id_error text-danger"></span>
								</div> -->
								<div class="col-md-4 form-group answer">
									<label>Company Name</label>
									<input type="text" name="company_name" id="company_name" class="form-control" value="{{old('company_name')}}" required="" >
									<span class="error-msg vc_name_error text-danger "></span>
									<span class="error-msg text-danger" id="check_company_name"></span>
									@if($message=Session::get('checkcom'))
									<span class="error-msg text-danger" id="flashmsg">{{$message}}</span>
									@endif
								</div>

								<div class="col-md-4 form-group">
									<label>Contact Person Name</label>
									<input type="text" name="contact_no" id="contact_no" class="form-control" value="{{old('contact_no')}}" required="">
									<span class="error-msg vcno_name_error text-danger "></span>
								</div>

								<div class="col-md-4 form-group">
									<label>Email</label>
									<input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required="">
									<span class="error-msg email_error text-danger"></span>
									<span class="error-msg text-danger" id="check_email"></span>
									@if($message=Session::get('checkemail'))
									<span class="error-msg text-danger" id="flashemail">{{$message}}</span>
									@endif
								</div>

								<div class="col-md-4 form-group">
									<label>Mobile</label>
									<input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{old('mobile_no')}}" required="">
									<span class="error-msg mobile_no_error text-danger"></span>
								</div>

								<div class="col-md-3 form-group">
									<label>City</label>
									<input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" required="">
									<span class="error-msg city_error text-danger"></span>

								</div>

								<div class="col-md-3 form-group">
									<label>Country</label>
									<input type="text" name="country" id="country" class="form-control" value="{{old('country')}}" required="">
									<span class="error-msg country_error text-danger"></span>

								</div>

								<div class="col-md-6 form-group">
									<label>Website</label>
									<input type="text" name="website" id="website" class="form-control" value="{{old('website')}}" required="">
									<span class="error-msg website_error text-danger"></span>

								</div>

								<div class="col-md-6 form-group">
									<label>GST No.</label>
									<input type="text" name="gst_no" id="gst_no" class="form-control" value="{{old('gst_no')}}" required="">
									<span class="error-msg gst_no_error text-danger"></span>

								</div>

								<div class="col-md-6 form-group">
									<label>PAN No.</label>
									<input type="text" name="pan_no" id="pan_no" class="form-control" value="{{old('pan_no')}}" maxlength="10"  required="">
									<span class="error-msg" id="checkpanno"></span>
									<span class="error-msg pan_no_error text-danger"></span>
									<span class="error-msg text-danger" id="check_pan_no"></span>
									@if($message=Session::get('checkpan'))
									<span class="error-msg text-danger">{{$message}}</span>
									@endif

								</div>

								<div class="col-md-12 form-group">
									<label>Billing Address</label>
									<textarea name="address" id="address" class="form-control" required="">{{old('address')}}</textarea>
									<span class="error-msg address_error text-danger"></span>

								</div>

							</div>

							<div class="position-fixed fix-button py-3 bg-white text-center">
								<div class="container">
									<button type="submit" id="vendorform2" class="btn mt-0 w-auto">Submit</button>
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
<script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var minLength = 10;
	var maxLength = 10;

	$("#pan_no").on("keydown keyup change", function(){
		$('.pan_no_error').hide();
		var pan_no = $('#pan_no').val();
		if (pan_no.length < minLength){
			$("#checkpanno").removeClass("text-success");
			$("#checkpanno").addClass("text-danger");
			$(".pan_no_error").html('');
			$("#checkpanno").text("PAN No. is 10 digit");
		}
		else if (pan_no.length > maxLength){
			$("#checkpanno").removeClass("text-success");
			$("#checkpanno").addClass("text-danger");
			$("#checkpanno").text("PAN No. is 10 digit");
			$(".pan_no_error").html('');

		}else{
			$("#checkpanno").removeClass("text-danger");
			$("#checkpanno").addClass("text-success");
			$("#checkpanno").text("");
			$(".pan_no_error").html('');

		}
		if(pan_no!=''){
    	$.ajax({
    		url: `{{url('check-pan-no')}}/${pan_no}`,
    		type: "GET",
    		success: function(response) {
    			if(response.pan_no==pan_no){
    			$('#check_pan_no').html('PAN No. already exist.');
    		}else{
    			$('#check_pan_no').html('');
    		}
    		}
    	});
    }
    else{
		$('#check_pan_no').html('');
		$('.pan_no_error').show();
    }
	});

</script>
<script type="text/javascript">
	$("#company_name").on("keyup", function(){
		$('#flashmsg').hide();
		$('.vc_name_error').hide();
		var catid_check = $('#vcat_id').val();
		// alert(catid_check);
		var company_name = $('#company_name').val();
    // console.log(_url);
    if(company_name!='' && catid_check!=''){
    	$.ajax({
    		url: `{{url('check-company-name')}}/${catid_check}`,
    		type: "GET",
    		success: function(response) {
    			if(response.company_name==company_name){
    			$('#check_company_name').html('This category company is already exist.');
    		}else{
    			$('#check_company_name').html('');
    		}
    		}
    	});
    }
    else{
		$('#check_company_name').html('');
		$('.vc_name_error').show();
    }
});
</script>
<script type="text/javascript">
	$("#email").on("keyup", function(){
		$('#flashemail').hide();
		$('.email_error').hide();
		var email = $('#email').val();
		// alert(email);
    if(email!=''){
    	$.ajax({
    		url: `{{url('check-email')}}/${email}`,
    		type: "GET",
    		success: function(response) {
    			if(response.email==email){
    			$('#check_email').html('Email already exist.');
    		}else{
    			$('#check_email').html('');
    		}
    		}
    	});
    }
    else{
		$('#check_email').html('');
		$('.email_error').show();
    }
});
</script>

<script type="text/javascript">
	function valueChanged()
	{
		var catid_check = $('#vcat_id').val();
		var theValue = $('#vcat_id').val();
		$('option[value=' + theValue + ']')
		.attr('selected',true);
		var vid_check = $('#cc_name').val();
		if (catid_check == vid_check){
			$(".answer").html("<label>Company Name</label><select name='vcat_id' id='vcat_id' class='form-control'>@foreach($v_id as $v)<option value='{{$v->vcat_id}}''>{{$v->company_name}}</option>@endforeach</select>");
			$('option[value=' + theValue + ']').attr('selected',true);
		}else
		$(".answer").html("<label>Company Name</label><input type='text' name='company_name' id='company_name' class='form-control' value='{{old('company_name')}}' required=''><span class='error-msg vc_name_error text-danger '></span>");
	}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
	$('#vendorform2').click( function () {

		var evt_id = $('#evt_id').val();
		var vcat_id = $('#vcat_id').val();
		var company_name = $('#company_name').val();
		var contact_no = $('#contact_no').val();
		var email = $('#email').val();
		var mobile_no = $('#mobile_no').val();
		var city = $('#city').val();
		var country = $('#country').val();
		var website = $('#website').val();
		var gst_no = $('#gst_no').val();
		var pan_no = $('#pan_no').val();
		var address = $('#address').val();
		$("#checkpanno").html('');

		if(evt_id == '')  
		{  
			$('.event_error').html('Event name is required'); 
		}  
		else{
			$('.event_error').html(''); 
		}
		if(vcat_id == '')  
		{  
			$('.vcat_id_error').html('Category is required');
		}  
		else{
			$('.vcat_id_error').html(''); 
		}
		if(company_name == '')  
		{  
			$('.vc_name_error').html('Company Name is required'); 
		}  
		else{
			$('.vc_name_error').html(''); 
		}
		if(contact_no == '')  
		{  
			$('.vcno_name_error').html('Contact person name is required'); 
		}  
		else{
			$('.vcno_name_error').html(''); 
		}
		if(email == '')  
		{  
			$('.email_error').html('Email is required'); 
		}  
		else{
			$('.email_error').html(''); 
		}
		if(mobile_no == '')  
		{  
			$('.mobile_no_error').html('Mobile no is required'); 
		}  
		else{
			$('.mobile_no_error').html(''); 
		}
		if(city == '')  
		{  
			$('.city_error').html('City is required'); 
		}  
		else{
			$('.city_error').html(''); 
		}

		if(country == '')  
		{  
			$('.country_error').html('Country is required'); 
		}  
		else{
			$('.country_error').html(''); 
		}
		if(pan_no == '')  
		{  
			$('.pan_no_error').html('PAN No is required'); 
		}  
		else{
			$('.pan_no_error').html(''); 
		}
		if(address == '')  
		{  
			$('.address_error').html('Address is required'); 
			return false;
		}  
		else{
			$('.address_error').html(''); 
		}

	});
</script>
</body>
</html>