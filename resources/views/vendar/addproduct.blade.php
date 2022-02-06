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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">


  <div class="page-header page-main-header navbar navbar-fixed-top h-auto">
    <div class="page-header-inner px-0">
      <div class="page-top w-100 px-0 d-flex h-auto">
       @include('vendar/navbar')
     </div>
   </div>
 </div>
 <div class="clearfix"></div>
<div class="row" style="top:10%;right: 2%;position: fixed;z-index: 999999999;">
        
      </div>

 <div class="page-container">

  <div class="page-content-wrapper mb-5 pb-5">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-8 mx-auto pt-4">
      @if($message=Session::get('addmsg'))
          <div class="alert alert-success alert-dismissible fade show position-relative border-0" role="alert" id="success_msg"> {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="color:#000;font-weight: 400">&times;</span>
  </button>
      </div>
      @endif
          <h5 class="mb-0 py-3 text-center">Add Product</h5>

         <div class="comman-modal">
          <form method="post" action="{{url('save-product')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">

              <div class="col-lg-7">
                <div class="row">
                  <div class="col-6 form-group">
                    <label>Category Name</label>
                    <select name="pcat_id" id="pcat_id" class="form-control" onchange="valueChanged()">
                      <option value="" selected>Select Category</option>
                      @foreach($cat_id as $c)
                      <option {{ old('pcat_id') == $c->id ? "selected" : "" }} value="{{$c->id}}">{{$c->name}}</option>
                      @endforeach
                    </select>
                    <span class="error-msg text-danger pcat_id_error"></span>
                  </div>
                  <div class="col-6 form-group">
                    <label>Company Name</label>
                    <select name="v_id" id="v_id" class="form-control" >
                      <option value="" vcatid="vnf" id="getcat">Select Company</option>
                    </select>
                    <span id="v_id_sh"></span>
                    <span class="error-msg text-danger v_id_error"></span>
                  </div>

                  <div class="col-12 form-group">
                    <label>Product/Service</label>
                    <select name="p_service" id="p_service" class="form-control">
                      <option value="" selected>Select Product/Service</option>
                      @foreach($vs_id as $s)
                      <option {{ old('p_service') == $s->id ? "selected" : "" }} value="{{$s->id}}">{{$s->name}}</option>
                      @endforeach
                    </select>
                    <span class="error-msg text-danger p_service_error"></span>
                  </div>

                  <div class="col-6 form-group">
                    <label>Cost Price</label>
                    <input type="text" name="p_price" id="p_price" value="{{ old('p_price')}}" class="form-control">
                    <span class="error-msg p_price_error text-danger"></span>
                  </div>

                  <div class="col-6 form-group">
                    <label>Payment Term</label>
                    <select name="payment_term" id="payment_term" class="form-control">
                      <option value="" selected>Select Term</option>
                      <option {{ old('payment_term') == "Day 0" ? "selected" : "" }} value="Day 0">Day 0</option>
                      <option {{ old('payment_term') == "Day 15" ? "selected" : "" }} value="Day 15">Day 15</option>
                      <option {{ old('payment_term') == "Day 30" ? "selected" : "" }} value="Day 30">Day 30</option>
                      <option {{ old('payment_term') == "Day 45" ? "selected" : "" }} value="Day 45">Day 45</option>
                    </select>
                    <span class="error-msg payment_term_error text-danger"></span>
                  </div>

                </div>
              </div>

              <div class="col-lg-5">
                <label>Image</label>
                <div class="form-group line-input">
                  <div class="upload-file d-flex align-items-center justify-content-center my-0">
                    <input type="file" name="image" id="p_file" class="form-control" id="file_upload">
                    <div>
                      <img src="{{url('assets')}}/images/img_icon.png">
                      <h4 class="mb-0">Drop Your Image Here</h4>
                    </div>
                  </div>
                </div>
                
                <div class="preview-thumb mb-2 shadow">
                  <img src="https://via.placeholder.com/100x70" id="img_preview" class="w-100 h-100">
                </div>
                 @if($errors->has('image'))
                <span class="error-msg text-danger d-block mb-3" id="checksize">{{ $errors->first('image')}}</span>
                @else
                <p class="mb-3" id="file_name">Empty File</p>
                @endif
                <span class="error-msg text-danger file_error mb-3"></span>
                
              </div>

              <div class="col-md-12 form-group">
                <label>Remarks</label>
                <textarea name="p_remark" id="p_remark" class="form-control">{{ old('p_remark')}}</textarea>
                <span class="error-msg p_remark_error text-danger"></span>
              </div>

            </div>

            <div class="position-fixed fix-button py-3 bg-white text-center">
              <div class="container">
                <button type="submit" class="btn mt-0 w-auto" id="productform2">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<script>
 $('#file_upload').change(function(){
   const file = this.files[0];
   if(file){
     let reader = new FileReader();

     var ext = $(this).val().split('.').pop();
     file_name = $(this).val().replace(/C:\\fakepath\\/i, '');

     reader.onload = function(event){
       $('#file_name').text(file_name);
       if(ext=='mp4'){
         $('#video_preview').show();
         $('#video_preview').attr('src', event.target.result);
         $('#img_preview').hide();
       }else{
         $('#img_preview').show();
         $('#img_preview').attr('src', event.target.result);
         $('#video_preview').hide();
       }
     }
     reader.readAsDataURL(file);
   } 

 });
</script>
<!-- <script type="text/javascript">
  function valueChanged()
  {
    var pcat_id = $('#pcat_id').val();
    $('#v_id option').attr('selected',false);
    // alert(pcat_id);
    var element = $("#pcat_id").find('option:selected'); 
    var mycatid = element.attr("vcatid");
    // alert(mycatid);
    $('#v_id option[value=' + mycatid + ']')
    .attr('selected',true);
    $('#v_id option').hide();

  }
</script> -->
<script>
 $('#p_file').change(function(){
   const file = this.files[0];
   if(file){
     let reader = new FileReader();

     var ext = $(this).val().split('.').pop();
     file_name = $(this).val().replace(/C:\\fakepath\\/i, '');

     reader.onload = function(event){
       $('#file_name').text(file_name);
       $('#img_preview').show();
       $('#img_preview').attr('src', event.target.result);
     }
     reader.readAsDataURL(file);
   } 

 });
</script>
<script type="text/javascript">
 function valueChanged()
 {
  var pcat_id = $('#pcat_id').val();
  // alert(pcat_id);
  let _url = `{{url('get-cat-select')}}/${pcat_id}`;
  if(pcat_id!=''){
    $.ajax({
      url: _url,
      type: "GET",
      success:function(response){
        html = "";
        $.each(response.data, function( index, value ) {
          html += '<option value="'+ value.id +'">' + value.company_name +'</option>';
        });
        $('#v_id').empty('').append(html);
      }
    });
  }
  else{
    $('#v_id').html('<option value="">Select Company</option>');
  }  

}
</script>

<script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
<script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script>
  $('#productform2').click( function () {
    $('#checksize').html('');
    var v_id = $('#v_id').val();
    var pcat_id = $('#pcat_id').val();
    var p_service = $('#p_service').val();
    var p_price = $('#p_price').val();
    var payment_term = $('#payment_term').val();
    var p_file = $('#p_file').val();
    var p_remark = $('#p_remark').val();
    if(v_id == '')  
    {  
      $('.v_id_error').html('Company Name is required'); 
    }  
    else{
      $('.v_id_error').html(''); 
    }
    if(pcat_id == '')  
    {  
      $('.pcat_id_error').html('Category is required'); 
    }  
    else{
      $('.pcat_id_error').html(''); 
    }
    if(p_service == '')  
    {  
      $('.p_service_error').html('Product/Service is required'); 
    }  
    else{
      $('.p_service_error').html(''); 
    }
    if(p_price == '')  
    {  
      $('.p_price_error').html('Product price is required'); 
    }  
    else{
      $('.p_price_error').html(''); 
    }
    if(payment_term == '')  
    {  
      $('.payment_term_error').html('Payment term is required'); 
    }  
    else{
      $('.payment_term_error').html(''); 
    }
    if(p_file == '')  
    {  

     $('.line-input').addClass('mb-1');
     $('.line-input').removeClass('form-group');
     $('.file_error').html('File upload is required');
     $('.file_error').show(); 
   }  
   else{
     $('.file_error').hide(); 
   }
   if(p_remark == '')  
   {  
    $('.p_remark_error').html('Remark is required'); 
  }  
  else{
    $('.p_remark_error').html(''); 
  }
  if(v_id =='' || pcat_id=='' || p_service == '' || p_price == '' || payment_term == '' || p_file == '' || p_remark == '') 
    {  
      return false; 
    }
});
</script>

</body>
</html>