@extends('layout.master')

@section('title')
Dashboard
@endsection()

@section('content')
<div class="page-content-wrapper">

	<div class="page-content">
		<div class="row margin-top-12 dashboard-stat-outer">

			<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
				<a href="{{url('employee-list')}}">	
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number text-left">
								<h3>{{$empcount}}</h3>
								<small class="crd-heding mb-0 text-uppercase">Total Team Member</small>
							</div>
							<div class="icon">
								<svg width="354" height="501" viewBox="0 0 354.000000 501.000000" fill="none" xmlns="http://www.w3.org/2000/svg" class="sidebar-icon">
									<g xmlns="http://www.w3.org/2000/svg" transform="translate(0.000000,501.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
										<path d="M1630 4995 c-355 -36 -641 -169 -885 -411 -255 -254 -399 -558 -436 -922 -19 -193 10 -418 81 -617 161 -458 543 -805 1018 -925 194 -49 364 -60 539 -35 202 29 351 76 513 162 373 199 634 536 735 947 38 156 50 320 35 466 -52 518 -331 939 -781 1179 -186 99 -355 142 -644 165 -27 2 -106 -2 -175 -9z m260 -579 c116 -19 133 -24 222 -62 274 -117 467 -356 527 -652 16 -75 14 -259 -3 -339 -41 -194 -142 -365 -291 -493 -108 -93 -211 -146 -361 -185 -248 -65 -536 -9 -737 144 -95 72 -115 91 -172 166 -111 146 -157 260 -185 453 -28 193 42 448 170 619 119 158 327 295 501 332 154 33 213 36 329 17z"/>
										<path d="M1465 1755 c-372 -44 -689 -151 -940 -318 -106 -71 -251 -204 -314 -288 -163 -216 -243 -505 -177 -644 25 -54 104 -134 176 -180 404 -257 1303 -375 2130 -280 595 69 1077 261 1170 468 53 116 -13 385 -141 574 -182 269 -513 481 -933 599 -267 75 -672 104 -971 69z m645 -594 c211 -37 387 -100 543 -192 73 -43 230 -185 224 -202 -4 -13 -163 -61 -307 -93 -392 -86 -968 -106 -1370 -48 -203 30 -550 115 -550 136 0 20 128 142 199 190 159 108 391 188 626 217 50 6 104 13 120 15 80 11 405 -3 515 -23z"/>
									</g>
								</svg>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
				<a href="{{url('category-list')}}">	
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number text-left">
								<h3>{{$catcount}}</h3>
								<small class="crd-heding mb-0 text-uppercase">Total Category</small>
							</div>
							<div class="icon">
								<svg width="354" height="501" viewBox="0 0 354.000000 501.000000" fill="none" xmlns="http://www.w3.org/2000/svg" class="sidebar-icon">
									<g xmlns="http://www.w3.org/2000/svg" transform="translate(0.000000,501.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
										<path d="M1630 4995 c-355 -36 -641 -169 -885 -411 -255 -254 -399 -558 -436 -922 -19 -193 10 -418 81 -617 161 -458 543 -805 1018 -925 194 -49 364 -60 539 -35 202 29 351 76 513 162 373 199 634 536 735 947 38 156 50 320 35 466 -52 518 -331 939 -781 1179 -186 99 -355 142 -644 165 -27 2 -106 -2 -175 -9z m260 -579 c116 -19 133 -24 222 -62 274 -117 467 -356 527 -652 16 -75 14 -259 -3 -339 -41 -194 -142 -365 -291 -493 -108 -93 -211 -146 -361 -185 -248 -65 -536 -9 -737 144 -95 72 -115 91 -172 166 -111 146 -157 260 -185 453 -28 193 42 448 170 619 119 158 327 295 501 332 154 33 213 36 329 17z"/>
										<path d="M1465 1755 c-372 -44 -689 -151 -940 -318 -106 -71 -251 -204 -314 -288 -163 -216 -243 -505 -177 -644 25 -54 104 -134 176 -180 404 -257 1303 -375 2130 -280 595 69 1077 261 1170 468 53 116 -13 385 -141 574 -182 269 -513 481 -933 599 -267 75 -672 104 -971 69z m645 -594 c211 -37 387 -100 543 -192 73 -43 230 -185 224 -202 -4 -13 -163 -61 -307 -93 -392 -86 -968 -106 -1370 -48 -203 30 -550 115 -550 136 0 20 128 142 199 190 159 108 391 188 626 217 50 6 104 13 120 15 80 11 405 -3 515 -23z"/>
									</g>
								</svg>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
				<a href="{{url('event-list')}}">	
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number text-left">
								<h3>{{$evtcount}}</h3>
								<small class="crd-heding mb-0 text-uppercase">Total Events</small>
							</div>
							<div class="icon">
								<svg width="354" height="501" viewBox="0 0 354.000000 501.000000" fill="none" xmlns="http://www.w3.org/2000/svg" class="sidebar-icon">
									<g xmlns="http://www.w3.org/2000/svg" transform="translate(0.000000,501.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
										<path d="M1630 4995 c-355 -36 -641 -169 -885 -411 -255 -254 -399 -558 -436 -922 -19 -193 10 -418 81 -617 161 -458 543 -805 1018 -925 194 -49 364 -60 539 -35 202 29 351 76 513 162 373 199 634 536 735 947 38 156 50 320 35 466 -52 518 -331 939 -781 1179 -186 99 -355 142 -644 165 -27 2 -106 -2 -175 -9z m260 -579 c116 -19 133 -24 222 -62 274 -117 467 -356 527 -652 16 -75 14 -259 -3 -339 -41 -194 -142 -365 -291 -493 -108 -93 -211 -146 -361 -185 -248 -65 -536 -9 -737 144 -95 72 -115 91 -172 166 -111 146 -157 260 -185 453 -28 193 42 448 170 619 119 158 327 295 501 332 154 33 213 36 329 17z"/>
										<path d="M1465 1755 c-372 -44 -689 -151 -940 -318 -106 -71 -251 -204 -314 -288 -163 -216 -243 -505 -177 -644 25 -54 104 -134 176 -180 404 -257 1303 -375 2130 -280 595 69 1077 261 1170 468 53 116 -13 385 -141 574 -182 269 -513 481 -933 599 -267 75 -672 104 -971 69z m645 -594 c211 -37 387 -100 543 -192 73 -43 230 -185 224 -202 -4 -13 -163 -61 -307 -93 -392 -86 -968 -106 -1370 -48 -203 30 -550 115 -550 136 0 20 128 142 199 190 159 108 391 188 626 217 50 6 104 13 120 15 80 11 405 -3 515 -23z"/>
									</g>
								</svg>
							</div>
						</div>
					</div>
				</a>
			</div>

