@extends('layout.master')

@section('title')
Event List
@endsection()

@section('content')
<div class="page-content-wrapper">
  <div class="page-content">
   <div class="row margin-top-12">
    <div class="col-md-12">
     <div class="portlet light" id="document-section">
      <div class="portlet-title">
       <div class="caption">
        <span class="caption-subject">Events</span>
      </div>
      <div class="actions">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-event-modal">Add Event</button>
      </div>
    </div>
    <div class="portlet-body">
     <div id="response_document"></div>
     <div class="table-responsive">
      <table id="documents-manager" class="table table-striped table-bordered table-hover">
       <thead>
        <tr>
         <th class="table-checkbox">Sr No</th>
         <th width="25%">Name</th>
         <th>Type</th>
         <th>Date</th>
         <th>Document</th>
         <th>Confirm</th>
         <th class="text-center">Action</th>
       </tr>
     </thead>
     <tbody>
      @forelse($eventlist as $event)
      <tr>
       <td>
        <div class="numbring">{{$loop->iteration}}</div>
      </td>
      <td>{{$event->name}}</td>
      <td>{{$event->type}}</td>
      <td>{{  strftime("%d %b %Y",strtotime($event->date)) }}</td>
      <td>
        <a href="{{url('event')}}/{{$event->id}}/document" class="text-m-dark"><i class="fa fa-folder mr-1"></i>View</a>
      </td>
      @if($event->status==1)
      <td>
       <div class="input-checkbox mr-4" data-toggle="modal" data-target="#complete-event-modal"  data-id="{{$event->id}}" data-status="10">
        <input type="checkbox" name="status" id="team{{$event->id}}" checked="">
        <label for="team{{$event->id}}" class="mb-0"></label>
      </div>
    </td>
    @else
    <td>
     <div class="input-checkbox mr-4"  class="input-checkbox mr-4" data-toggle="modal" data-target="#complete-event-modal"  data-id="{{$event->id}}" data-status="1">
      <input type="checkbox" name="status" value="1" id="team{{$event->id}}">
      <label for="team{{$event->id}}" class="mb-0"></label>
    </div>
  </td>
  @endif

  <td class="text-center">
    <a href="javascript:void(0);" class="text-success mr-2" data-toggle="modal" data-target="#edit-event-modal" data-id="{{$event->id}}" data-name="{{$event->name}}" data-type="{{$event->type}}" data-date="{{$event->date}}">
      <i class="fa fa-pencil"></i>
    </a>
    <a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#delete-event-modal"  data-id="{{$event->id}}">
      <i class="fa fa-trash"></i>
    </a>    
  </td>
</tr>
@empty
<tr">
  <td colspan="7">No Record</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="comman-modal modal fade" id="delete-event-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-body">
        <div class="success-msg text-center py-3" id="delete-confirm-msg">
          <img src="{{url('assets')}}/images/warning.svg" width="60" class="mb-4">
          <h3 class="mb-3">If you want to delete this event?<br>
Document data also remove</h3>
          <a href="javascript:void(0);" class="btn btn-success mr-2" id="delete-btn">Yes</a>
          <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</a>
        </div>
        <div class="success-msg text-center py-3 display-hide" id="delete-thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Event Delete Successfully</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@if($message=Session::get('delevt'))
<div class="comman-modal modal d-block" id="cat-delete-success" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-body">
        <div class="success-msg text-center py-2" id="thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Event Delete Successfully</h3>
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
<div class="comman-modal modal fade" id="add-event-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">

      <div class="modal-header">
        <h5 class="modal-title mb-0">Add Event</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="eventform">

          <div class="form-group">
            <label>Event Type</label>
            <select name="type" id="type" class="form-control">
              <option value="" selected>Select Type</option>
              <option value="Live">Live</option>
              <option value="Virtual">Virtual</option>
              <option value="Hybrid">Hybrid</option>
              <option value="Exhibition">Exhibition</option>
              <option value="Social">Social</option>
              <option value="Other">Other</option>
            </select>
            <span class="error-msg text-danger type-error"></span>
          </div>
          <div class="form-group">
            <label>Event Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <span class="error-msg text-danger unique_name"></span>
            <span class="error-msg text-danger name-error"></span>
          </div>
          <div class="form-group">
            <label>Event Date</label>
            <input type="date" name="date" id="date" class="form-control">
            <span class="error-msg text-danger date-error"></span>
          </div>
          <button type="submit" class="btn mt-0" id="event-btn">Submit</button>
        </form>

        <div class="success-msg text-center py-2 display-hide" id="thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Event Add Successfully</h3>
        </div>

      </div>

    </div>
  </div>
</div>

