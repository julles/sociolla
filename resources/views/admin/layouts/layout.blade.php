<!DOCTYPE HTML>
<html>
<head>
<title>Sociolla Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{ asset(null) }}admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset(null) }}admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{ asset(null) }}admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{ asset(null) }}admin/js/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="{{ asset(null) }}admin/js/modernizr.custom.js"></script>
<script src="{{ asset(null) }}admin/ckeditor/ckeditor.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{ asset(null) }}admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<script src="{{ asset(null) }}admin/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="{{ asset(null) }}admin/js/metisMenu.min.js"></script>
<script src="{{ asset(null) }}admin/js/custom.js"></script>
<link href="{{ asset(null) }}admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		@if(Auth::check())
			@include('admin.layouts.sidebar')
		@endif
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="{{ url('admin-panel') }}">
						<h1>SOCIOLLA</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details_left"><!--notifications of menu start -->
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="{{ asset(null) }}admin/#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							@if(Auth::check())	
								<div class="profile_img">	
									<div class="user-name">
										<p>{{ \Auth::user()->name }}</p>
										<span>{{ \Auth::user()->role->name }}</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							@endif
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>	
		</div>
		
		@yield('content')

		<div class="footer">
		   <p>&copy; 2016 Sociolla Admin Panel. | Developer by <a href="https://github.com/julles/sociolla" target="_blank">Reza</a></p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="{{ asset(null) }}admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="{{ asset(null) }}admin/js/jquery.nicescroll.js"></script>
	<script src="{{ asset(null) }}admin/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="{{ asset(null) }}admin/js/bootstrap.js"> </script>
   
   @yield('script')

</body>
</html>