@include('layouts.header')

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.blade.php">Home</a></li>
						<li class="active">Category</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
				@if(Auth::user()->role=='admin')
				<li><a  href="{{url('home')}}">Dashboard</a></li>
				<li><a href="{{url('category')}}">Category</a></li>
				<li><a href="{{url('product')}}">Product</a></li>
				<li><a  href="{{url('transaction')}}">Transaction</a></li>
				<li><a class="active" href="{{url('profile')}}">Profile Details</a></li>
				<li><a href="#" style="cursor: pointer;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>    
                                    Logout                               	
                </a>
            </li>
				@else
				<li><a  href="{{url('order')}}">Order</a></li>
				<li><a class="active" href="{{url('profile')}}">Profile Details</a></li>
				<li><a href="#" style="cursor: pointer;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>    
                                    Logout                               	
                </a>
            </li>
            @endif
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
		          <div class="media">
		            <div class="pull-left text-center" href="#!">
		              <img class="media-object user-img" src="{{Auth::user()->foto}}" alt="Image">
		            <!--   <a href="#x" class="btn btn-transparent mt-20">Change Image</a> -->
		            </div>
		            <div class="media-body">
		              <ul class="user-profile-list">
		                <li><span>Full Name:</span>{{Auth::user()->name}}</li>
		                <li><span>Country:</span>{{Auth::user()->country}}</li>
		                <li><span>Email:</span>{{Auth::user()->email}}</li>
		                <li><span>Phone:</span>{{Auth::user()->phone}}</li>
		                <li><span>Date of Birth:</span>{{Auth::user()->birth}}</li>
		              </ul>
		            </div>
		          </div>
		        </div>
				<div class="dashboard-wrapper user-dashboard">
					<div class="media">
						<!-- <div class="pull-left">
							<img class="media-object user-img" src="assets/images/avater.jpg" alt="Image">
						</div> -->
						<div class="media-body">
							<h2 class="media-heading">Profile Details</h2>
							<p>Manage Profile Details {{Auth::user()->role}}</p>
						</div>
					</div>
					<div class="total-order mt-20">

					<form  method="POST" action="{{ url('profile_update') }}" enctype="multipart/form-data">@csrf
			            <div class="form-group">
			            	<label>Profile Name</label>
			              <input type="text" value="{{Auth::user()->name}}" required class="form-control"  name="name" placeholder="">
			            </div>
			            <div class="form-group">
			            	<label>Profile Email </label>
			              <input type="text" value="{{Auth::user()->email}}" required class="form-control"  name="email" placeholder="">
			            </div>
			            <div class="form-group">
			            	<label>Profile Password </label>
			              <input type="password" required class="form-control"  name="password" placeholder="">
			            </div>
			             <div class="form-group">
			            	<label>Profile Phone </label>
			              <input type="text" value="{{Auth::user()->phone}}" required class="form-control"  name="phone" placeholder="">
			            </div>
			             <div class="form-group">
			            	<label>Profile Country </label>
			              <input type="text" value="{{Auth::user()->country}}" required class="form-control"  name="country" placeholder="">
			            </div>
			             <div class="form-group">
			            	<label>Profile Birth Date </label>
			              <input type="date" value="{{Auth::user()->birth}}" required class="form-control"  name="birth" placeholder="">
			            </div>
			            <div class="form-group">
			            	<label>Image Profile</label>
			              <input type="file" required class="form-control" name="foto" placeholder="Online Shop Contact">
			            </div>
			            <div class="text-center">
			              <button type="submit" class="btn btn-main text-center" >Update</button>
			            </div>
			          </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



@include('layouts.footer')