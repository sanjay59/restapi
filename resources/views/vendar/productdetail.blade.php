<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8"/>
  <title>Product Detail</title>

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
    <div class="page-content-wrapper">
      <div class="container">
        <div class="portlet-body py-4 py-sm-5">
          <div class="row">
            <div class="col-6 col-lg-3 document-col px-3 mb-4">
              <figcaption>
                <img src="{{url('assets')}}/product/{{$getpd->p_file}}" class="w-100 h-auto d-block">
              </figcaption>
            </div>
            <div class="col-12 col-lg-9 pl-lg-4 mb-4">
              <h4 class="mb-4">{{$getpd->psname}}</h4>
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Category</strong></td>
                      <td>{{$getpd->name}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Company Name</strong></td>
                      <td>{{$getpd->company_name}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Cost Price</strong></td>
                      <td>{{$getpd->p_price}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Payment Term</strong></td>
                      <td>{{$getpd->payment_term}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-12 col-lg-12">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Email</strong></td>
                      <td>{{$getpd->email}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Mobile</strong></td>
                      <td>{{$getpd->mobile_no}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Contact Person Name</strong></td>
                      <td>{{$getpd->contact_no}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>City/Country</strong></td>
                      <td>{{$getpd->city}}/{{$getpd->country}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Website</strong></td>
                      <td>{{$getpd->website}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>GST No.</strong></td>
                      <td>{{$getpd->gst_no}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>PAN No.</strong></td>
                      <td>{{$getpd->pan_no}}</td>
                    </tr>
                    <tr>
                      <td class="text-left px-3" width="35%"><strong>Billing Address</strong></td>
                      <td>{{$getpd->address}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
<script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
  setTimeout(function() {
    $('#success_msg').fadeOut('fast');
  }, 2000); 
</script>
</body>
</html>