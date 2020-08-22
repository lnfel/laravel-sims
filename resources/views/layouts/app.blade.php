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

    .form-material .form-control[readonly] {
      background-color: transparent;
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
    <script src="{{ asset('codebase/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	  <!-- Page JS Code -->
	  <script src="{{ asset('codebase/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
	  <script src="{{ asset('codebase/assets/js/pages/be_tables_datatables.min.js') }}"></script>

	  <!-- Custom JS -->
	  <script type="text/javascript">
    $(document).ready(function()
    {
      $.fn.toggleAddressEdit = function(checked) {
        switch(checked) {
          case true:
            $('#update-employee').find('select[name="edit_region"]').on('change', function(){
              var region_code = $(this).val();
              $.fn.getProvinces(region_code, exists = false, modal_id = "update-employee");
            });

            $('#update-employee').find('select[name="edit_province"]').on('change', function(){
              var province_code = $(this).val();
              $.fn.getCities(province_code, exists = false, modal_id = "update-employee");
            });

            $('#update-employee').find('select[name="edit_municipality"]').on('change', function(){
              var city_municipality_code = $(this).val();
              $.fn.getBarangays(city_municipality_code, exists = false, modal_id = "update-employee");
            });
            break;
          default:
            $('#update-employee').find('select[name="edit_region"]').unbind();
            $('#update-employee').find('select[name="edit_province"]').unbind();
            $('#update-employee').find('select[name="edit_municipality"]').unbind();
            break;
        }
      }

      $.fn.getEmployeeData = function(employee_id) {
        console.log("Employee number: " + employee_id);

        $.ajax({
          url: '/employees/' + employee_id + '/edit',
          type: "GET",
          dataType: "json",
          success: function(data) {
            console.log("Current Employee Data");
            //console.table(data['account'], ["id", "username", "email", "account_type_id"]);
            console.table(data['employee'], ["id", "number", "first_name", "last_name", "address", "personal_email"]);
            //console.log("Account Type ID");
            //console.log(data['account'][0]['account_type_id']);

            //$('#edit-number').prop('readonly', false).parent('.form-material').addClass('open');
            //$('#edit-number').val(data['employee']['number']);
            //$('#edit-number').prop('readonly', true);

            $('#edit-employee').prop('action', '/employees/' + data['employee']['id']);
            //$('#edit-employee').prepend('<input type="hidden" name="employee_id" value="'+ data['employee']['id'] +'">');

            // Account Info
            $('#edit-employee').find('select[name="edit_account_type"]').val(data['employee']['account_type_id']).trigger('change');
            $('#edit-employee').find('input[name="edit_personal_email"]').val(data['employee']['personal_email']).parent('.form-material').addClass('open');

            // Personal Info
            $('#edit-employee').find('input[name="edit_first_name"]').val(data['employee']['first_name']).parent('.form-material').addClass('open');
            $('#edit-employee').find('input[name="edit_middle_name"]').val(data['employee']['middle_name']).parent('.form-material').addClass('open');
            $('#edit-employee').find('input[name="edit_last_name"]').val(data['employee']['last_name']).parent('.form-material').addClass('open');

            //var response = JSON.parse(data);
            //console.log(response);
          },
          complete:function(data){
            console.log("Employee request done, checking for address...");
            console.log(data.responseJSON['employee']);
            var employee = data.responseJSON['employee'];
            //var account = data.responseJSON['account'];
            console.log('Looking for region data...');
            console.log(employee['region']);
            if (employee['region'] == null && employee['address'] == null) {
              console.log("No address associated with current employee.");
              var exists = false;
              var modal_id = "update-employee";

              $('#update-employee').find('select[name="edit_region"]').on('change', function(){
              var region_code = $(this).val();
                $.fn.getProvinces(region_code, exists, modal_id);
              });

              $('#update-employee').find('select[name="edit_province"]').on('change', function(){
                var province_code = $(this).val();
                $.fn.getCities(province_code, exists, modal_id);
              });

              $('#update-employee').find('select[name="edit_municipality"]').on('change', function(){
                var city_municipality_code = $(this).val();
                $.fn.getBarangays(city_municipality_code, exists, modal_id);
              });
            } else {
              console.log("Associated address found.");
              var exists = true;
              var modal_id = "update-employee";
              var testRegion = "04";
              var region_code = employee['region'];
              var testProvince = "0458";
              var province_code = employee['province'];
              var testCity = "045813";
              var city_municipality_code = employee['municipality'];
              var testBarangay = "045813001";
              var brgy_code = employee['brgy'];
              var testZipCode = "1920";
              var zip_code = employee['zip_code'];

              $('#edit-employee').find('input[name="edit_address"]').val(employee['address']).parent('.form-material').addClass('open');
              $('#edit-employee').find('input[name="edit_zip_code"]').val(zip_code).parent('.form-material').addClass('open');

              if (region_code != null && region_code != "") {
                $('#edit-employee').find('select[name="edit_region"]').val(region_code).change();

                $.fn.getProvinces(region_code, exists, modal_id, province_code);
                $.fn.getCities(province_code, exists, modal_id, city_municipality_code);
                $.fn.getBarangays(city_municipality_code, exists, modal_id, brgy_code);
              }
            } // end of else
          } // end of complete function
        })
        .done(function(data) {
          return data;
        });
      }

      $.fn.getProvinces = function(region_code, exists, modal_id, province_code) {
        console.log("Checking modal_id...")
        console.log(modal_id);
        console.log(region_code);
        console.log(exists);
        console.log(province_code);
        $.ajax({
          url : '/dropdownlist/getprovinces/' + region_code,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            if (modal_id == "update-employee")
            {
              var edit = "edit_";
            } else {var edit = "";}
            // get old value
            var oldProvince = $('#province').data('old-province');
            console.log('Checking data-old-province for previous request...');
            console.log(oldProvince);
            console.log("Getting province...");
            console.table(data);
            $('#' + modal_id).find('select[name="'+edit+'province"]').prop('disabled', false);
            $('#' + modal_id).find('select[name="'+edit+'province"]').empty();
            $('#' + modal_id).find('select[name="'+edit+'province"]').append('<option value="" hidden>-- Provinces loaded --</option>');
            $.each(data, function(key, value){
               $('#' + modal_id).find('select[name="'+edit+'province"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
            console.log("Populated data on: " + modal_id);
          },
          complete:function(data){
            if (exists) {
              var edit = "edit_";
              $('#' + modal_id).find('select[name="'+edit+'province"]').val(province_code).change();
            }

            // check if there are old values
            if ($('#province').data('old-province') != "" && $('#province').data('old-province') != null) {
              console.log('Old province data: ' + $('#province').data('old-province'));
              $("#province").val($("#province").data('old-province')).trigger('change');
            }
          }
        })
        .done(function(data){
          return data;
        });
      }

      $.fn.getCities = function(province_code, exists, modal_id, city_municipality_code) {
        $.ajax({
          url : '/dropdownlist/getcities/' + province_code,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            if (modal_id == "update-employee")
            {
              var edit = "edit_";
            } else {var edit = "";}
            console.log("Getting Cities and Municipalities");
            console.table(data);
            $('#' + modal_id).find('select[name="'+edit+'municipality"]').prop('readonly', false);
            $('#' + modal_id).find('select[name="'+edit+'municipality"]').empty();
            $('#' + modal_id).find('select[name="'+edit+'municipality"]').append('<option value="" hidden>-- Cities and Municipality loaded --</option>');
            $.each(data, function(key, value){
               $('#' + modal_id).find('select[name="'+edit+'municipality"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          },
          complete:function(data){
            if (exists) {
              var edit = "edit_";
              $('#' + modal_id).find('select[name="'+edit+'municipality"]').val(city_municipality_code).change();
            }

            // check if there are old values
            if ($('#municipality').data('old-municipality') != "" && $('#municipality').data('old-municipality') != null) {
              console.log('Old municipality data: ' + $('#municipality').data('old-municipality'));
              $("#municipality").val($("#municipality").data('old-municipality')).trigger('change');
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
            if (modal_id == "update-employee")
            {
              var edit = "edit_";
            } else {var edit = "";}
            console.log("Getting Barangays");
            console.table(data);
            $('#' + modal_id).find('select[name="'+edit+'brgy"]').prop('readonly', false);
            $('#' + modal_id).find('select[name="'+edit+'brgy"]').empty();
            $('#' + modal_id).find('select[name="'+edit+'brgy"]').append('<option value="" hidden>-- Baranggays loaded --</option>');
            $.each(data, function(key, value){
               $('#' + modal_id).find('select[name="'+edit+'brgy"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          },
          complete:function(data){
            if (exists) {
              var edit = "edit_";
              $('#' + modal_id).find('select[name="'+edit+'brgy"]').val(testBarangay).change();
            }

            // check if there are old values
            if ($('#brgy').data('old-brgy') != "" && $('#brgy').data('old-brgy') != null) {
              console.log('Old brgy data: ' + $('#brgy').data('old-brgy'));
              $("#brgy").val($("#brgy").data('old-brgy')).trigger('change');
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
          var employee_id = $(e.relatedTarget).data('target-id');
          if (employee_id != '' && employee_id != null) {
            $('#edit-employee').find('#employee_id').val(employee_id);
          } else {
            employee_id = $('#employee_id').val();
          }

          $('#edit-employee').find('select').prop('readonly', false);
          $('#edit-employee').find('select').parent('.form-material').addClass('open');
          $.fn.getEmployeeData(employee_id);

          // check if there are old values
          if ($('.edit_region').data('old-edit-region') != "" && $('.edit_region').data('old-edit-region') != null) {
            console.log('Old region data: ' + $('.edit_region').data('old-edit-region'));
            $(".edit_region").val($(".edit_region").data('old-edit-region')).trigger('change');
          }
        } else if (id === "store-employee") {
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

          // check if there are old values
          if ($('#region').data('old-region') != "" && $('#region').data('old-region') != null) {
            console.log('Old region data: ' + $('#region').data('old-region'));
            $("#region").val($("#region").data('old-region')).trigger('change');
          }
        } else {
          var user_id = $(e.relatedTarget).data('target-id');
          var user_full_name = $(e.relatedTarget).data('full-name');
          var model = $(e.relatedTarget).data('model');
          $('#delete').prop('action', '/' + model + '/' + user_id);
          $('#delete').prepend('<input type="hidden" name="user_id" value="'+ user_id +'">');
          $('#name').find("b").html(user_full_name);
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
        $('.modal').find('select').not('[name="region"], [name="edit_region"], [name="account_type"], [name="edit_account_type"]' ).empty();
        $('.modal').find('select[name="province"], select[name="edit_province"]').append('<option value="" hidden>-- Select Region first --</option>');
        $('.modal').find('select[name="municipality"], select[name="edit_municipality"]').append('<option value="" hidden>-- Select Province first --</option>');
        $('.modal').find('select[name="brgy"], select[name="edit_brgy"]').append('<option value="" hidden>-- Select a Municipality / City first --</option>');
        $('.modal').find('select').not('[name="region"], [name="edit_region"], [name="account_type"], [name="edit_account_type"]').prop('readonly', true);

        $findError = $('form').find('div').hasClass('form-error');
        switch($findError) {
          case true:
            $('.form-error').removeClass('form-error store update').children('span').html("");
            break;
          default:
            // do nothing
            break;
        }

        // disable address listeners for edit
        var checked = false;
        $.fn.toggleAddressEdit(checked);

        // clear Employee name on delete confirmation modal
        $('#employee').find('b').text('');
      });

      $('#toggleAddressEdit').on('change', function(e) {
        var checked = $(this).prop('checked');
        $.fn.toggleAddressEdit(checked);
      });

      // clear error messages when user fills out the specified field with error
      $('.form-error').on('change', function() {
        $(this).removeClass('form-error').children('span').html("");
      });

      // when view filter is changed, submit form request
      $('#view').on('change', function() {
        this.form.submit();
      });

      // initialize Codebade notify plugin
      jQuery(function(){ 
        Codebase.helpers('notify');
        //Helpers.coreBootstrapTooltip();

        $('[data-toggle="tooltip"]').tooltip();
      });

      console.log("jQuery ready");

      window.addEventListener("load", function(){
        
      });
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
          $('#update-employee').modal('show');  
        }

        if ($('#notify').length) {
          jQuery(function(){
            Codebase.helpers('notify', {
                align: 'right',             // 'right', 'left', 'center'
                from: 'top',                // 'top', 'bottom'
                type: $('#notify').data('type'),               // 'info', 'success', 'warning', 'danger'
                icon: 'fa fa-{{ session("success") ? "check" : "times" }} mr-5',    // Icon class
                message: '{{ session("success") ?? session("danger") }}'
            });
          });
        }
      //});
    </script>
</body>
</html>