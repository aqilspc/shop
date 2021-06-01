<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/favicon.png')}}" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{url('assets/plugins/themefisher-font/style.css')}}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="{{url('assets/plugins/animate/animate.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{url('assets/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/slick/slick-theme.css')}}">
   <!-- <script src="https://kit.fontawesome.com/a02a2da5e2.js" crossorigin="anonymous"></script> -->
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>

<body id="body">
@php $model = new App\Models\Home(); @endphp
@php $home = $model->getHome(); @endphp
@php $cart = $model->getCart(); @endphp
<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>{{$home->phone}}</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="{{url('/')}}">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">{{$home->name_shop}}</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a  href="{{url('carts')}}"><i
								class="tf-ion-android-cart">
									<v style="color: red">{{$cart}}</v>
								</i>Cart</a>
					

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						
								
						
					</li><!-- / Search -->

					

					<!-- Languages -->
					

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						
						@guest
						<a href="{{url('/')}}">Home</a></li>
						@endauth
						@auth
						@if(Auth::user()->role=='admin')
						<li class="dropdown ">
						<a href="{{url('home')}}">Dashboard</a>
					</li>
					<li class="dropdown ">
						<a href="{{url('/')}}">Home</a>
					</li>
						@else
						<li class="dropdown ">
						<a href="{{url('/')}}">Home</a>
					</li>
						<li class="dropdown ">
						<a href="{{url('order')}}">My Order</a>
						@endif
						@endauth
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-12 col-md-6 mb-sm-3">
									<ul>
										<!-- <li class="dropdown-header">Menu</li>
										<li role="separator" class="divider"></li> -->
										<li><a href="{{url('/')}}">Shop</a></li>
										<li><a href="{{url('carts')}}">Cart</a></li>
									</ul>
								</div>

								<!-- Layout -->
								<!-- <div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Layout</li>
										<li role="separator" class="divider"></li>
										<li><a href="{{url('product-single')}}">Product Details</a></li>
										<li><a href="{{url('shop-sidebar')}}">Shop With Sidebar</a></li>

									</ul>
								</div> -->

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->






					<!-- Blog -->
					<li class="dropdown dropdown-slide">
						@guest
						<a href="{{url('loginweb')}}" >Login <span
								class=""></span></a>
						@endauth
						@auth
						<a  href="#" >Halo {{Auth::user()->name}}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						@endauth
					</li><!-- / Blog -->

					<!-- Shop -->
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>