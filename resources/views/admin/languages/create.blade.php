@extends('admin.index')
@section('content')
<div class="row">
			<div class="col-md-12">
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul> 
				    </div>
				@endif
				<h2>@lang('admin.Add_Languages')</h2>
				<form action="{{aurl('languages/add')}}" method="post" enctype="multipart/form-data" >
				{{csrf_field()}}
				<!--begin::Portlet-->
					<div class="m-portlet m-portlet--tab">		
						<!--begin::Form-->
						<div class="m-form m-form--fit m-form--label-align-right" >
							<div class="m-portlet__body">
								<!-- Camp Title -->
								<div class="form-group m-form__group">
									<label for="exampleInputPassword1">
										@lang('admin.Title')
									</label>
									<input type="text" class="form-control m-input" id="exampleInputPassword1" placeholder=""  name="title" value="{{old('title')}}">
								</div>
								<div class="form-group m-form__group">
									<label for="exampleInputPassword1">
										@lang('admin.Slogan')
									</label>
									<input type="text" class="form-control m-input" id="exampleInputPassword1" placeholder=""  name="slogan" value="{{old('email')}}">
								</div>
								<!-- Background Image -->
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
								
								
								
								
								
								<div class="m-form__actions" style="margin-right: 450px;">
									<button type="submit" class="btn m-btn--pill m-btn--air         btn-info">
										@lang('admin.add_lang')
									</button>
								</div>
							</div>
						</div>
					</div>
			    </form>
			</div>

	</div>
	@include('admin.includes.sweet')
	@endsection