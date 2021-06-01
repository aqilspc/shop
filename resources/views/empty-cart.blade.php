@include('layouts.header')

<section class="empty-cart page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
        	<i class="tf-ion-ios-cart-outline"></i>
          	<h2 class="text-center">Your cart is currently empty.</h2>
          <p>Choose the prodduct , add to cart the checkout!</p>
          	<a href="{{url('/')}}" class="btn btn-main mt-20">Return to shop</a>
      </div>
    </div>
  </div>
</section>
@include('layouts.footer')
