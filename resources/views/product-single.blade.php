@include('layouts.header')
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li>Home</li>
					<li>Shop</li>
					<li>Product</li>
					<li class="active">{{$data->product_name}}</li>
				</ol>
			</div>
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='{{$data->foto}}' alt='' data-zoom-image="{{$data->foto}}" />
								</div>
								
							</div>
						</div>
						
						<!-- thumb -->
						<!-- <ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src='{{$data->foto}}' alt='' />
							</li>
						</ol> -->
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2>{{$data->product_name}}</h2>
					<p class="product-price">{{number_format(floatval($data->price))}}</p>
					
					<p class="product-description mt-20">
						{{$data->description}}
					</p>
					<div class="product-category">
						<span>Categories:</span>
						<ul>
							<li><a href="#">{{$data->category_name}}</a></li>
							<!-- <li><a href="product-single.blade.php">Soap</a></li> -->
						</ul>
					</div>
					<a onclick="return confirm('Add this product to cart?')" href="{{url('add-to-cart/'.$data->id)}}" class="btn btn-main mt-20">Add To Cart</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('layouts.footer')