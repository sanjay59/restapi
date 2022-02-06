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
   <script defer src="https://widget-js.cometchat.io/v2/cometchatwidget.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style type="text/css">
   .css-1pczl5g {
      z-index: 2147483000;
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 60px;
      height: 60px;
      box-shadow: none !important;
      border-radius: 50%;
      cursor: pointer;
      animation: 250ms ease 0s 1 normal none running animation-j3tmw8;
      background: rgb(255, 255, 255);
   }
   .app__messenger{
      display: block;
   }
</style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
   <div class="page-header navbar navbar-fixed-top">
      <div class="page-header-inner px-0">
         <div class="page-top w-100 px-0">
            <div class="container">
               <ul class="d-flex align-items-center justify-content-between">
                  <li>
                     <h6 class="mb-0" id="cometchat__widget" style="font-size: 15px;"> Welcome {{$name}} </h6>
                  </li>
                  @if($id!=3)
                  <a href="javascript:void(0);" class="openchatpulse" id="openChat">open {{$id}}</a>
                  <a href="javascript:void(0);" class="openchatiframe" id="openChatiframe" style="display:none">open iframe</a>
                  <a href="javascript:void(0);" class="closechatpulse" id="closeChat" style="display: none;">close</a>
                  <a href="javascript:void(0);" id="chatload" style="display: none;top: 45%;left:24.3%;position: absolute;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:28px;color:red"></i>
                  </a>
                  <script type="text/javascript">
                     $(".openchatpulse").click(function(){
                       $('#chatload').show();
                       setInterval(function(){
                         $('#chatload').hide(); 
                         $('#closeChat').show();       
                      }, 3000);
                       $('.openchatpulse').hide();
                       $('.app__messenger').show();
                       // $('#closeChat').show();
                    });
                     $(".openchatiframe").click(function(){
                     	$('.openchatiframe').hide();
                     	$('.app__messenger').show();
                     	$('#closeChat').show();
                     });
                     $(".closechatpulse").click(function(){
                     	$('.closechatpulse').hide();
                     	$('.openchatiframe ').show();
                     	$('.openchatpulse').attr('id','idChat');
                     	$('.app__messenger ').hide();
                     });
                  </script>
                  @else
                  <li>
                  	<a href="javascript:void(0);" class="openchatpulseadmin" id="openChatadmin">open chat</a>
                     <a href="javascript:void(0);" class="openchatiframeadmin" id="openChatiframeadmin" style="display:none">open iframe admin</a>
                     <a href="javascript:void(0);" class="closechatpulseadmin" id="closeChatadmin" style="display: none;">close admin</a>
                     <script type="text/javascript">
                        $(".openchatpulseadmin").click(function(){
                          $('.openchatpulseadmin').hide();
                          $('.app__messenger').show();
                          $('#closeChatadmin').show();
                       });
                        $(".openchatiframeadmin").click(function(){
                          $('.openchatiframeadmin').hide();
                          $('.app__messenger').show();
                          $('#closeChatadmin').show();
                       });
                        $(".closechatpulseadmin").click(function(){
                          $('.closechatpulseadmin').hide();
                          $('.openchatiframeadmin ').show();
                          $('.openchatpulseadmin').attr('id','idChat');
                          $('.app__messenger ').hide();
                       });
                    </script>
                 </li>	
                 @endif
                 <li>
                  <a href="{{url('logout')}}">
                     Logout
                     <svg width="500" height="502" viewBox="0 0 500.000000 502.000000" fill="none" xmlns="http://www.w3.org/2000/svg" class="sidebar-icon">
                        <g xmlns="http://www.w3.org/2000/svg" transform="translate(0.000000,502.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                           <path d="M2360 4999 c-330 -19 -625 -96 -929 -240 -165 -79 -270 -142 -426 -259 -530 -396 -872 -976 -972 -1645 -24 -166 -24 -523 0 -690 88 -598 394 -1163 827 -1530 404 -342 834 -535 1335 -599 166 -22 340 -23 385 -3 84 37 123 140 86 228 -31 74 -98 109 -211 109 -179 0 -428 44 -634 112 -218 72 -486 218 -655 358 -99 81 -300 289 -373 386 -194 260 -327 560 -390 882 -25 127 -27 156 -27 397 -1 211 3 279 18 360 84 460 281 838 604 1162 371 373 878 597 1402 619 115 5 143 10 187 30 41 20 55 33 72 69 25 54 27 114 5 158 -47 92 -98 109 -304 96z"/>
                           <path d="M3730 3778 c-65 -35 -90 -77 -90 -152 0 -40 6 -70 16 -86 9 -14 202 -211 428 -437 l411 -413 -1175 0 c-1121 0 -1177 -1 -1215 -19 -70 -32 -105 -86 -105 -161 0 -75 35 -129 105 -161 38 -18 94 -19 1215 -19 l1175 0 -411 -412 c-226 -227 -419 -424 -428 -438 -24 -37 -21 -126 7 -175 25 -46 92 -85 144 -85 74 0 98 21 571 493 255 254 483 487 506 517 73 95 91 141 94 254 4 106 -3 144 -45 236 -21 47 -97 127 -516 547 -282 284 -506 500 -526 509 -59 28 -110 29 -161 2z"/>
                        </g>
                     </svg>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
   <div class="page-content-wrapper mb-5 pb-5">
      <div class="container">
         <div class="row mt-4">
            <div class="col-lg-8 mb-3 mb-lg-0">
               <h5 class="pb-4 mb-0">Add Documents</h5>
               <div class="comman-modal mb-4">
                  <form method="post" action="{{url('document-save')}}" enctype="multipart/form-data" id="add-document-form">
                     @csrf
                     <div class="row">
                        <div class="col-lg-7">
                           <div class="form-group">
                              <label>Category</label>
                              <select name="cat_id" id="cat_id" class="form-control">
                                 <option value="" selected>Select Category</option>
                                 @foreach($category as $c)
                                 <option value="{{$c->id}}">{{$c->name}}</option>
                                 @endforeach
                              </select>
                              <span class="error-msg text-danger cat_error"></span>
                           </div>
                           <div class="form-group">
                              <label>Event</label>
                              <select name="event_id" id="event_id" class="form-control">
                                 <option value="" selected>Select Event</option>
                                 @foreach($event as $e)
                                 <option value="{{$e->id}}">{{$e->name}}</option>
                                 @endforeach
                              </select>
                              <span class="error-msg text-danger event_error"></span>
                           </div>
                           <div class="form-group">
                              <label>Document Name</label>
                              <input type="text" name="name" id="name"  class="form-control">
                              <span class="error-msg text-danger name_error"></span>
                           </div>
                        </div>
                        <div class="col-lg-5">
                           <label>Document File</label>
                           <div class="form-group line-input">
                              <div class="upload-file d-flex align-items-center justify-content-center my-0">
                                 <input type="file" name="file" class="form-control" required onChange="preview();" id="file_upload">
                                 <div>
                                    <img src="{{url('assets')}}/images/img_icon.png">
                                    <h4 class="mb-0">Drop Your File Here</h4>
                                 </div>
                              </div>
                           </div>
                           <span class="error-msg text-danger file_error d-block mb-3 display-hide"></span>
                           <div class="preview-thumb mb-2 shadow">
                              <img src="https://via.placeholder.com/100x70" id="img_preview" class="w-100 h-100">
                              <video id="video_preview" class="w-100 h-100 display-hide">
                                 <source src="" type="video/mp4">
                                 </video>
                              </div>
                              <p class="mb-3" id="file_name">Empty File</p>
                           </div>
                        </div>
                        <div class="position-fixed fix-button py-3 bg-white" id="subbtn">
                           <div class="container">
                              <button type="submit" class="btn mt-0 w-auto" id="add-document-btn">Submit</button>
                              <div class="progress" id="progressid" style="display:none;">
                                 <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  @if($message=Session::get('docmsg'))
                  <div class="comman-modal modal d-block" id="add-doc-success" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-0">
                           <div class="modal-body">
                              <div class="success-msg text-center py-2" id="thankyou-msg">
                                 <div class="text-center rounded-circle mx-auto mb-4">
                                    <img src="{{url('assets')}}/images/tick_mark.svg" width="25">
                                 </div>
                                 <h3 class="mb-0">Document Uploaded Successfully</h3>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  <h5 class="pb-4 mb-0">Recent Uploades</h5>
                  <div class="row document-row document-col-4">
                     @foreach($latest5 as $file)
                     <?php
                     $video=$file->file;
                     $tmname1=$file->teamname;
                     $tmname = explode(' ', trim($file->teamname));
                     $videoext = substr($video, strpos($video, ".") + 1);    
                     ?>
                     <div class="col-xl-3 col-lg-4 col-sm-6 document-col mb-3">
                        <figcaption class="border bg-white">
                           @if($videoext!='mp4')
                           <img src="{{url('/')}}/assets/document/{{$file->file}}" class="w-100 d-block">
                           @else
                           <video class="w-100 d-block">
                              <source src="{{url('/')}}/assets/document/{{$file->file}}" type="video/mp4">
                              </video>
                              @endif
                              <div class="py-2 px-3">
                                 <p class="mb-0">{{$file->evtname}}</p>
                                 <span class="text-m-dark"><i class="fa fa-user mr-2"></i>{{$tmname[0]}}</span>
                              </div>
                           </figcaption>
                        </div>
                        @endforeach()
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="ml-0 ml-lg-2">
                        <h5 class="pb-4 mb-0">Leaderboard</h5>
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>S.no</th>
                                    <th style="width:50%;">Team</th>
                                    <th style="width:30%;" class="text-center">Counts</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($countdocteam as $tmcount)
                                 <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$tmcount->name}}</td>
                                    <td class="text-center">{{$tmcount->totaldoc}}</td>
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
      <div id="cometchat" style="bottom: 30px;right: 10px;position: fixed; z-index: 99999999;"></div>
      <div id="cometchatadmin" style="bottom: 30px;left: 10px;position: fixed; z-index: 99999999;"></div>
      <script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
      <script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
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
  <script type="text/javascript">
   $('#add-document-btn').click(function(){
     var cat_id = $('#cat_id').val();
     var event_id = $('#event_id').val();
     var name = $('#name').val();
     var file = $('#file_upload').val();
     $('.unique_email').html('');

     if(cat_id == '')  
     {  
       $('.cat_error').html('Category is required'); 
    }  
    else{
       $('.cat_error').html(''); 
    }
    if(event_id == '')  
    {  
       $('.event_error').html('Event is required'); 
    }  
    else{
       $('.event_error').html(''); 
    }
    if(name == '')  
    {  
       $('.name_error').html('Document Name is required'); 
    }  
    else{
       $('.name_error').html(''); 
    }
    if(file == '')  
    {  

       $('.line-input').addClass('mb-1');
       $('.line-input').removeClass('form-group');
       $('.file_error').html('File upload is required');
       $('.file_error').show(); 
    }  
    else{
       $('.file_error').hide(); 
    }
    if(cat_id=='' || event_id=='' || name=='' || file==''){
          // return false;
       }else{
        $("#add-document-btn").hide();
        $("#progressid").show();
     }
  });
