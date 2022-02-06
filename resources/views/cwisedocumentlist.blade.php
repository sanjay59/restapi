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
							<span class="caption-subject">{{$catname}} </span>
							<span class="count-num ml-1"> {{$doccount}}</span>
						</div>
					</div>

					<div class="portlet-body">
						<div class="row document-row">
							@forelse($cwiselist as $d)
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
											<a href="javascript:void(0);" data-toggle="modal" data-target="#document-modal" data-imgsrc="{{$d->file}}" class="position-relative bg-white shadow text-center rounded-circle">
												<i class="fa fa-search text-m-dark"></i>
											</a>
										</div>
										@else
										<video class="w-100 d-block"> 
											<source src="{{url('/')}}/assets/document/{{$d->file}}" type="video/mp4">
											</video>
											<div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#document-video-modal" data-videotag="{{$d->file}}" class="position-relative bg-white shadow text-center rounded-circle">
													<i class="fa fa-search text-m-dark"></i>
												</a>
											</div>
											@endif
										</div>
										<p class="mb-0 py-2 px-3 d-flex align-items-center justify-content-between">
											<span>{{$d->evtname}}</span>
											<a href="javascript:void(0);" class="text-danger ml-2" data-toggle="modal" data-target="#delete-document-modal" data-id="{{$d->id}}">
												<i class="fa fa-trash"></i>
											</a>
										</p>
									</figcaption>
								</div>
								@empty
								<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 document-col">
									<p>No Record</p>
								</div>
								@endforelse



							</div>
							<div class="comman-modal modal fade" id="delete-document-modal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content p-0">
										<div class="modal-body">
											<div class="success-msg text-center py-3" id="delete-confirm-msg">
												<img src="{{url('assets')}}/images/warning.svg" width="60" class="mb-4">
												<h3 class="mb-3">You Want to Delete this File?</h3>
												<a href="javascript:void(0);" class="btn btn-success mr-2" id="delete-btn">Yes</a>
												<a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@if($message=Session::get('rejdoc'))
							<div class="comman-modal modal d-block" id="delete-document-modal-msg" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content p-0">
										<div class="modal-body">
											<div class="success-msg text-center py-3" id="delete-thankyou-msg">
												<div class="text-center rounded-circle mx-auto mb-4">
													<img src="{{url('assets')}}/images/tick_mark.svg" width="25">
												</div>
												<h3 class="mb-0">Document File Delete Successfully</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif
									<!-- <div class="paging_bootstrap_full_number">
										<ul class="pagination">
											<li><a href="javascript:void(0);" class="active">1</a></li>
										</ul>
									</div> -->

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
					<script type="text/javascript">
						$('#delete-document-modal').on('show.bs.modal', function (event) {
							var button = $(event.relatedTarget)
							var id = button.data('id')
							var modal = $(this)
							modal.find('.modal-body input').val(id)
							$("#delete-btn").attr("href", "{{url('delete-document')}}/"+id);

						})
						setInterval(function() {
							$('#delete-document-modal-msg').removeClass('d-block');
							$('#delete-document-modal-msg').addClass('d-none');
						}, 3000);
					</script>
					<script type="text/javascript">
						$('#document-modal').on('show.bs.modal', function (event) {
							var button = $(event.relatedTarget)
							var imgsrc = button.data('imgsrc')
							var modal = $(this)
							$("#showimg").attr("src", "{{url('/')}}/assets/document/"+imgsrc);

						})
						$('#document-video-modal').on('show.bs.modal', function (event) {
							var button = $(event.relatedTarget)
							var videotag = button.data('videotag')
							var modal = $(this)
							$("#videotagid").attr("src", "{{url('/')}}/assets/document/"+videotag);

						})
					</script>
					<script type="text/javascript">
						$('#document-video-modal').on('hide.bs.modal', function(){
							$("#videotagid")[0].pause();
						});
					</script>
					<script type="text/javascript">
						$('.sidebar-menu ul li a').removeClass('active');
						$('.sidebar-menu ul li.category a').addClass('active');
					</script>
					@endsection