@extends('layout.master')
@section('title')
Teams List
@endsection()
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row margin-top-12">
			<div class="col-md-12">
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption pb-3">
							<span class="caption-subject">Total Files </span>
							<span class="count-num ml-1"> {{$doccount}}</span>
						</div>
					</div>
					<form class="search-form form-inline" action="{{url('document-search')}}" method="post">
						@csrf
						<div class="input-group mb-3 mr-sm-3">
							<input type="text" placeholder="Event Name" name="name" id="name" value="{{$name}}" class="form-control">
						</div>
						<div class="input-group mb-3 mr-sm-3">
							<select class="form-control" name="catname" id="catname">
								<option value="" selected="">Select Category</option>
								@foreach($category as $c)

												<option value="{{$c->name}}" {{ $c->name == $catname ? 'selected' : '' }}>{{$c->name}}</option>
												@endforeach
							</select>
						</div>
						<div class="input-group mb-3">
							<button type="submit" class="btn">Search</button>
						</div>
					</form>
					<div class="portlet-body">
						<div class="row document-row">
							@foreach($doclist as $d)
							<?php
							$video=$d->file;
							$videoext = substr($video, strpos($video, ".") + 1);    
                        // echo $videoext;
                        // print_r($video);die();
							?>

							<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 document-col mb-3">
								<figcaption class="border bg-white">
									<div class="position-relative">
										@if($videoext!='mp4')
										<img src="{{url('/')}}/assets/document/{{$d->file}}" class="w-100 d-block">
										<div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
											<a href="javascript:void(0);" data-toggle="modal" data-target="#full-document-modal" data-imgsrc="{{$d->file}}" data-id="{{$d->id}}" class="position-relative bg-white shadow text-center rounded-circle">
												<i class="fa fa-search text-m-dark"></i>
											</a>
										</div>
										@else
										<video class="w-100 d-block">
											<source src="{{url('/')}}/assets/document/{{$d->file}}" type="video/mp4">
											</video>
											<div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#full-document-modal" data-imgsrc="{{$d->file}}" data-id="{{$d->id}}" class="position-relative bg-white shadow text-center rounded-circle">
													<i class="fa fa-search text-m-dark"></i>
												</a>
											</div>
											@endif
											
										</div>
										<p class="mb-0 py-2 px-3">{{$d->evtname}}</p>
										<p class="mb-0 py-2 px-3 d-none">{{$d->catname}}</p>
									</figcaption>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="comman-modal modal fade" id="full-document-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content rounded-0 p-0">
				<div class="modal-body p-2">
					<div id="documents-slider" class="carousel" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active" id="">
								<img class="d-block w-100 h-100" id="showimg" src="">
								<video class="w-100 h-100 d-block" id="videotagid" controls>
									<source src="" type="video/mp4">

									</video>
								</div>

							<!-- <div class="carousel-item active">
								<img class="d-block w-100 h-100" src="https://via.placeholder.com/630x400">
							</div> -->
						</div>
						<a class="carousel-control-prev position-fixed" href="#documents-slider" role="button" data-slide="prev" id="prevdoc" prevfilename="" prevfileext="">
							<i class="fa fa-angle-left bg-white shadow text-center d-block ml-2"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next position-fixed" href="#documents-slider" role="button" data-slide="next" id="nextdoc" filename="" fileext="">
							<i class="fa fa-angle-right bg-white shadow text-center d-block mr-2"></i>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<script type="text/javascript">
		$('#full-document-modal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var imgsrc = button.data('imgsrc')
			var myString = imgsrc.substr(imgsrc.indexOf(".") + 1)
			var id = button.data('id')
			var modal = $(this)
			// alert(id);
			// $("#"+id).addClass("active");
			if(myString!="mp4"){
				$("#videotagid").removeClass("d-block");
				$("#videotagid").addClass("d-none");
				$("#showimg").attr("src", "{{url('/')}}/assets/document/"+imgsrc);
			$("#nextdoc").attr("filename", id+1);
			$("#prevdoc").attr("prevfilename", id);
			}else{
				$("#showimg").removeClass("d-block");
				$("#showimg").addClass("d-none");
				$("#videotagid").attr("src", "{{url('/')}}/assets/document/"+imgsrc);
			$("#nextdoc").attr("filename", id+1);
			$("#prevdoc").attr("prevfilename", id);

			}
			// $("#nextdoc").attr("filename", id+1);
			$.ajax({
				url: "{{url('document-page')}}/"+id,
				type: "GET",
				success: function(response) {
					if(myString!="mp4"){
						$("#videotagid").removeClass("d-block");
						$("#videotagid").addClass("d-none");
						$("#showimg").removeClass("d-none");
						$("#showimg").addClass("d-block").attr("src", "{{url('/')}}/assets/document/"+imgsrc);
					$("#nextdoc").attr("filename", response.next);
					$("#nextdoc").attr("fileext", response.nfext);
					$("#prevdoc").attr("prevfilename", id);
					$("#prevdoc").attr("prevfileext", myString);

					}else{
						$("#showimg").removeClass("d-block");
						$("#showimg").addClass("d-none");
						$("#videotagid").removeClass("d-none");
						$("#videotagid").addClass("d-block").attr("src", "{{url('/')}}/assets/document/"+imgsrc);
					$("#nextdoc").attr("filename", response.next);
					$("#nextdoc").attr("fileext", response.nfext);
					$("#prevdoc").attr("prevfilename", id);
					$("#prevdoc").attr("prevfileext", myString);

					}
					// $("#showimg").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					// $("#nextdoc").attr("filename", response.next);

				}


			});

		}) ;
		// $('#full-document-modal').on('show.bs.modal', function (event) {
		// 	var button = $(event.relatedTarget)
		// 	var videotag = button.data('videotag')
		// 	var id = button.data('id')
		// 	var modal = $(this)
		// 	$("#v"+id).addClass("active");
		// 	$("#videotagid").attr("src", "{{url('/')}}/assets/document/"+videotag);

		// })
	</script>
	<script type="text/javascript">
		$('#nextdoc').click(function(){
			var id =$("#nextdoc").attr("filename");
			$.ajax({
				url: "{{url('document-page')}}/"+id,
				success: function(response) {
					if(response.nfext!="mp4"){
						$("#videotagid").removeClass("d-block");
						$("#videotagid").addClass("d-none");
						$("#showimg").removeClass("d-none");
						$("#showimg").addClass("d-block").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					$("#nextdoc").attr("filename", response.next);
					$("#nextdoc").attr("fileext", response.nfext);
					$("#prevdoc").attr("prevfilename", response.previous);
					$("#prevdoc").attr("prevfileext", response.pfext);

					}else{
						$("#showimg").removeClass("d-block");
						$("#showimg").addClass("d-none");
						$("#videotagid").removeClass("d-none");
						// $("#videotagid").addClass("d-block");
						$("#videotagid").addClass("d-block").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					$("#nextdoc").attr("filename", response.next);
					$("#nextdoc").attr("fileext", response.nfext);
					$("#prevdoc").attr("prevfilename", response.previous);
					$("#prevdoc").attr("prevfileext", response.pfext);

					}
					// $("#"+id).addClass("active");
					// $("#showimg").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					// $("#nextdoc").attr("filename",response.next);

				}


			});
		});
	</script>
	<script type="text/javascript">
		$('#prevdoc').click(function(){
			var id =$("#prevdoc").attr("prevfilename");
			// alert(id);
			$.ajax({
				url: "{{url('document-page')}}/"+id,
				success: function(response) {
					if(response.nfext!="mp4"){
						$("#videotagid").removeClass("d-block");
						$("#videotagid").addClass("d-none");
						$("#showimg").removeClass("d-none");
						$("#showimg").addClass("d-block").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					$("#nextdoc").attr("filename", response.next);
					$("#nextdoc").attr("fileext", response.nfext);
					$("#prevdoc").attr("prevfilename", response.previous);
					$("#prevdoc").attr("prevfileext", response.pfext);

					}else{
						$("#showimg").removeClass("d-block");
						$("#showimg").addClass("d-none");
						$("#videotagid").removeClass("d-none");
						// $("#videotagid").addClass("d-block");
						$("#videotagid").addClass("d-block").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					$("#nextdoc").attr("filename", response.next);
					$("#nextdoc").attr("fileext", response.nfext);
					$("#prevdoc").attr("prevfilename", response.previous);
					$("#prevdoc").attr("prevfileext", response.pfext);

					}
					// $("#"+id).addClass("active");
					// $("#showimg").attr("src", "{{url('/')}}/assets/document/"+response.filename);
					// $("#nextdoc").attr("filename",response.next);

				}


			});
		});
	</script>
	<script type="text/javascript">
		$('.sidebar-menu ul li a').removeClass('active');
		$('.sidebar-menu ul li.doc a').addClass('active');
	</script>
	<!-- <script type="text/javascript">
		function searchData() {
			var name = $('#name').val();
			$.ajax({
				url: "{{url('/document-search')}}",
				type: "POST",
				data: {
					name: name,
					_token: '{{csrf_token()}}',
				},
				success: function(response) {
					$('#alldata').hide();
					$('.pagination').hide();
					var searchdata=response.data;
					console.log(searchdata);


				}


			});

		}
	</script> -->
	@endsection