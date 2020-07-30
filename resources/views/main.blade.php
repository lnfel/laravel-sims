@extends('layouts.app')

@section('content')
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

<!-- ----- ----- ----- Main Container ----- ----- ----- -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-image bg-image-bottom" style="background-image: url('codebase/assets/media/photos/photo34@2x.jpg');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-top text-center overflow-hidden">
                            <div class="pt-50 pb-20">
                                <h1 class="font-w700 text-white mb-10 js-appear-enabled animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">Dashboard</h1>
                                <h2 class="h4 font-w400 text-white-op js-appear-enabled animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">Welcome to your custom panel!</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero -->
                <!-- Page Content -->
                <div class="content">
                    <div class="row">
	                    <div class="col-md-7">
	                        <div class="block">
	                            <div class="block-header block-header-default">
	                                <h3 class="block-title">Recent Activity</h3>
	                            </div>
	                            <div class="block-content">
									<h1>18 July 2020, 11:07 AM</h1>
									<p>Added New Class for Course ______</p>
									<h1>18 July 2020, 9:12 AM</h1>
									<p>Close the Class _____ for Course ______</p>
									<h1>17 July 2020, 3:56 PM</h1>
									<p>Added 25 Trainees for Class _____ for Course ______</p>
									<ul class="nav nav-pills push">
										<li class="nav-item">
											<a class="nav-link active" href="#">View Complete Activity Log</a>
										</li>
									</ul>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-5">
	                        <div class="block">
	                            <div class="block-header block-header-default">
	                                <h3 class="block-title">Active Class</h3>
	                            </div>
	                            <div class="block-content">
	                                <h1>Class A for Course ______</h1>
	                                <p>Date Started: _______</p>
	                                <h1>Class B for Course ______</h1>
	                                <p>Date Started: _______</p>
	                                <h1>Class C for Course ______</h1>
	                                <p>Date Started: _______</p>
									<ul class="nav nav-pills push">
										<li class="nav-item">
											<a class="nav-link active" href="#">View All Active Classes</a>
										</li>
									</ul>
								</div>
	                        </div>
	                    </div>
                    </div>


<div class="row">
    <div class="col">
		<!-- Block Tabs Default Style -->
		<div class="block">
			<ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" href="#btabs-static-home">Notifications</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#btabs-static-profile">Calendar</a>
				</li>
				<!-- <li class="nav-item ml-auto">
					<a class="nav-link" href="#btabs-static-settings">
						<i class="si si-settings"></i>
					</a>
				</li> -->
			</ul>
			<div class="block-content tab-content">
				<div class="tab-pane active" id="btabs-static-home" role="tabpanel">
					<h4 class="font-w400">Notifications</h4>
					<ul class="list-unstyled my-20">
						<li>
							<a class="text-body-color-dark media mb-15" href="javascript:void(0)">
								<div class="ml-5 mr-15">
									<i class="fa fa-fw fa-check text-success"></i>
								</div>
								<div class="media-body pr-10">
									<p class="mb-0">You’ve upgraded to a VIP account successfully!</p>
									<div class="text-muted font-size-sm font-italic">15 min ago</div>
								</div>
							</a>
						</li>
						<li>
							<a class="text-body-color-dark media mb-15" href="javascript:void(0)">
								<div class="ml-5 mr-15">
									<i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
								</div>
								<div class="media-body pr-10">
									<p class="mb-0">Please check your payment info since we can’t validate them!</p>
									<div class="text-muted font-size-sm font-italic">50 min ago</div>
								</div>
							</a>
						</li>
						<li>
							<a class="text-body-color-dark media mb-15" href="javascript:void(0)">
								<div class="ml-5 mr-15">
									<i class="fa fa-fw fa-times text-danger"></i>
								</div>
								<div class="media-body pr-10">
									<p class="mb-0">Web server stopped responding and it was automatically restarted!</p>
									<div class="text-muted font-size-sm font-italic">4 hours ago</div>
								</div>
							</a>
						</li>
						<li>
							<a class="text-body-color-dark media mb-15" href="javascript:void(0)">
								<div class="ml-5 mr-15">
									<i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
								</div>
								<div class="media-body pr-10">
									<p class="mb-0">Please consider upgrading your plan. You are running out of space.</p>
									<div class="text-muted font-size-sm font-italic">16 hours ago</div>
								</div>
							</a>
						</li>
						<li>
							<a class="text-body-color-dark media mb-15" href="javascript:void(0)">
								<div class="ml-5 mr-15">
									<i class="fa fa-fw fa-plus text-primary"></i>
								</div>
								<div class="media-body pr-10">
									<p class="mb-0">New purchases! +$250</p>
									<div class="text-muted font-size-sm font-italic">1 day ago</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-pane" id="btabs-static-profile" role="tabpanel">
					<h4 class="font-w400">Profile Content</h4>
<!--  -->
<!-- Calendar and Events functionality is initialized in js/pages/be_comp_calendar.min.js which was auto compiled from _es6/pages/be_comp_calendar.js -->
<!-- For more info and examples you can check out https://fullcalendar.io/ -->
<div class="block">
    <div class="block-content">
        <div class="row items-push">
            <div class="col-xl-9">
                <!-- Calendar Container -->
                <div class="js-calendar"></div>
            </div>
            <div class="col-xl-3 d-none d-xl-block">
                <!-- Add Event Form -->
                <form class="js-form-add-event mb-30" action="be_comp_calendar.html" method="post">
                    <div class="input-group">
                        <input type="text" class="js-add-event form-control" placeholder="Add Event..">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- END Add Event Form -->

                <!-- Event List -->
                <ul class="js-events list list-events">
                    <li class="bg-info-light">Project Mars</li>
                    <li class="bg-success-light">Cinema</li>
                    <li class="bg-danger-light">Project X</li>
                    <li class="bg-warning-light">Skype Meeting</li>
                    <li class="bg-info-light">Codename PX</li>
                    <li class="bg-success-light">Weekend Adventure</li>
                    <li class="bg-warning-light">Meeting</li>
                    <li class="bg-success-light">Walk the dog</li>
                    <li class="bg-info-light">AI schedule</li>
                </ul>
                <div class="text-center">
                    <em class="font-size-xs text-muted"><i class="fa fa-arrows"></i> Drag and drop events on the calendar</em>
                </div>
                <!-- END Event List -->
            </div>
        </div>
    </div>
</div>
<!-- END Calendar -->
<!--  -->
				</div>
				<!-- <div class="tab-pane" id="btabs-static-settings" role="tabpanel">
					<h4 class="font-w400">Settings Content</h4>
					<p>...</p>
				</div> -->
			</div>
		</div>
		<!-- END Block Tabs Default Style -->
    </div>
</div>


                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-sm clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Codebase 3.4</a> &copy; <span class="js-year-copy"></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
@endsection