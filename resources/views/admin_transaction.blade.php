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
				<li><a  href="{{url('dashboard')}}">Dashboard</a></li>
				<li><a  href="{{url('category')}}">Category</a></li>
				<li><a  href="{{url('product')}}">Product</a></li>
				<li><a class="active"  href="{{url('transaction')}}">Transaction</a></li>
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
										<span class="label label-primary">Waiting Approval</span>
										@elseif($dt->status==1)
										<span class="label label-danger">Cancel</span>
										@elseif($dt->status==2)
										<span class="label label-warning">Refused</span>
										@else
										<span class="label label-success">Approve & delivery</span>
										@endif
									</td>
									<td>
										@if($dt->foto==NULL)
										<a onclick="return confirm('The customer not yet to upload image!')" href="#" class="btn btn-default">
										View Image Of Transaction</a>
										@else
										<a target="_blank" href="{{$dt->foto}}" class="btn btn-default">
										View Image Of Transaction</a>
										@endif
									@if($dt->status==0)
									<a onclick="return confirm('Are you sure want to approve this transaction?')" 
									href="{{url('transaction_act/'.$dt->id.'/3')}}" class="btn btn-info">
										Approve
									</a>
									Or
									<a onclick="return confirm('Are you sure want to refuse this transaction?')" 
									ref="{{url('transaction_act/'.$dt->id.'/2')}}" class="btn btn-danger">
										Refuse
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