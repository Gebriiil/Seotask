@extends('admin.index')
@section('content')
<div class="row">
	<div class="col-md-12" style="margin-top: 100px;">
		<div class="panel panel-default" >
			<div class="panel-heading">
				<h1 style="margin-bottom: 80px;"></h1>
					
					<a href="{{aurl('languages/create')}}" class="btn btn-primary pull-right">@lang('admin.add_new')</a>
				
			</div>
			<div class="panel-body" style="">
				<table class="m-datatable__table" id="languages-table" style="display: block;">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row" style="height: 53px;">
							<th>#</th>
							<th ><span style="width: 70px; margin-right: 50px;">@lang('admin.Title') </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">@lang('admin.Slogan') </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">@lang('admin.image') </span></th>
							<th ><span style="width: 70px; margin-right: 50px;">@lang('admin.delete')</span></th>
							<th ><span style="width: 70px; margin-right: 50px;">@lang('admin.edit')</span></th>
						</tr>
					</thead>
					
				</table>
			</div>
		</div>		
	</div>
</div>
@include('admin.includes.sweet')
@endsection