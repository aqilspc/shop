@include('layouts.header')
@php $model = new App\Models\Home(); @endphp
@php $home = $model->getHome(); @endphp
@php $product = $model->getProduct(); @endphp

<div class="hero-slider">
  <div class="slider-item th-fullpage hero-area" style="background-image: url('{{$home->slider1}}');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{$home->text_slider1}}</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{url('/')}}">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url('{{$home->slider2}}');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-left">
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{$home->text_slider2}}</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{url('/')}}">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url('{{$home->slider3}}');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-right">
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{$home->text_slider3}}</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{url('/')}}">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>List Products</h2>
			</div>
		</div>
		<div class="row">
			@foreach($product as $p)
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<!-- <span class="bage">Sale</span> -->
						<img class="img-responsive" src="{{$p->foto}}" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<a  href="{{url('product-single/'.$p->id)}}">
										<i class="tf-ion-ios-search-strong"></i>
									</a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="{{url('product-single/'.$p->id)}}">{{$p->product_name}} - {{$p->category_name}}</a></h4>
						<p class="price">{{number_format($p->price)}}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>


@include('layouts.footer')