</script>
<script type="text/javascript">
   setInterval(function() {
     $('#add-doc-success').addClass('fade');
     $('#add-doc-success').removeClass('d-block');
  }, 2000);

</script>
   <!-- <script>
      $(document).ready(function(){
      CometChatWidget.createOrUpdateUser({
      	"uid": "{{$id}}", 
      	"name": "{{$name}}"
      });
      });
      </script>
   -->
   <script>
      document.getElementById("openChat").addEventListener('click', (event) => {
      	CometChatWidget.init({
      		"appID": "19929707733ed06e",
      		"appRegion": "us",
      		"authKey": "f8e0229c413295303a48b075ea431afcb183f4bf"
      	}).then(response => {
      		console.log("Initialization completed successfully");
                 //You can now call login function.
                 CometChatWidget.createOrUpdateUser({
                 	"uid": "{{$id}}", 
                 	"name": "{{$name}}"
                 });
                 
                 CometChatWidget.login({
                 	"uid": "{{$id}}"
                 }).then(response => {
                 	CometChatWidget.launch({
                 		"widgetID": "08808dcb-d91a-4085-bf89-adee1beb98f3",
                 		"target": "#cometchat",
                         "alignment": "right", //left or right
                         "roundedCorners": "true",
                         "height": "250px",
                         "width": "250px",
                         "defaultID": "{{$id}}", //default UID (user) or GUID (group) to show,
                         "defaultType": "user" //user or group
                      });

                 }, error => {
                 	console.log("User login failed with error:", error);
                 });
              }, error => {
                console.log("Initialization failed with error:", error);
                 //Check the reason for error and take appropriate action.
              });
      });
      
   </script>
   <script>
      document.getElementById("openChatadmin").addEventListener('click', (event) => {
      	CometChatWidget.init({
           "appID": "19929707733ed06e",
           "appRegion": "us",
           "authKey": "f8e0229c413295303a48b075ea431afcb183f4bf"
        }).then(response => {
           console.log("Initialization completed successfully");

           CometChatWidget.login({
             "uid": "admin1"
          }).then(response => {
            CometChatWidget.launch({
              "widgetID": "c4d1e1bf-9068-4fb4-b820-4c5ccbc1f938",
              "target": "#cometchatadmin",
                         "alignment": "right", //left or right
                         "roundedCorners": "true",
                         "height": "250px",
                         "width": "250px",
                         "defaultID": "admin1", //default UID (user) or GUID (group) to show,
                         "defaultType": "user" //user or group
                      });

         }, error => {
            console.log("User login failed with error:", error);
         });
       }, error => {
          console.log("Initialization failed with error:", error);
                 //Check the reason for error and take appropriate action.
              });
     });
      
  </script>
</body>
</html>