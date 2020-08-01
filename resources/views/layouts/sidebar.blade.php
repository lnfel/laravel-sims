<!--
    Helper classes

    Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

    Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
    Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
        - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
-->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="index.html">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('codebase/assets/media/avatars/avatar15.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="be_pages_generic_profile.html">
                    <img class="img-avatar" src="{{ asset('codebase/assets/media/avatars/avatar15.jpg') }}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="be_pages_generic_profile.html">{{ $user->employee->last_name ? substr($user->employee->first_name, 0, 1) . '. ' . $user->employee->last_name : 'Unauthorized user' }}</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="op_auth_signin.html">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
<!-- ----- ----- ----- ahllen modified navigation ----- ----- ----- -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
				<li>
					<a href="/"><i class="si si-home"></i><span class="sidebar-mini-hide">Home</span></a>
				</li>
                @if(Auth::guard('account')->user()->isAdmin())
                <li class="nav-main-heading"> <!-- category marker -->
                    <span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Admin</span>
                </li>
                <li>
                    <a href="#"><i class="si si-people"></i><span class="sidebar-mini-hide">Account Management</span></a>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                        <i class="si si-book-open"></i>
                        <span class="sidebar-mini-hide">Data Entry</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.employee') }}">
                                <span class="sidebar-mini-hide">Employee</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-hide">Student</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
				<li class="nav-main-heading"> <!-- category marker -->
					<span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Account Settings</span>
				</li>
				<li>
					<a href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Preferences</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-moustache"></i><span class="sidebar-mini-hide">Settings</span></a>
				</li>
				<li class="nav-main-heading"> <!-- category marker -->
					<span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Class Control</span>
				</li>
				<li>
					<a href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">View All Class</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">Create New Class</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-vector"></i><span class="sidebar-mini-hide">View All Subject</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-globe-alt"></i><span class="sidebar-mini-hide">Add New Subject</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-lock"></i><span class="sidebar-mini-hide">Set up Classes</span></a>
				</li>
				<li class="nav-main-heading"> <!-- category marker -->
					<span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Students Control</span>
				</li>
				<li>
					<a href="#"><i class="si si-flag"></i><span class="sidebar-mini-hide">View All Student</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-refresh"></i><span class="sidebar-mini-hide">Modify Student Account</span></a>
				</li>
				<li>
					<a href="#"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Mass Enroll Students</span></a>
				</li>
                
                
                
                
                
                
                
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>