<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
				<a href="{{url('document-list')}}">	
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number text-left">
								<h3>{{$doccount}}</h3>
								<small class="crd-heding mb-0 text-uppercase">Document Files</small>
							</div>
							<div class="icon">
								<svg width="354" height="501" viewBox="0 0 354.000000 501.000000" fill="none" xmlns="http://www.w3.org/2000/svg" class="sidebar-icon">
									<g xmlns="http://www.w3.org/2000/svg" transform="translate(0.000000,501.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
										<path d="M1630 4995 c-355 -36 -641 -169 -885 -411 -255 -254 -399 -558 -436 -922 -19 -193 10 -418 81 -617 161 -458 543 -805 1018 -925 194 -49 364 -60 539 -35 202 29 351 76 513 162 373 199 634 536 735 947 38 156 50 320 35 466 -52 518 -331 939 -781 1179 -186 99 -355 142 -644 165 -27 2 -106 -2 -175 -9z m260 -579 c116 -19 133 -24 222 -62 274 -117 467 -356 527 -652 16 -75 14 -259 -3 -339 -41 -194 -142 -365 -291 -493 -108 -93 -211 -146 -361 -185 -248 -65 -536 -9 -737 144 -95 72 -115 91 -172 166 -111 146 -157 260 -185 453 -28 193 42 448 170 619 119 158 327 295 501 332 154 33 213 36 329 17z"/>
										<path d="M1465 1755 c-372 -44 -689 -151 -940 -318 -106 -71 -251 -204 -314 -288 -163 -216 -243 -505 -177 -644 25 -54 104 -134 176 -180 404 -257 1303 -375 2130 -280 595 69 1077 261 1170 468 53 116 -13 385 -141 574 -182 269 -513 481 -933 599 -267 75 -672 104 -971 69z m645 -594 c211 -37 387 -100 543 -192 73 -43 230 -185 224 -202 -4 -13 -163 -61 -307 -93 -392 -86 -968 -106 -1370 -48 -203 30 -550 115 -550 136 0 20 128 142 199 190 159 108 391 188 626 217 50 6 104 13 120 15 80 11 405 -3 515 -23z"/>
									</g>
								</svg>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="portlet light mb-3">
			<div class="portlet-title">
				<div class="caption pt-1 pt-md-2 pb-3">
					<span class="caption-subject">Recent Uploades</span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row document-row document-col-5">
					@foreach($latestdoclist as $d)
					<div class="document-col mb-3">
						
						<figcaption class="border bg-white">
							<?php
							$video=$d->file;
							$videoext = substr($video, strpos($video, ".") + 1);    
							// echo $videoext;
							// print_r($video);die();
							?>
							@if($videoext!='mp4')
							<img src="{{url('/')}}/assets/document/{{$d->file}}" class="w-100 d-block">
							@else
							<video class="w-100 d-block">
								<source src="{{url('/')}}/assets/document/{{$d->file}}" type="video/mp4">
								</video>
								@endif
								<p class="mb-0 py-2 px-3">{{$d->evtname}} </p>

							</figcaption>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('.sidebar-menu ul li a').removeClass('active');
$('.sidebar-menu ul li.dashboard a').addClass('active');
	</script>
	@endsection