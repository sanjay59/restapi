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
        <h6 class="pt-4 pb-3 mb-0">Product Search</h6>

        <form class="search-form form-inline" method="get" action="{{url('product-search')}}">
          <div class="input-group mb-3 mr-sm-3">
            <select name="event" id="event" class="form-control"/>
            <option value="" selected>Select Event</option>
            @foreach($getevent as $e)
            <option {{$event == $e->name ? "selected" : "" }} value="{{$e->name}}" >{{$e->name}}</option>
            @endforeach
          </select>
          <span class="error-msg event_error text-danger"></span>
        </div>
        <div class="input-group mb-3 mr-sm-3">
          <select name="company_name" id="company_name" class="form-control w-auto">
            <option value="" selected>Select Company</option>
            @foreach($getvendor as $v)
            <option {{ $company_name == $v->company_name ? "selected" : "" }} value="{{$v->company_name}}" >{{$v->company_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="input-group mb-3 mr-sm-3">
          <select name="service" id="service" class="form-control w-auto">
            <option value="" selected>Product/Service</option>
             @foreach($getservice as $s)
            <option {{ $service == $s->name ? "selected" : "" }} value="{{$s->name}}" >{{$s->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group mb-3">
          <button type="submit" class="btn">Search</button>
        </div>
      </form>
      @if($message=Session::get('addmsg'))
      <div class="alert alert-success position-relative border-0" role="alert" id="success_msg">{{$message}}</div>
      @endif
      <div class="portlet-body">

        <div class="row document-row">
          @forelse($getproduct as $p)
          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 document-col mb-3">
            <a href="{{url('product-detail',$p->id)}}" target="_blank" style="color: #000;">
            <figcaption class="border bg-white">
              <img src="{{url('assets')}}/product/{{$p->p_file}}" class="w-100 d-block">
             <div class="py-2 px-3">
                        <p class="mb-0">{{$p->psname}}</p>
                        <span class="text-m-dark"><i class="fa fa-user mr-2"></i>{{$p->contact_no}}</span>
                      </div>
            </figcaption>
          </a>
          </div>
          @empty
          <div class="col-12">
            <p class="p-4 text-center h5">No Record Found</p>
          </div>
          @endforelse()
        </div>

        <div class="paging_bootstrap_full_number">
          <ul class="pagination">
            <!-- <li><a href="javascript:void(0);" class="active">1</a></li> -->
          </ul>
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