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
  <div id="page-container" class="main-content-boxed">

    <!-- Main Container -->
    <main id="main-container">
      <!-- Page Content -->
      <div class="bg-image" style="background-image: url('codebase/assets/media/photos/photo34@2x.jpg');">
        <div class="row mx-0 bg-black-op">
          <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
              <p class="font-size-h3 font-w600 text-white">
                Get Inspired and Create.
              </p>
              <p class="font-italic text-white-op">
                Copyright &copy; <span class="js-year-copy"></span>
              </p>
            </div>
          </div>
          <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
              <!-- Header -->
              <div class="px-30 py-10">
                <a class="link-effect font-w700" href="index.html">
                  <i class="si si-fire"></i>
                  <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                </a>
                <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
              </div>
              <!-- END Header -->

              <!-- Sign In Form -->
              <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
              <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
              
              <form class="px-30" action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-12">
                    <div class="form-material floating">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autofocus>
                      <label for="username">{{ __('Username') }}</label>
                    </div>
                    <span class="invalid-feedback" role="alert">
                      @error('username')
                        <strong>{{ $message }}</strong>
                      @enderror
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <div class="form-material floating">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password">
                      <label for="password">Password</label>
                    </div>
                    <span class="invalid-feedback" role="alert">
                      @error('password')
                        <strong>{{ $message }}</strong>
                      @enderror
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-block btn-hero btn-alt-primary">
                    <i class="si si-login mr-10"></i> Sign In
                  </button>
                  <div class="mt-30 d-flex justify-content-center">
                    <!-- <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_signup2.html">
                      <i class="fa fa-plus mr-5"></i> Create Account
                    </a> -->
                    @if (Route::has('password.request'))
                      <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                        <i class="fa fa-warning mr-5"></i> Forgot Your Password?
                      </a>
                    @endif
                  </div>
                </div>
              </form>
              <!-- END Sign In Form -->
            </div>
          </div>
        </div>
      </div>
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
  </div>
  <!-- END Page Container -->
@endsection
