@extends('layouts.app')

@section('content')
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
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ Auth::guard('account')->user()->username }}
                        {{ __('You are logged in!') }}
                        <pre>{{ var_dump($user->toArray()) }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
</main>
@endsection