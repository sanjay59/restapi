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

        <form class="search-form form-inline">
          <div class="input-group mb-3 mr-sm-3">
            <select class="form-control w-auto">
              <option value="" selected>Select Company</option>
              <option value="1">JK Lakshmi</option>
              <option value="2">Orient Electric</option>
              <option value="3">Niva Bupa</option>
            </select>
          </div>

          <div class="input-group mb-3 mr-sm-3">
            <select class="form-control w-auto">
              <option value="" selected>Select Category</option>
              <option value="1">Business-to-Business</option>
              <option value="2">Business-to-consumer</option>
            </select>
          </div>

          <div class="input-group mb-3 mr-sm-3">
            <select class="form-control w-auto">
              <option value="" selected>Product/Service</option>
              <option value="1">Product 1</option>
              <option value="2">Service 1</option>
            </select>
          </div>

          <div class="input-group mb-3 mr-sm-3">
            <input type="text" placeholder="City" class="form-control w-auto">
          </div>

          <div class="input-group mb-3 mr-sm-3">
            <input type="text" placeholder="Cost Price" class="form-control w-auto">
          </div>

          <div class="input-group mb-3">
            <button type="submit" class="btn">Search</button>
          </div>
        </form>
        @if($message=Session::get('addmsg'))
        <div class="alert alert-success position-relative border-0" role="alert" id="success_msg">{{$message}}</div>
        @endif
        <div class="portlet-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="table-checkbox">Sr No.</th>
                  <th>Company Name</th>
                  <th>Event Name</th>
                  <th>Category</th>
                  <th>Product/Service</th>
                  <th>City</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @forelse($getproduct as $p)
                <tr>
                  <td><div class="numbring">{{$p->id}}</div></td>
                  <td>{{$p->company_name}}</td>
                  <td>{{$p->evtname}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{$p->psname}}</td>
                  <td>{{$p->city}}</td>
                  <td>{{$p->p_price}}</td>
                </tr>
                @endforeach()
              </tbody>
            </table>
          </div>
          <div class="paging_bootstrap_full_number">
            <ul class="pagination">
              <li><a href="javascript:void(0);" class="active">1</a></li>
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