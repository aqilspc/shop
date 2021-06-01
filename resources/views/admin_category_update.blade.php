@include('layouts.header')

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.blade.php">Home</a></li>
						<li class="active">my account</li>
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
				<li><a  href="{{url('order')}}">Category</a></li>
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
						<div class="pull-left">
							<img class="media-object user-img" src="assets/images/avater.jpg" alt="Image">
						</div>
						<div class="media-body">
							<h2 class="media-heading">Categories</h2>
							<p>Manage category online shop  </p>
						</div>
					</div>
					<div class="total-order mt-20">

					<form  method="POST" action="{{ url('category_update/'.$data->id) }}" enctype="multipart/form-data">@csrf
			            <div class="form-group">
			            	<label>Catgeory Name</label>
			              <input type="text" class="form-control" value="{{$data->category_name}}" name="category_name" placeholder="">
			            </div>
			            <div class="form-group">
			            	<label>Descriptiion </label>
			              <input type="text" class="form-control" value="{{$data->slug}}"  name="slug" placeholder="">
			            </div>
			            <div class="form-group">
			            	<label>Image</label>
			              <input type="file" class="form-control" name="foto" placeholder="Online Shop Contact">
			              <img src="{{$data->foto}}" style="width: 40%">
			               <input type="hidden" name="old_foto" value="{{$data->foto}}">
			            </div>
			            <div class="text-center">
			              <button type="submit" class="btn btn-main text-center" >submit</button>
			            </div>
			          </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



@include('layouts.footer')