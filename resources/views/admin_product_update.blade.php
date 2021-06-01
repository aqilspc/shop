@include('layouts.header')

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.blade.php">Home</a></li>
						<li class="active">Product</li>
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
				<li><a  href="{{url('home')}}">Dashboard</a></li>
				<li><a  href="{{url('category')}}">Category</a></li>
				<li><a class="active" href="{{url('product')}}">Product</a></li>
				<li><a  href="{{url('ransaction')}}">Transaction</a></li>
				<li><a  href="{{url('profile')}}">Profile Details</a></li>
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
						<!-- <div class="pull-left">
							<img class="media-object user-img" src="assets/images/avater.jpg" alt="Image">
						</div> -->
						<div class="media-body">
							<h2 class="media-heading">Product</h2>
							<p>Manage product online shop  </p>
						</div>
					</div>
					<div class="total-order mt-20">

					<form  method="POST" action="{{ url('product_update/'.$data->id) }}" enctype="multipart/form-data">@csrf
						 <div class="form-group">
			            	<label>Product Category</label>
			             <select name="category_id" class="form-control">
			             	@foreach($category as $c)
			             	<option value="{{$c->id}}" {{ ( $data->category_id == $c->id) ? 'selected' : '' }}>
			             		{{$c->category_name}}
			             	</option>
			             	@endforeach
			             </select>
			            </div>
			            <div class="form-group">
			            	<label>Product Name</label>
			              <input type="text" value="{{$data->product_name}}" required class="form-control"  name="product_name" placeholder="Product Name">
			            </div>
			            <div class="form-group">
			            	<label>Product Descriptiion </label>
			              <input type="text" value="{{$data->description}}" required class="form-control"  name="description" placeholder="Product Descriptiion ">
			            </div>
			            <div class="form-group">
			            	<label>Product Image</label>
			              <input type="file"  class="form-control" name="foto" placeholder="Product Image">
			               <img src="{{$data->foto}}" style="width: 40%">
			               <input type="hidden" name="old_foto" value="{{$data->foto}}">
			            </div>
			            <div class="form-group">
			            	<label>Product Price</label>
			              <input type="text" value="{{$data->price}}" required class="form-control" name="price" placeholder="roduct Price">
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