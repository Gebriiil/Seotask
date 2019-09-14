@include('admin.includes.header')
@include('admin.includes.nav')
@include('admin.includes.aside')

	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-content">
			
			@yield('content')
		</div>
	</div>
					
						
</div>
			<!-- end:: Body -->

@include('admin.includes.footer')