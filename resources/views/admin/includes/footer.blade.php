<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer " style="width: 80.5%;">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2017 &copy; Metronic theme by
								<a href="#" class="m-link">
									Keenthemes
								</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											About
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#"  class="m-nav__link">
										<span class="m-nav__link-text">
											Privacy
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											T&C
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											Purchase
										</span>
									</a>
								</li>
								<li class="m-nav__item m-nav__item">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    		        <!-- begin::Quick Sidebar -->
		
		<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->
		
		<!-- begin::Quick Nav -->	
    	<!--begin::Base Scripts -->
		<script src="{{asset('metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="{{asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="{{asset('metronic/assets/app/js/dashboard.js')}}" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!-- DataTablessssssssssssssss -->
        <script src="{{ asset('metronic/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
		  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript">
			$('#admin-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{route('admin.api')}}",
            columns: [
                {data:'id' , name:'id'},
                {data:'name' , name:'name'},
                {data:'email' , name:'email'},
                {data:'image' , name:'image',orderable: false , searchable: false},
                {data:'delete' , name:'delete' , orderable: false , searchable: false},
                {data:'edit' , name:'edit' , orderable: false , searchable: false},
            ]

	        });
	        $('#languages-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{route('languages.api')}}",
            columns: [
                {data:'id' , name:'id'},
                {data:'title' , name:'title'},
                {data:'slogan' , name:'slogan'},
                {data:'image' , name:'image',orderable: false , searchable: false},
                {data:'delete' , name:'delete' , orderable: false , searchable: false},
                {data:'edit' , name:'edit' , orderable: false , searchable: false},
            ]

	        });
	        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{route('products.api')}}",
            columns: [
                {data:'id' , name:'id'},
                {data:'name' , name:'name',orderable: false , searchable: false},
                {data:'desc' , name:'desc',orderable: false , searchable: false},
                {data:'price' , name:'price',orderable: false , searchable: false},
                {data:'image' , name:'image',orderable: false , searchable: false},
                {data:'delete' , name:'delete' , orderable: false , searchable: false},
                {data:'edit' , name:'edit' , orderable: false , searchable: false},
            ]

	        });
	        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{route('users.api')}}",
            columns: [
                {data:'id' , name:'id'},
                {data:'name' , name:'name'},
                {data:'email' , name:'email'},
                {data:'phone' , name:'phone'},
                {data:'status' , name:'status',orderable: false , searchable: false},
                {data:'action' , name:'action',orderable: false , searchable: false},
            ]

	        });
		</script>
		<script src="{{asset('js/user.js')}}"></script>
	</body>
	<!-- end::Body -->
</html>