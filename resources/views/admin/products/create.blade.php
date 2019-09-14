@extends('admin.index')
@section('content')

<div class="row">

	<div class="col-md-12">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 style="margin-top: 20px;margin-right: 20px;">
								@lang('admin.products')
						</h3>
					</div>
				</div>
			</div>
			@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right" action="{{aurl('products/add')}}" method="post" enctype="multipart/form-data"> 
				{{csrf_field()}}
				<div class="m-portlet__body">
					<ul class="nav nav-pills nav-fill" role="tablist">
						@foreach(lans() as $locale)
							<?php 
							$expanded='';
							if($locale->slogan=='ar' && app()->getLocale() == 'ar'){
										$expanded='active';
									}
							if($locale->slogan=='en' && app()->getLocale() == 'en'){
										$expanded='active';
									}
										?>
						<li class="nav-item">
							<a class="nav-link {{$expanded}}" data-toggle="tab" href="#m_tabs_our_plus_5_{{$locale->slogan}}" aria-expanded="true">
							@if($locale->slogan == 'ar')
								@lang('admin.arabic')
							@elseif($locale->slogan == 'en')
								@lang('admin.english')
							@else
								@lang('admin.german')
							@endif
							</a>
						</li>
						@endforeach
					</ul>
													
					<div class="tab-content">
						@foreach(lans() as $locale)					<?php 
							$expanded='';
							if($locale->slogan=='ar' && app()->getLocale() == 'ar'){
										$expanded='active';
									}
							if($locale->slogan=='en' && app()->getLocale() == 'en'){
										$expanded='active';
									}
										?>	
						<div class="tab-pane {{$expanded}}" id="m_tabs_our_plus_5_{{$locale->slogan}}" role="tabpanel" aria-expanded="{{$expanded}}">
							<div class="m-portlet__body">
								<!-- Section one -->
								<div class="form-group m-form__group">
									<label for="exampleInputEmail1">
										 @lang('admin.name')
									</label>
									<input  type="text" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل العنوان الخدمه " name="{{$locale->slogan}}[name]"  value="">	
								</div>
								<!-- Description -->
								<div class="form-group m-form__group">
									<label for="exampleTextarea">
										@lang('admin.desc') 
									</label>
									<textarea  class="form-control m-input" id="exampleTextarea" rows="3" name="{{$locale->slogan}}[desc]"></textarea>
								</div>
								
								
								<div class="form-group m-form__group">
									<label for="exampleInputEmail1">
										 @lang('admin.Slogan')
									</label>
									<input  type="text" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" " name="{{$locale->slogan}}[price]" value="" >	
								</div>
								
								
								
									
							</div>			
						</div>
							@endforeach
						<hr>
						<!-- Image -->
						<div class="form-group m-form__group">
							<label for="exampleInputEmail1">
									@lang('admin.image')
							</label>
							<div></div>
							<label class="custom-file">
								<input type="file" id="file2" class="custom-file-input image" name="image">
								<span class="custom-file-control"></span>
							</label>
						</div>
						<img src="" class="image-preview" style="width:100px;margin-right: 19px;">
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit" >
						<div class="m-form__actions" style="margin-right: 450px;">
							<button type="Submit" class="btn btn-primary">@lang('admin.add_product')
							</button>
						</div>
					</div>
				</div>
			</form>
									<!--end::Form-->
		</div>
								<!--end::Portlet-->
	</div>

	
</div>
@endsection