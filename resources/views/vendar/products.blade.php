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
    <div class="row margin-top-12">
      <div class="col-md-12">
        <div class="portlet light" id="document-section">

          <div class="portlet-title">
            <div class="caption">
              <h6 class="mb-0">Product Search</h6>
            </div>
          </div>
          <form class="search-form form-inline" method="get" action="{{url('products')}}">
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
              <a href="{{url('product_detail',$p->id)}}" target="_blank" style="color: #000;">
                <figcaption class="border bg-white">
                  <img src="{{url('assets')}}/product/{{$p->p_file}}" class="w-100 d-block">
                  <div class="py-2 px-3 d-flex align-items-center justify-content-between">
                    <div>
                      <p class="mb-0">{{$p->psname}}</p>
                      <span class="text-m-dark"><i class="fa fa-user mr-2"></i>{{$p->contact_no}}</span>
                    </div>
                    <p>
                      <a href="javascript:void(0);" class="text-danger ml-2" data-toggle="modal" data-target="#delete-product-modal" data-id="{{$p->id}}">
                      <i class="fa fa-trash"></i>
                    </a>
                  </p>
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
        <div class="comman-modal modal fade" id="delete-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-0">
              <div class="modal-body">
                <div class="success-msg text-center py-3" id="delete-confirm-msg">
                  <img src="{{url('assets')}}/images/warning.svg" width="60" class="mb-4">
                  <h3 class="mb-3">You Want to Delete this Product?</h3>
                  <a href="javascript:void(0);" class="btn btn-success mr-2" id="delete-btn">Yes</a>
                  <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</a>
                </div>
                <div class="success-msg text-center py-3 display-hide" id="delete-thankyou-msg">
                  <div class="text-center rounded-circle mx-auto mb-4">
                    <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
                  </div>
                  <h3 class="mb-0">Product Delete Successfully</h3>
                </div>
              </div>
            </div>
          </div>
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
</div>
</div>
</div>
<script type="text/javascript">
  $('#delete-product-modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + id)
    modal.find('.modal-body input').val(id)
    $("#delete-btn").attr("href", "{{url('reject-product')}}/"+id);

  })

 $('.sidebar-menu ul li a').removeClass('active');
 $('.sidebar-menu ul li.productivity a').addClass('active');
 $('.sidebar-menu ul li.productivity a.product-products').css({'color':'#000'});
 $('#productivity-collapse').addClass('show');
</script>
@endsection
