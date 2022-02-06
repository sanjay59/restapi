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
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption pb-3">
              <span class="caption-subject">Document Review</span>
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="table-checkbox">Sr No</th>
                    <th >Name</th>
                    <th >File</th>
                    <th >Event</th>
                    <th >Category</th>
                    <th >Added By</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($reviewlist as $d)
                  <?php
                  $video=$d->file;
                  $videoext = substr($video, strpos($video, ".") + 1);    
              // echo $videoext;
              // print_r($video);die();
                  ?>
                  
                  <tr>
                    <td><div class="numbring">{{$loop->iteration}}</div></td>
                    <td>{{$d->docname}}</td>
                    <td>
                      <div class="preview-thumb sm">
                        @if($videoext!='mp4')
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#document-modal" data-imgsrc="{{$d->file}}">
                          <img src="{{url('/')}}/assets/document/{{$d->file}}" class="w-100 h-100"></a>

                          @else
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#document-video-modal" data-videotag="{{$d->file}}">
                            <video class="w-100 h-100"> <source src="{{url('/')}}/assets/document/{{$d->file}}" type="video/mp4"> </video></a>
                              @endif
                            </div>
                          </td>
                          <td>{{$d->evtname}}</td>
                          <td>{{$d->catname}}</td>
                          <td>{{$d->tmname}}</td>
                          <td>
                            <a href="javascript:void(0);" class="text-success mr-2" data-toggle="modal" data-target="#edit-document-modal" data-id="{{$d->id}}">Approve</a>  
                            <a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#delete-category-modal"  data-id="{{$d->id}}">Reject</a>  
                          </td>
                        </tr>

                        @empty
                        <tr>
                          <td colspan="7">No Record</td>
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
      <div class="comman-modal modal fade" id="document-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content p-0">

            <div class="modal-header">
              <h5 class="modal-title mb-0">Document File</h5>
              <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="document-cover bg-light">
                <img src="" id="showimg" class="w-100 h-100 d-block">
                <!-- <video class="w-100 h-100 d-block" controls> 
                  <source src="https://via.placeholder.com/430x300" type="video/mp4">
                  </video> -->
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="comman-modal modal fade" id="document-video-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-0">

              <div class="modal-header">
                <h5 class="modal-title mb-0">Document File</h5>
                <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="document-cover bg-light">
                  <video id="videotagid" class="w-100 h-100 d-block" controls> 
                    <source  src="https://via.placeholder.com/430x300" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="comman-modal modal d-none" id="edit-document-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content p-0">
                <div class="modal-header">
                  <h5 class="modal-title mb-0"></h5>
                  <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="employeeeditform">

                    <div class="form-group">
                      <label>Name</label>
                      <input type="hidden" name="post_id" id="post_id">
                      <input type="text" name="status" id="editstatus" class="form-control">
                      <span class="error-msg text-danger editstatus-error"></span>
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
                    <h3 class="mb-0">Document File Delete Successfully</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if($message=Session::get('rejdoc'))
          <div class="comman-modal modal d-block" id="doc-delete-success" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content p-0">
                <div class="modal-body">
                  <div class="success-msg text-center py-2" id="thankyou-msg">
                    <div class="text-center rounded-circle mx-auto mb-4">
                      <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
                    </div>
                    <h3 class="mb-0">{{$message}}</h3>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <script type="text/javascript">
            setInterval(function() {
              $('#doc-delete-success').addClass('fade');
              $('#doc-delete-success').removeClass('d-block');
            }, 2000);
          </script>
          @endif
          <script type="text/javascript">
            $('#delete-category-modal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget)
              var id = button.data('id')
              var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + id)
    modal.find('.modal-body input').val(id)
    $("#delete-btn").attr("href", "{{url('reject-document')}}/"+id);

  })

            $('#edit-document-modal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget)
              var id = button.data('id')
              var modal = $(this)
              var status = 1;
              if(status == '')  
              {  

              }  
              else{
              }
              if(status==''){
                return false;
              }else{
                $.ajax({
                  url: "{{url('document-approved')}}",
                  type: "POST",
                  data: {
                    id: id,
                    status: status,
                    _token: '{{csrf_token()}}',
                  },
                  success: function(response) {
                    window.location.reload();
                  }


                });
              }
            })
          </script>
          <script type="text/javascript">
            $('#employeeeditform').on('submit', function (e) {
             e.preventDefault();
             var id = $('#post_id').val();
             var status = $('#editstatus').val();
             if(status == '')  
             {  

             }  
             else{
             }
             if(status==''){
        // return false;
      }else{
        $.ajax({
          url: "{{url('document-approved')}}",
          type: "POST",
          data: {
            id: id,
            status: status,
            _token: '{{csrf_token()}}',
          },
          success: function(response) {
           setInterval(function() {
            // window.location.reload();
          }, 2000);
         }


       });
      }
    });
  </script>
  <script type="text/javascript">
    $('#document-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var imgsrc = button.data('imgsrc')
      var modal = $(this)
      $("#showimg").attr("src", "{{url('/')}}/assets/document/"+imgsrc);

    });
    $('#document-video-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var videotag = button.data('videotag')
      var modal = $(this)
      $("#videotagid").attr("src", "{{url('/')}}/assets/document/"+videotag);

    });
  </script>
  <script type="text/javascript">
    $('#document-video-modal').on('hide.bs.modal', function(){
      $("#videotagid")[0].pause();
    });
  </script>
   <script type="text/javascript">
    $('.sidebar-menu ul li a').removeClass('active');
$('.sidebar-menu ul li.review a').addClass('active');
  </script>
  @endsection
