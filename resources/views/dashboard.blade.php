@extends('layouts.app')

@section('content')
@if(\Illuminate\Support\Facades\Auth::guard('account')->check())
    <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="post">
        @csrf
    </form>
@else
    <a href="{{ route('user.logout') }}"
            onclick="event.preventDefault();
            document.getElementById('user-logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="user-logout-form" action="{{ route('user.logout') }}" method="post">
        @csrf
    </form>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection