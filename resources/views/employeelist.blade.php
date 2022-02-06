@extends('layout.master')

@section('title')
Teams List
@endsection()

@section('content')
<div class="page-content-wrapper">
  <div class="page-content">
   <div class="row margin-top-12">
    <div class="col-md-12">
     <div class="portlet light" id="document-section">
      <div class="portlet-title">
       <div class="caption">
        <span class="caption-subject">Teams</span>
      </div>
      <div class="actions">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-employee-modal">Add Team Member</button>
      </div>
    </div>
    <div class="portlet-body">
     <div id="response_document"></div>
     <div class="table-responsive">
      <table id="documents-manager" class="table table-striped table-bordered table-hover">
       <thead>
        <tr>
         <th class="table-checkbox">Sr No</th>
         <th>Name</th>
         <th>Email</th>
         <th>Password</th>
         <th>Document</th>
         <th class="text-center" style="width:19%;">Access</th>
         <th class="text-center">Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach($employeelist as $employee)
      <tr>
       <td>
        <div class="numbring">{{$loop->iteration}}</div>
      </td>
      <td>{{$employee->name}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->password}}</td>
      
      <td>
        <a href="{{url('team')}}/{{$employee->id}}/document" class="text-m-dark"><i class="fa fa-folder mr-1"></i>View &nbsp;{{$employee->totaldoc}}</a>
      </td>
      <td class="text-center">
         <!--  <input type="text" name="id" value="{{$employee->id}}" id="access_id">
        <label class="switch mb-0" id="access" onclick="userinactive()">
          <input type="checkbox" name="access" value="1" >
          <span class="slider round"></span>
        </label> -->
        <label class="switch mb-0" class="text-success mr-2" data-toggle="modal" data-target="#edit-tminactive-modal" data-id="{{$employee->id}}" @if($employee->access == 1) data-access="2" @else data-access="1" @endif >
          <input type="checkbox" name="access" @if($employee->access == 1) checked @endif>
          <span class="slider round"></span>
        </label>
        

      </td>

      <td class="text-center">
        <a href="javascript:void(0);" class="text-success mr-2" data-toggle="modal" data-target="#edit-employee-modal" data-id="{{$employee->id}}" >
          <i class="fa fa-pencil"></i>
        </a>    
        <a href="javascript:void(0);" class="text-danger delete-button" data-toggle="modal" data-target="#delete-employee-modal" data-whatever="{{$employee->id}}">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach()

  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="comman-modal modal fade" id="add-employee-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">

      <div class="modal-header">
        <h5 class="modal-title mb-0">Add Team Member</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="employeeform">
         <div class="form-group">
          <label>Role</label>
          <select name="role" id="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="team" selected>Team</option>
          </select>
          <!-- <span class="error-msg text-danger">Role is required</span> -->
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" id="name" class="form-control">
          <span class="error-msg text-danger name-error"></span>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control">
          <span class="error-msg text-danger unique_email"></span>
          <span class="error-msg text-danger email-error"></span>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" id="password" class="form-control">
          <span class="error-msg text-danger password-error"></span>
        </div>

        <button type="submit" class="btn mt-0" id="employee-btn">Submit</button>
      </form>

      <div class="success-msg text-center py-2 display-hide" id="thankyou-msg">
        <div class="text-center rounded-circle mx-auto mb-4">
          <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
        </div>
        <h3 class="mb-0">Team Member Add Successfully</h3>
      </div>

    </div>

  </div>
</div>
</div>

