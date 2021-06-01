@include('layouts.header')

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.blade.php">Home</a></li>
						<li class="active">Dashboard Admin</li>
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
				<li><a class="active" href="{{url('dashboard')}}">Dashboard</a></li>
				<li><a  href="{{url('category')}}">Category</a></li>
				<li><a  href="{{url('product')}}">Product</a></li>
				<li><a  href="{{url('transaction')}}">Transaction</a></li>
				<li><a href="{{url('profile')}}">Profile Details</a></li>
				<li><a href="#" style="cursor: pointer;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>    
                                    Logout                               	
                </a>
            </li>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<div class="media">
						<div class="media-body">
							<h2 class="media-heading">Welcome {{Auth::user()->name}}</h2>
							<p>Manage your online shop page view on here! </p>
						</div>
					</div>
					<div class="total-order mt-20">
					<form  method="POST" action="{{ url('update_homes') }}" enctype="multipart/form-data">@csrf
			            <div class="form-group">
			            	<label>Online Shop Name</label>
			              <input type="text" class="form-control" value="{{$data->name_shop}}" name="name_shop" placeholder="Online Shop Name">
			            </div>
			            <div class="form-group">
			            	<label>Online Shop Contact</label>
			              <input type="text" class="form-control" value="{{$data->phone}}" name="phone" placeholder="Online Shop Contact">
			            </div>
			            <div class="form-group">
			            	<label>Slider 1 Image</label>
			              <input type="file" class="form-control" name="slider1" placeholder="Online Shop Contact">
			              <img src="{{$data->slider1}}" style="width: 40%">
			               <input type="hidden" name="old_slider1" value="{{$data->slider1}}">
			            </div>
			             <div class="form-group">
			            	<label>Text Slider 1 Image</label>
			              <input type="text" value="{{$data->text_slider1}}" class="form-control" name="text_slider1" >
			            </div>
			             <div class="form-group">
			            	<label>Slider 2 Image</label>
			              <input type="file" class="form-control" name="slider2" placeholder="Online Shop Contact">
			              <img src="{{$data->slider2}}" style="width: 40%">
			              <input type="hidden" name="old_slider2" value="{{$data->slider2}}">
			            </div>
			             <div class="form-group">
			            	<label>Text Slider 2 Image</label>
			              <input type="text" value="{{$data->text_slider2}}" class="form-control" name="text_slider2">
			            </div>
			             <div class="form-group">
			            	<label>Slider 3 Image</label>
			              <input type="file" class="form-control" name="slider3" >
			              <img src="{{$data->slider3}}" style="width: 40%">
			               <input type="hidden" name="old_slider3" value="{{$data->slider3}}">
			            </div>
			             <div class="form-group">
			            	<label>Text Slider 3 Image</label>
			              <input type="text" value="{{$data->text_slider3}}" class="form-control" name="text_slider3" >
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