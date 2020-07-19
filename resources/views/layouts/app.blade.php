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

	  <!-- Page JS Code -->
	  <script src="{{ asset('codebase/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
</body>
</html>