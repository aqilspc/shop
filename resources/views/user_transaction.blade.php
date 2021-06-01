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
				<li><a class="active"  href="{{url('order')}}">Order</a></li>
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
					<div class="table-responsive">
						<table class="table" id="tableok">
							<thead>
								<tr>
									<th>Customer</th>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items</th>
									<th>Total Price</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<p align="center"> You can transfer to this number 0875735538 BCA An Samsul Arifin</p>
							<tbody>
								@php $model = new App\Models\Home(); @endphp
								@foreach($data as $dt)
								<tr>
									<td>{{$model->get_user_id($dt->user_id)}}</td>
									<td>#{{$dt->no_transaction}}</td>
									<td>{{$dt->date}}</td>
									<td>{{$model->countItem($dt->id)}}</td>
									<td>{{number_format($dt->total)}}</td>
									<td>	
										@if($dt->status==0)
										<span class="label label-primary">Waiting Approval & Must be Upload If Done Wait it!</span>
										@elseif($dt->status==1)
										<span class="label label-danger">Cancel</span>
										@elseif($dt->status==2)
										<span class="label label-warning">Refused</span>
										@else
										<span class="label label-success">Approve & delivery</span>
										@endif
									</td>
									<td>

									@if($dt->status==0)
									<a onclick="return confirm('Are you sure want to refuse this transaction?')" 
									href="{{url('transaction_act/'.$dt->id.'/1')}}" class="btn btn-danger">
										Cancel
									</a>
									@if($dt->foto==NULL)
									<form id="bukti-{{$dt->no_transaction}}" enctype="multipart/form-data" method="post" action="{{url('up_image')}}">
										@csrf
									<input type="hidden" name="no_transaction" value="{{$dt->no_transaction}}">
									<input onchange="upload_image('<?php echo $dt->no_transaction?>');" type="file" name="foto" class="btn btn-dange">
										Upload
									</form>
									@else
									<a  
									href="{{$dt->foto}}" target="_blank" class="btn btn-success">
										View Image
									</a>
									@endif
									@elseif($dt->status==3)
									<a  
									href="{{url('transaction_pdf/'.$dt->id)}}" target="_blank" class="btn btn-success">
										Download Sales Recipt
									</a>
									@endif
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
</section>

@include('layouts.footer')