@extends('../layout.master')

@section('title')
Category List
@endsection()

@section('content')
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row margin-top-12">
      <div class="col-md-12">
        <div class="portlet light" id="document-section">

          <div class="portlet-title">
            <div class="caption">
              <span class="caption-subject">Product Categories</span>
            </div>
            <div class="actions">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-category-modal">Add Category</button>
            </div>
          </div>

          <div class="portlet-body">
            <div id="response_document"></div>
            <div class="table-responsive">
              <table id="documents-manager" class="table table-striped table-bordered table-hover">

                <thead>
                 <tr>
                  <th class="table-checkbox">Sr No</th>
                  <th style="width:75%;">Name</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                @forelse($vcategorylist as $category)
                <tr>
                  <td><div class="numbring">{{$loop->iteration}}</div></td>
                  <td>{{$category->name}}</td>
                 
                  <td class="text-center">
                    <a href="javascript:void(0);" class="text-success mr-2" data-toggle="modal" data-target="#edit-category-modal" data-id="{{$category->id}}" >
                      <i class="fa fa-pencil"></i>
                    </a>
                       <a href="{{url('delete-vendor-category',$category->id)}}" class="text-danger" data-toggle="modal" data-target="#delete-category-modal"  data-id="{{$category->id}}">
                        <i class="fa fa-trash"></i>
                      </a>    
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4">No Record</td>
                  </tr>
                  @endforelse
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
  </div>
</div>
<div class="comman-modal modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-header">
        <h5 class="modal-title mb-0">Add Product Category</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="categoryform">
          <div class="form-group">
            <label>Name</label>            
            <input type="text" name="name" id="name" class="form-control">
            <span class="error-msg text-danger name-error"></span>
            <span class="error-msg text-danger unique_name"></span>
          </div>
          <button type="submit" class="btn mt-0" id="add-category-btn">Submit</button>
        </form>
        <div class="success-msg text-center py-2 display-hide" id="add-thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Product Category Add Successfully</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="comman-modal modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-header">
        <h5 class="modal-title mb-0">Edit Product Category</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="categoryeditform">
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="post_id" id="post_id">
            <input type="text" name="name" id="editname" class="form-control">
            <span class="error-msg text-danger editname-error"></span>

          </div>
          <button type="submit" class="btn mt-0" id="edit-category-btn">Submit</button>
        </form>
        <div class="success-msg text-center py-2 display-hide" id="edit-thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Product Category Edit Successfully</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="comman-modal modal fade" id="delete-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-body">
        <div class="success-msg text-center py-3" id="delete-confirm-msg">
          <img src="{{url('assets')}}/images/warning.svg" width="60" class="mb-4">
          <h3 class="mb-3">You Want to Delete this Data?</h3>
          <a href="javascript:void(0);" class="btn btn-success mr-2" id="delete-btn">Yes</a>
          <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</a>
        </div>
        <div class="success-msg text-center py-3 display-hide" id="delete-thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Product Category Delete Successfully</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@if($message=Session::get('catmsg'))
    <div class="comman-modal modal d-block" id="cat-delete-success" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-0">
          <div class="modal-body">
            <div class="success-msg text-center py-2" id="thankyou-msg">
              <div class="text-center rounded-circle mx-auto mb-4">
                <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
              </div>
              <h3 class="mb-0">Product Category Delete Successfully</h3>
            </div>

          </div>

        </div>
      </div>
    </div>
    <script type="text/javascript">
      setInterval(function() {
        $('#cat-delete-success').addClass('fade');
        $('#cat-delete-success').removeClass('d-block');
      }, 2000);
    </script>
    @endif

<script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
<script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $('#delete-category-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + id)
    modal.find('.modal-body input').val(id)
    $("#delete-btn").attr("href", "{{url('delete-vendor-category')}}/"+id);

  })

  $('#edit-category-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    // var name = button.data('name')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ')
    // modal.find('.modal-body #name').val(name)
    // $("form").attr("action", "{{url('category')}}/"+id+"/update");
    // var id  = $(event).data("id");
    // console.log(id);

    let _url = `{{url('edit-vendor-category')}}/${id}`;
    // console.log(_url);
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
    // console.log(response.id);
    if(response) {
      $("#post_id").val(response.id);
      $("#editname").val(response.name);
      $('#edit-category-modal').modal('show');
    }
  }
});

  })
</script>
<script type="text/javascript">

  ////update
  $('#categoryeditform').on('submit', function (e) {
   e.preventDefault();
   var id = $('#post_id').val();
   var name = $('#editname').val();
   if(name == '')  
   {  
    $('.editname-error').html('Category is required'); 
  }  
  else{
    $('.editname-error').html(''); 
  }
  if(name==''){
  }else{
    $.ajax({
      url: "{{url('update-vendor-category')}}",
      type: "POST",
      data: {
        id: id,
        name: name,
        _token: '{{csrf_token()}}',
      },
      success: function(response) {
       $('#categoryeditform').hide();
       $('#edit-thankyou-msg').show();
       setInterval(function() {
        window.location.reload();
      }, 2000);
     }
   });
  }
});
  ////endupdate
  $('#categoryform').on('submit', function (e) {
   e.preventDefault();
   var id = $('#post_id').val();
   var name = $('#name').val();
   $('.unique_name').html('');

   if(name == '')  
   {  
    $('.name-error').html('Category is required'); 
  }  
  else{
    $('.name-error').html(''); 
  }
  if(name==''){
        // return false;
      }else{
        $.ajax({
          url: "{{url('save-vendor-category')}}",
          type: "POST",
          data: {
            id: id,
            name: name,
            _token: '{{csrf_token()}}',
          },
          success: function(response) {
           if(response.msg){
            $('.unique_name').html(response.msg);
            return false;
          }
          $('.unique_name').hide();
          $('#categoryform').hide();
          $('#add-thankyou-msg').show();
          $("#name").val('');
          setInterval(function() {
            window.location.reload();
          }, 2000);


        }


      });
      }
    });
  </script>
  <script>
    $('#edit-employee-btn').click(function(){
      $('#edit-employee-form').hide();
      $('#edit-thankyou-msg').show();
    });
   /* $('#delete-btn').click(function(){
      $('#delete-confirm-msg').hide();
      $('#delete-thankyou-msg').show();
    }); */

    $('.delete-button').click(function(){
      $(document).ready(function(){
        $("button").click(function(){
          // $("#deleteyes").attr("href", "https://www.w3schools.com/jquery/");
        });
      });

    });
  </script>
  <script type="text/javascript">
  $('.sidebar-menu ul li a').removeClass('active');
  $('.sidebar-menu ul li.productivity a').addClass('active');
  $('.sidebar-menu ul li.productivity a.product-category').css({'color':'#000'});
  $('#productivity-collapse').addClass('show');
</script>
 <!--  <script>
    $('#edit-category-btn').click(function(){
      $('#edit-category-form').hide();
      $('#edit-thankyou-msg').show();
    });
  </script> -->
  @endsection