<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Mango SIMS</title>

	<!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="{{ asset('codebase/assets/media/favicons/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('codebase/assets/media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('codebase/assets/media/favicons/apple-touch-icon-180x180.png') }}">
  <!-- END Icons -->

  <!-- Stylesheets -->

  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('codebase/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('codebase/assets/js/plugins/fullcalendar/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('codebase/assets/js/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('codebase/assets/js/plugins/slick/slick-theme.css') }}">

  <!-- Fonts and Codebase framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
  <link rel="stylesheet" id="css-main" href="{{ asset('codebase/assets/css/codebase.min.css') }}">

  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
  <!-- END Stylesheets -->
</head>
<body>
	@auth
		<!-- Page Container -->
		<!--
			Available classes for #page-container:

		GENERIC

		  'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

		SIDEBAR & SIDE OVERLAY

		  'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
		  'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
		  'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
		  'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
		  'sidebar-inverse'                           Dark themed sidebar

		  'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
		  'side-overlay-o'                            Visible Side Overlay by default

		  'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

		  'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

		HEADER

		  ''                                          Static Header if no class is added
		  'page-header-fixed'                         Fixed Header

		HEADER STYLE

		  ''                                          Classic Header style if no class is added
		  'page-header-modern'                        Modern Header style
		  'page-header-inverse'                       Dark themed Header (works only with classic Header style)
		  'page-header-glass'                         Light themed Header with transparency by default
		                                              (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
		  'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
		                                              (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

		MAIN CONTENT LAYOUT

		  ''                                          Full width Main Content if no class is added
		  'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
		  'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
		-->
		<div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-glass page-header-fixed page-header-inverse main-content-boxed">
		  <!-- Side Overlay-->
		  
		  <!-- END Side Overlay -->
		  @include('layouts/side-overlay')
		  <!-- Sidebar -->
		  @include('layouts/sidebar')
		  <!-- END Sidebar -->

		  <!-- Header -->
		  @include('layouts/header')
		  <!-- END Header -->
  @endauth

	@yield('content')

	<!-- END Page Container -->
	<!--
	      Codebase JS Core

	      Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
	      to handle those dependencies through webpack. Please check out codebase/assets/_es6/main/bootstrap.js for more info.

	      If you like, you could also include them separately directly from the codebase/assets/js/core folder in the following
	      order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

	      codebase/assets/js/core/jquery.min.js
	      codebase/assets/js/core/bootstrap.bundle.min.js
	      codebase/assets/js/core/simplebar.min.js
	      codebase/assets/js/core/jquery-scrollLock.min.js
	      codebase/assets/js/core/jquery.appear.min.js
	      codebase/assets/js/core/jquery.countTo.min.js
	      codebase/assets/js/core/js.cookie.min.js
	  -->
	  <script src="{{ asset('codebase/assets/js/core/jquery.min.js') }}"></script>
	  <script src="{{ asset('codebase/assets/js/codebase.core.min.js') }}"></script>

	  <!--
	      Codebase JS

	      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
	      webpack is putting everything together at codebase/assets/_es6/main/app.js
	  -->
	  <script src="{{ asset('codebase/assets/js/codebase.app.min.js') }}"></script>

	  <!-- Page JS Plugins -->
	  <script src="{{ asset('codebase/assets/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
	  <script src="{{ asset('codebase/assets/js/plugins/slick/slick.min.js') }}"></script>
	  <script src="{{ asset('codebase/assets/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('codebase/assets/js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('codebase/assets/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('codebase/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('codebase/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

	  <!-- Page JS Code -->
	  <script src="{{ asset('codebase/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
	  <script src="{{ asset('codebase/assets/js/pages/be_tables_datatables.min.js') }}"></script>

	  <!-- Custom JS -->
	  <script type="text/javascript">
    $(document).ready(function()
    {
    	console.log("jQuery ready");
    	// Get Province
      $('select[name="region"]').on('change', function(){
         var region_code = $(this).val();
         console.log("Selected region: " + region_code);
         if(region_code)
         {
            $.ajax({
               url : '/dropdownlist/getprovinces/' + region_code,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  console.log(data);
                  $('select[name="province"]').prop('disabled', false);
                  $('select[name="province"]').empty();
                  $.each(data, function(key, value){
                     $('select[name="province"]').append('<option value="'+ key +'">'+ value +'</option>');
                  });
               }
            });
         }
         else
         {
            $('select[name="province"]').empty();
            $('select[name="province"]').prop('disabled', 'disabled');
         }
      });
      // Get Municipality / City
      $('select[name="province"]').on('change', function(){
         var province_code = $(this).val();
         console.log("Selected province: " + province_code);
         if(province_code)
         {
            $.ajax({
               url : '/dropdownlist/getcities/' + province_code,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  console.log(data);
                  $('select[name="municipality"]').prop('disabled', false);
                  $('select[name="municipality"]').empty();
                  $.each(data, function(key, value){
                     $('select[name="municipality"]').append('<option value="'+ key +'">'+ value +'</option>');
                  });
               }
            });
         }
         else
         {
            $('select[name="municipality"]').empty();
            $('select[name="municipality"]').prop('disabled', 'disabled');
         }
      });
      // Get Barangays
      $('select[name="municipality"]').on('change', function(){
         var municipality_code = $(this).val();
         console.log("Selected municipality / city: " + municipality_code);
         if(municipality_code)
         {
            $.ajax({
               url : '/dropdownlist/getbarangays/' + municipality_code,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  console.log(data);
                  $('select[name="brgy"]').prop('disabled', false);
                  $('select[name="brgy"]').empty();
                  $.each(data, function(key, value){
                     $('select[name="brgy"]').append('<option value="'+ key +'">'+ value +'</option>');
                  });
               }
            });
         }
         else
         {
            $('select[name="brgy"]').empty();
            $('select[name="brgy"]').prop('disabled', 'disabled');
         }
      });
    });
    </script>
</body>
</html>