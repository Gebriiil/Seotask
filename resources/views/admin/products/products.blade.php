@extends('admin.index')
@section('content')
<div class="row">
	<div class="col-md-12" style="margin-top: 100px;">
		<div class="panel panel-default" >
			<div class="panel-heading">
				<h1 style="margin-bottom: 80px;"></h1>
					
					<a href="{{aurl('products/create')}}" class="btn btn-primary pull-right">Add New</a>
				
			</div>
			<div class="panel-body" style="">
				<table class="m-datatable__table" id="products-table" style="display: block;">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row" style="height: 53px;">
							<th>#</th>
							<th ><span style="width: 70px; margin-right: 50px;">Name </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">Desc </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">Price </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">image </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">Delete</span></th>
							<th ><span style="width: 70px; margin-right: 50px;">Edit</span></th>
						</tr>
					</thead>
					
				</table>
			</div>
		</div>		
	</div>
</div>
@include('admin.includes.sweet')
@endsection