<div class="comman-modal modal fade" id="edit-event-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-header">
        <h5 class="modal-title mb-0">Edit Event</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data" id="eventeditform">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <label>Event Type</label>
            <select name="type" id="type" class="form-control">
              <option value="" selected>Select Type</option>
              <option value="Live">Live</option>
              <option value="Virtual">Virtual</option>
              <option value="Hybrid">Hybrid</option>
              <option value="Exhibition">Exhibition</option>
              <option value="Social">Social</option>
              <option value="Other">Other</option>
            </select>
            <span class="error-msg text-danger edittype-error"></span>
          </div>
          <div class="form-group">
            <label>Event Name</label>
            <input type="text" name="name" id="name" class="form-control" required="">
            <span class="error-msg text-danger editname-error"></span>
          </div>
          <div class="form-group">
            <label>Event Date</label>
            <input type="date" name="date" id="date" class="form-control" required="">
            <span class="error-msg text-danger editdate-error"></span>
          </div>
          <button type="submit" class="btn mt-0" id="edit-event-btn">Submit</button>
        </form>

        <div class="success-msg text-center py-2 display-hide" id="edit-thankyou-msg">
          <div class="text-center rounded-circle mx-auto mb-4">
            <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
          </div>
          <h3 class="mb-0">Event Data Edit Successfully</h3>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="comman-modal modal fd-none" id="complete-event-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-header">
        <h5 class="modal-title mb-0">Edit event</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data" id="eventeditform">
         <input type="text" name="post_id" id="post_id">
         <input type="text" name="status" id="editstatus" class="form-control">
         <button type="button" class="btn mt-0" id="edit-event-btn">Submit</button>
       </form>

       <div class="success-msg text-center py-2 display-hide" id="edit-thankyou-msg">
        <div class="text-center rounded-circle mx-auto mb-4">
          <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
        </div>
        <h3 class="mb-0">Event Data Edit Successfully</h3>
      </div>

    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $('#delete-event-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(id)
  $("#delete-btn").attr("href", "{{url('delete-event')}}/"+id);

})


  $('#edit-event-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var type = button.data('type')
    var name = button.data('name')
    var date = button.data('date')
    var modal = $(this)
  // modal.find('.modal-title').text('New message to ')
  modal.find('.modal-body #type').val(type)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #date').val(date)
  $("form").attr("action", "{{url('event')}}/"+id+"/update");

})
  $('#complete-event-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var status = button.data('status')
    var modal = $(this)
    modal.find('.modal-body #post_id').val(id)
    modal.find('.modal-body #editstatus').val(status)
    if(status == '')  
    {  

    }  
    else{
    }
    if(status==''){
      return false;
    }else{
      $.ajax({
        url: "{{url('event-complete')}}",
        type: "POST",
        data: {
          id: id,
          status: status,
          _token: '{{csrf_token()}}',
        },
        success: function(response) {
                    // window.location.reload();
                  }


                });
    }
  })
</script>
<script type="text/javascript">
 $('#eventform').on('submit', function (e) {
   e.preventDefault();
   var type = $('#type').val();
   var name = $('#name').val();
   var date = $('#date').val();
   $('.unique_name').html('');

   if(type == '')  
   {  
    $('.type-error').html('Event type is required'); 
  }  
  else{
    $('.type-error').html(''); 
  }
  if(name == '')  
  {  
    $('.name-error').html('Event name is required'); 
  }  
  else{
    $('.name-error').html(''); 
  }
  if(date == '')  
  {  
    $('.date-error').html('Event date is required'); 
  }  
  else{
    $('.date-error').html(''); 
  }
  if(type=='' || name=='' || date==''){
        // return false;
      }else{
        $.ajax({
          url: "{{url('save-event')}}",
          type: "POST",
          data: {
            type: type,
            name: name,
            date: date,
            _token: '{{csrf_token()}}',
          },
          success: function(response) {
           if(response.msg){
            $('.unique_name').html(response.msg);
            return false;
          }
          $('.unique_name').hide();
          $('#eventform').hide();
          $('#thankyou-msg').show();
          $("#type").val('');
          $("#name").val('');
          $("#date").val('');
          setInterval(function() {
            window.location.reload();
          }, 2000);


        }


      });
      }
    });
  </script>
  <script>
    $('#edit-event-btn').click(function(){
      $('#eventeditform').hide();
      $('#edit-thankyou-msg').show();
    });
  </script>
  <script type="text/javascript">
    function completeEvent() {
      var description = $('#description2').val();
      var id = $('#post_id').val();
      $.ajax({
        url: "{{url('/posts2')}}",
        type: "POST",
        data: {
          id: id,
          description: description,
          _token: '{{csrf_token()}}',
        },
        success: function(response) {
        }
      });}
    </script>
     <script type="text/javascript">
    $('.sidebar-menu ul li a').removeClass('active');
$('.sidebar-menu ul li.event a').addClass('active');
  </script>
    @endsection
