<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Seo
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
		@if(app()->getLocale()=='ar')
		<!-- Start Arabic -->
		<link href="{{ asset('metronic/assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('metronic/assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('metronic/assets/vendors/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
            <!-- end Arabic -->
        @endif
		<link href="{{asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{{asset('metronic/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('metronic/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!-- Noty -->
		<link href="{{asset('noty/noty.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{asset('front/img/favicon.png')}}" />
		<!-- <link rel="shortcut icon" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> -->
		<link href="{{ asset('metronic/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Cairo:300&display=swap" rel="stylesheet">

		<style type="text/css">
		
  label {
  	font-style: italic bold  serif; font-size: 16px;
  }
				
		 
		    /* Ensure that the demo table scrolls */
		    
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	</head>
	<!-- end::Head -->