<div class="comman-modal modal d-none" id="edit-tminactive-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-0">
      <div class="modal-header">
        <h5 class="modal-title mb-0">Edit Team Member</h5>
        <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!--  <form method="post" action="" enctype="multipart/form-data" id="edit-employee-form">
          @method('PATCH')
          @csrf -->
          <form id="employeeeditform">
            <div class="form-group" id="srole">
              <label>Role</label>
              <!-- <select name="role" id="editrole" class="form-control">
                <option value="admin">Admin</option>
                <option value="team">Team</option>
              </select> -->
              <input type="text" name="role" id="editrole" class="form-control" readonly="" disabled="">

            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="hidden" name="post_id" id="post_id">
              <input type="text" name="name" id="editname" class="form-control">
              <span class="error-msg text-danger editname-error"></span>

            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="editemail" class="form-control">
              <span class="error-msg text-danger editemail-error"></span>

            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" id="editpassword" class="form-control" id="password">
              <span class="error-msg text-danger editpassword-error"></span>

            </div>
            <button type="submit" class="btn mt-0" id="edit-employee-btn">Submit</button>
          </form>

          <div class="success-msg text-center py-2 display-hide" id="edit-thankyou-msg">
            <div class="text-center rounded-circle mx-auto mb-4">
              <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
            </div>
            <h3 class="mb-0">Team Member Edit Successfully</h3>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="comman-modal modal fade" id="edit-employee-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-0">
        <div class="modal-header">
          <h5 class="modal-title mb-0">Edit Team Member</h5>
          <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       <!--  <form method="post" action="" enctype="multipart/form-data" id="edit-employee-form">
          @method('PATCH')
          @csrf -->
          <form id="employeeeditform">
            <div class="form-group" id="srole">
              <label>Role</label>
              <!-- <select name="role" id="editrole" class="form-control">
                <option value="admin">Admin</option>
                <option value="team">Team</option>
              </select> -->
              <input type="text" name="role" id="editrole" class="form-control" readonly="" disabled="">

            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="hidden" name="post_id" id="post_id">
              <input type="text" name="name" id="editname" class="form-control">
              <span class="error-msg text-danger editname-error"></span>

            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="editemail" class="form-control">
              <span class="error-msg text-danger editemail-error"></span>

            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" id="editpassword" class="form-control" id="password">
              <span class="error-msg text-danger editpassword-error"></span>

            </div>
            <button type="submit" class="btn mt-0" id="edit-employee-btn">Submit</button>
          </form>

          <div class="success-msg text-center py-2 display-hide" id="edit-thankyou-msg">
            <div class="text-center rounded-circle mx-auto mb-4">
              <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
            </div>
            <h3 class="mb-0">Team Member Edit Successfully</h3>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="comman-modal modal fade" id="delete-employee-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-0">
        <div class="modal-body">
          <div class="success-msg text-center py-3" id="delete-confirm-msg">
            <img src="{{url('assets')}}/images/warning.svg" width="60" class="mb-4">
            <h3 class="mb-3">You Want to Delete this Data?</h3>
            <input type="hidden" class="form-control" id="recipient-name">

            <a href="javascript:void(0);" class="btn btn-success mr-2" id="delete-btn">Yes</a>
            <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</a>
          </div>
          <div class="success-msg text-center py-3 display-hide" id="delete-thankyou-msg">
            <div class="text-center rounded-circle mx-auto mb-4">
              <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
            </div>
            <h3 class="mb-0">Team Member Delete Successfully</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('#delete-employee-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('whatever')
      var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  $("#delete-btn").attr("href", "{{url('delete-employee')}}/"+recipient);

})

    $('#edit-employee-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      let _url = `{{url('edit-employee')}}/${id}`;
      console.log(_url);
      $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
    // console.log(response.id);
    if(response) {
      // $("div#srole select ").val(response.role);
      $("#editrole").val(response.role);
      $("#post_id").val(response.id);
      $("#editname").val(response.name);
      $("#editemail").val(response.email);
      $("#editpassword").val(response.password);
      $('#edit-employee-modal').modal('show');
    }
  }
});
    })
    $('#edit-tminactive-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var access = button.data('access')
      var modal = $(this)
      $.ajax({
        url: "{{url('team-inactive')}}",
        type: "POST",
        data: {
          id: id,
          access: access,
          _token: '{{csrf_token()}}',
        },
        success: function(response) {
          // window.location.reload();
        }
      });
    })
  </script>
  <script type="text/javascript">
   $('#employeeeditform').on('submit', function (e) {
     e.preventDefault();
     var role = $('#editrole').val();
     var id = $('#post_id').val();
     var name = $('#editname').val();
     var email = $('#editemail').val();
     var password = $('#editpassword').val();
     if(name == '')  
     {  
      $('.editname-error').html('Team member name is required'); 
    }  
    else{
      $('.editname-error').html(''); 
    }
    if(email == '')  
    {  
      $('.editemail-error').html('Email ID is required'); 
    }  
    else{
      $('.editemail-error').html(''); 
    }
    if(password == '')  
    {  
      $('.editpassword-error').html('Password is required'); 
    }  
    else{
      $('.editpassword-error').html(''); 
    }
    if(name=='' || email=='' || password==''){
        // return false;
      }else{
        $.ajax({
          url: "{{url('employee-update')}}",
          type: "POST",
          data: {
            id: id,
            role: role,
            name: name,
            email: email,
            password: password,
            _token: '{{csrf_token()}}',
          },
          success: function(response) {
           if(response.msg){
            $('.unique_email').html(response.msg);
            return false;
          }
          $('.unique_email').hide();
          $('#employeeeditform').hide();
          $('#edit-thankyou-msg').show();
          setInterval(function() {
            window.location.reload();
          }, 2000);


        }


      });
      }
    });
  </script>
 <!--  <script type="text/javascript">
    function userinactive() {
        var access = $('#access input').val();
        alert(access);
        var id = $('#post_id').val();
        $.ajax({
          url: "{{url('/team-inactive')}}",
          type: "POST",
          data: {
            id: id,
            access: access,
            _token: '{{csrf_token()}}',
          },
          success: function(response) {

          } });

      }
    </script> -->
    <script type="text/javascript">
     $('#employeeform').on('submit', function (e) {
       e.preventDefault();
       var role = $('#role').val();

       var name = $('#name').val();
       var email = $('#email').val();
       var password = $('#password').val();
       $('.unique_email').html('');


       if(name == '')  
       {  
        $('.name-error').html('Team member name is required'); 
      }  
      else{
        $('.name-error').html(''); 
      }
      if(email == '')  
      {  
        $('.email-error').html('Email ID is required'); 
      }  
      else{
        $('.email-error').html(''); 
      }
      if(password == '')  
      {  
        $('.password-error').html('Password is required'); 
      }  
      else{
        $('.password-error').html(''); 
      }
      if(name=='' || email=='' || password==''){
        // return false;
      }else{
        $.ajax({
          url: "{{url('save-employee')}}",
          type: "POST",
          data: {
            role: role,
            name: name,
            email: email,
            password: password,
            _token: '{{csrf_token()}}',
          },
          success: function(response) {
           if(response.msg){
            $('.unique_email').html(response.msg);
            return false;
          }
          $('.unique_email').hide();
          $('#employeeform').hide();
          $('#thankyou-msg').show();
          $("#name").val('');
          $("#email").val('');
          $("#password").val('');
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
      // $('#edit-employee-form').hide();
      // $('#edit-thankyou-msg').show();
    });
   /* $('#delete-btn').click(function(){
      $('#delete-confirm-msg').hide();
      $('#delete-thankyou-msg').show();
    }); */

//     $('.delete-button').click(function(){
// $(document).ready(function(){
//   $("button").click(function(){
//     $("#deleteyes").attr("href", "https://www.w3schools.com/jquery/");
//   });
// });

//     });
</script>
<script type="text/javascript">
  $('.sidebar-menu ul li a').removeClass('active');
  $('.sidebar-menu ul li.team a').addClass('active');
</script>
@endsection
