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

					<form  method="POST" action="{{ url('product_create') }}" enctype="multipart/form-data">@csrf
						 <div class="form-group">
			            	<label>Product Category</label>
			             <select name="category_id" class="form-control">
			             	@foreach($category as $c)
			             	<option value="{{$c->id}}">{{$c->category_name}}</option>
			             	@endforeach
			             </select>
			            </div>
			            <div class="form-group">
			            	<label>Product Name</label>
			              <input type="text" required class="form-control"  name="product_name" placeholder="Product Name">
			            </div>
			            <div class="form-group">
			            	<label>Product Descriptiion </label>
			              <input type="text" required class="form-control"  name="description" placeholder="Product Descriptiion ">
			            </div>
			            <div class="form-group">
			            	<label>Product Image</label>
			              <input type="file" required class="form-control" name="foto" placeholder="Product Image">
			            </div>
			            <div class="form-group">
			            	<label>Product Price</label>
			              <input type="text" required class="form-control" name="price" placeholder="roduct Price">
			            </div>
			            <div class="text-center">
			              <button type="submit" class="btn btn-main text-center" >submit</button>
			            </div>
			          </form>
					</div>
					<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table table-striped b-t b-b" id="tableok">
							<thead>
								<tr>
									<th>Name Product</th>
									<th>Price Product</th>
									<th>Category Product</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $d)
								<tr>
									<td>{{$d->product_name}}</td>
									<td>{{number_format($d->price)}}</td>
									<td>{{$d->category_name}}</td>
									<td>
										<a href="{{url('/product_edit/'.$d->id)}}" class="btn btn-success">update</a>
										<a onclick="return confirm('are you sure want to delete?')" href="{{url('/product_delete/'.$d->id)}}" class="btn btn-danger">delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>



@include('layouts.footer')