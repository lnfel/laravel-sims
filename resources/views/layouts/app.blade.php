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
  <style type="text/css">
    .form-material.form-error .form-control {
      box-shadow: 0 1px 0 #db4343;
    }

    .form-material.form-error label {
      color: #db4343;
    }
  </style>
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
      $.fn.getAccountTypes = function() {
        $.ajax({

        });
      }

      $.fn.getEmployeeData = function(employee_number) {
        console.log("Employee number: " + employee_number);

        $.ajax({
          url: '/employees/' + employee_number + '/edit',
          type: "GET",
          dataType: "json",
          success: function(data) {
            console.log("Current Employee Data");
            console.table(data['account'], ["id", "username", "email"]);
            console.table(data['employee'], ["id", "number", "first_name", "last_name", "address", "personal_email"]);

            $('#edit-employee').prop('action', '/employees/' + data['employee'][0]['id']);

            // Account Info
            $('#edit-employee').find('select[name="account_type"]').val(data['account'][0]['account_type_id']).change();
            $('#edit-employee').find('input[name="personal_email"]').val(data['employee'][0]['personal_email']).parent('.form-material').addClass('open');

            // Personal Info
            $('#edit-employee').find('input[name="first_name"]').val(data['employee'][0]['first_name']).parent('.form-material').addClass('open');
            $('#edit-employee').find('input[name="middle_name"]').val(data['employee'][0]['middle_name']).parent('.form-material').addClass('open');
            $('#edit-employee').find('input[name="last_name"]').val(data['employee'][0]['last_name']).parent('.form-material').addClass('open');

            //var response = JSON.parse(data);
            //console.log(response);
          }
        })
        .done(function(data) {
          console.log("Employee request done, checking for address...");
          if (data['employee'][0]['region'] != null) {
            console.log("Associated address found.");
          } else {
            console.log("No address associated with current employee.");
            var exists = true;
            var modal_id = "update-employee";
            var testRegion = "04";
            var region_code = testRegion;
            var testProvince = "0458";
            var province_code = testProvince;
            var testCity = "045813";
            var city_municipality_code = testCity;
            var testBarangay = "045813001";
            var testZipCode = "1920";

            //$('#edit-employee').find('select[name="region"]').val(data['employee'][0]['region']).change();
            $('#edit-employee').find('select[name="region"]').val(testRegion).change();
            if (exists) {
              $('#edit-employee').find('input[name="address"]').val(data['employee'][0]['address']).parent('.form-material').addClass('open');
              $.fn.getProvinces(region_code, exists, modal_id, testProvince);
              $.fn.getCities(province_code, exists, modal_id, testCity);
              $.fn.getBarangays(city_municipality_code, exists, modal_id, testBarangay);
              //$('#edit-employee').find('input[name="zip_code"]').val(data['employee'][0]['zip_code']).parent('.form-material').addClass('open');
              $('#edit-employee').find('input[name="zip_code"]').val(testZipCode).parent('.form-material').addClass('open');
            }
          }
        });
      }

      $.fn.getProvinces = function(region_code, exists, modal_id, testProvince) {
        console.log("Checking modal_id...")
        console.log(modal_id);
        console.log(region_code);
        console.log(exists);
        console.log(testProvince);
        $.ajax({
          url : '/dropdownlist/getprovinces/' + region_code,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log("Getting province...");
            console.table(data);
            $('#' + modal_id).find('select[name="province"]').prop('disabled', false);
            $('#' + modal_id).find('select[name="province"]').empty();
            $('#' + modal_id).find('select[name="province"]').append('<option hidden>-- Provinces loaded --</option>');
            $.each(data, function(key, value){
               $('#' + modal_id).find('select[name="province"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
            console.log("Populated data on: " + modal_id);
          },
          complete:function(data){
            if (exists) {
              //$('#edit-employee').find('select[name="province"]').val(data[employee][0]['province']).change();
              $('#' + modal_id).find('select[name="province"]').val(testProvince).change();
            }
          }
        })
        .done(function(data){
          return data;
        });
      }

      $.fn.getCities = function(province_code, exists, modal_id, testCity) {
        $.ajax({
          url : '/dropdownlist/getcities/' + province_code,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log("Getting Cities and Municipalities");
            console.table(data);
            $('#' + modal_id).find('select[name="municipality"]').prop('disabled', false);
            $('#' + modal_id).find('select[name="municipality"]').empty();
            $('#' + modal_id).find('select[name="municipality"]').append('<option hidden>-- Cities and Municipality loaded --</option>');
            $.each(data, function(key, value){
               $('#' + modal_id).find('select[name="municipality"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          },
          complete:function(data){
            if (exists) {
              //$('#edit-employee').find('select[name="municipality"]').val(data[employee][0]['municipality']).change();
              $('#' + modal_id).find('select[name="municipality"]').val(testCity).change();
            }
          }
        })
        .done(function(data){
          return data;
        });
      }

      $.fn.getBarangays = function(city_municipality_code, exists, modal_id, testBarangay) {
        $.ajax({
          url : '/dropdownlist/getbarangays/' + city_municipality_code,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log("Getting Barangays");
            console.table(data);
            $('#' + modal_id).find('select[name="brgy"]').prop('disabled', false);
            $('#' + modal_id).find('select[name="brgy"]').empty();
            $('#' + modal_id).find('select[name="brgy"]').append('<option hidden>-- Baranggays loaded --</option>');
            $.each(data, function(key, value){
               $('#' + modal_id).find('select[name="brgy"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          },
          complete:function(data){
            if (exists) {
              //$('#edit-employee').find('select[name="brgy"]').val(data[employee][0]['brgy']).change();
              $('#' + modal_id).find('select[name="brgy"]').val(testBarangay).change();
            }
          }
        })
        .done(function(data){
          return data;
        });
      }
    	
      $('.modal').on('shown.bs.modal', function(e) {
        var id = $(this).attr('id');
        console.log(id);

        if (id === "update-employee") {
          var employee_number = $(e.relatedTarget).data('target-id');
          $('#edit-number').prop('readonly', false).parent('.form-material').addClass('open');
          $('#edit-number').val(employee_number);
          $('#edit-number').prop('readonly', true);
          $('#edit-employee').find('select').prop('disabled', false);
          $('#edit-employee').find('select').parent('.form-material').addClass('open');
          $.fn.getEmployeeData(employee_number);
        } else {
          var exists = false;
          var modal_id = "store-employee";
          $('#number').parent('.form-material').addClass('open');

          $('#store-employee').find('select[name="region"]').on('change', function(){
            var region_code = $(this).val();
            $.fn.getProvinces(region_code, exists, modal_id);
          });

          $('#store-employee').find('select[name="province"]').on('change', function(){
            var province_code = $(this).val();
            $.fn.getCities(province_code, exists, modal_id);
          });

          $('#store-employee').find('select[name="municipality"]').on('change', function(){
            var city_municipality_code = $(this).val();
            $.fn.getBarangays(city_municipality_code, exists, modal_id);
          });
        }

        // Raise the label if modal opened with input having values or form returned old values
        $(this).find('input').each(function(){
          if ($(this).val() != "" && $(this).val() != " ") {
            $(this).parent('.form-material').addClass('open');
          }
        });
      });

      // clear edit form fields
      $('.modal').on('hidden.bs.modal', function(e) {
        $(this).find('form')[0].reset();
        //$(this).find('#edit-employee').find('select').empty();
        $('form').find('.open').removeClass('open').find('select').parent('.form-material').addClass('open');
        $('.modal').find('select').not('[name="region"], [name="account_type"]').empty();
        $('.modal').find('select[name="province"]').append('<option hidden>-- Select Region first --</option>');
        $('.modal').find('select[name="municipality"]').append('<option hidden>-- Select Province first --</option>');
        $('.modal').find('select[name="brgy"]').append('<option hidden>-- Select a Municipality / City first --</option>');
        $('.modal').find('select').not('[name="region"], [name="account_type"]').prop('disabled', true);
      });

      // clear error messages when user fills out the specified field with error
      $('.form-error').on('change', function() {
        $(this).removeClass('form-error').children('span').html("");
      });

      console.log("jQuery ready");
    });
    </script>

    <script type="text/javascript">
      //$(document).ready(function() {
        // Keep modal open if there are errors
        $findError = $('form').find('div');
        if ($findError.hasClass('form-error store')) {
          $('#store-employee').modal('show');  
        }
        
        if ($findError.hasClass('form-error update')) {
          //$('#update-employee').modal('show');  
        }
      //});
    </script>
</body>
</html>