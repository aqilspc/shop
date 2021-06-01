@include('layouts.header')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="index.blade.php">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
             @if($message=Session::get('success'))
        <div class="alert bg-teal" role="alert">
            <em class="fa fa-lg fa-check">&nbsp;</em> 
           <span style="color: green">{{$message}}</span>
        </div>
        @endif
            <div class="product-list">
              <form method="post" action="{{url('transaction_add')}}">
                @csrf
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $total = 0 @endphp
                    @foreach($data as $data)
                     <input type="hidden" name="item[]" value="{{$data->product_id}}">
                     <input type="hidden" name="cart[]" value="{{$data->cart_id}}">
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="{{$data->foto}}" alt="" />
                          <a href="{{url('product-single/'.$data->product_id)}}">{{$data->product_name}}</a>
                        </div>
                      </td>
                      <td class="">{{number_format(floatval($data->price))}}</td>
                      <td class="">
                        <a class="product-remove" onclick="return confirm('Remove this product from cart?')" href="{{url('remove-to-cart/'.$data->cart_id)}}">Remove</a>
                      </td>
                    </tr>
                    @php $total += $data->price; @endphp
                    @endforeach
                  </tbody>
                </table>
                <p align="right" style="color: black">Total : {{number_format($total)}}</p>
                <input type="hidden" name="total" value="{{$total}}">
                <button onclick="return confirm('Want to checkout this cart?')" type="submit" class="btn btn-main pull-right">Checkout</button>
                
                <a href="{{url('/')}}" class="btn btn-info pull-left">Or Return to shop</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')