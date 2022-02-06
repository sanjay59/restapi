@extends('layout.master')

@section('title')
Review List
@endsection()

@section('content')
<style type="text/css">
.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1040;
  width: 100vw;
  height: 100vh;
  background-color: none !important; 
}
.modal-backdrop.show {
  opacity: .0 !important;
}
</style>
<div class="page-content-wrapper">
  <div class="page-content">
    

         
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
    
<script type="text/javascript">
  $('.sidebar-menu ul li a').removeClass('active');
  $('.sidebar-menu ul li.productivity a').addClass('active');
  $('.sidebar-menu ul li.productivity a.product-products').css({'color':'#000'});
  $('#productivity-collapse').addClass('show');
</script>
@endsection
