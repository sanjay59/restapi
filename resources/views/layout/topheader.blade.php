	<div class="page-header navbar navbar-fixed-top">
		<div class="page-header-inner">

			<div class="page-logo align-items-center pb-0">
				<a >
					<h3 class="mb-0" id="test-chat">Admin</h3>
				</a>
			</div>
			<div class="page-top">
				<ul class="d-flex align-items-center justify-content-between flex-row-reverse flex-lg-row">
					<li class="d-none d-lg-block">
<a href="javascript:void(0);" class="sidebar-toggle pl-3 pl-lg-0">
<img src="{{url('assets')}}/images/sidebar-toggle-dark.png">
</a>
</li>
					<li>
						<a href="{{url('admin-logout')}}">
							<span class="d-none d-md-block">Logout</span>
							<svg width="500" height="502" viewBox="0 0 500.000000 502.000000" fill="none" xmlns="http://www.w3.org/2000/svg" class="sidebar-icon">
								<g xmlns="http://www.w3.org/2000/svg" transform="translate(0.000000,502.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
									<path d="M2360 4999 c-330 -19 -625 -96 -929 -240 -165 -79 -270 -142 -426 -259 -530 -396 -872 -976 -972 -1645 -24 -166 -24 -523 0 -690 88 -598 394 -1163 827 -1530 404 -342 834 -535 1335 -599 166 -22 340 -23 385 -3 84 37 123 140 86 228 -31 74 -98 109 -211 109 -179 0 -428 44 -634 112 -218 72 -486 218 -655 358 -99 81 -300 289 -373 386 -194 260 -327 560 -390 882 -25 127 -27 156 -27 397 -1 211 3 279 18 360 84 460 281 838 604 1162 371 373 878 597 1402 619 115 5 143 10 187 30 41 20 55 33 72 69 25 54 27 114 5 158 -47 92 -98 109 -304 96z"/>
									<path d="M3730 3778 c-65 -35 -90 -77 -90 -152 0 -40 6 -70 16 -86 9 -14 202 -211 428 -437 l411 -413 -1175 0 c-1121 0 -1177 -1 -1215 -19 -70 -32 -105 -86 -105 -161 0 -75 35 -129 105 -161 38 -18 94 -19 1215 -19 l1175 0 -411 -412 c-226 -227 -419 -424 -428 -438 -24 -37 -21 -126 7 -175 25 -46 92 -85 144 -85 74 0 98 21 571 493 255 254 483 487 506 517 73 95 91 141 94 254 4 106 -3 144 -45 236 -21 47 -97 127 -516 547 -282 284 -506 500 -526 509 -59 28 -110 29 -161 2z"/>
								</g>
							</svg>
						</a>
					</li>

					<li class="d-block d-lg-none">
						<a href="javascript:void(0);" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
						</a>
					</li>

				</ul>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<script>
$('a.sidebar-toggle').click(function(){
	$('.page-content-wrapper .page-content').toggleClass('ml-0');
	$('.page-sidebar').toggleClass('navbar-collapse');
});
</script>