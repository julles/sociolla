<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sociolla</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset(null) }}css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset(null) }}css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{ asset(null) }}https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="{{ asset(null) }}https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style = "background-color:white;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ asset(null) }}#"><img height="20" src = "{{ asset(null) }}sociolla.jpg" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                	@foreach($pages->whereParentId(0)->get() as $row)

                	<?php
                	$child = $pages->whereParentId($row->id);
                	?>


                	<li class = '{{ $child->count() > 0 ? "dropdown" : "" }}'>
                    
                    @if($child->count() > 0)
                       	
                       	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $row->title }} <span class="caret"></span></a>
			        	
                       	<ul class="dropdown-menu">
			            
				            @foreach($child->get() as $rowChild)
				            	
				            	<li><a href="{{ url($rowChild->slug) }}">{{ $rowChild->title }}</a></li>
				            
				            @endforeach
			            
			            </ul>

			        @else   
                        <a href="{{ asset($row->slug) }}">{{ $row->title }}</a>
                   	@endif	
                   		
                    </li>

                	@endforeach
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                	<li><a href = "{{ url('admin-panel') }}">Login Here</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            @yield('content')
            <!-- Blog Sidebar Widgets Column -->
            
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ asset(null) }}js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset(null) }}js/bootstrap.min.js"></script>

</body>

</html>
