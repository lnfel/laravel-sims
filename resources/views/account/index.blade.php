@extends('layouts.app')

@section('content')
<div class="row p-4">
	<div class="col">
<h1 class="pl-4">Account tests</h1>

<form class="pl-4" action="/account-test" method="post">
	@csrf
	<input type="text" name="username" autocomplete="off" placeholder="Username">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button>Submit</button>
</form>

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li class="d-block mt-2">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<p class="pl-4">Sample username and employee id: {{ date("Ymd") }}01</p>

<ul>
	@forelse($accounts as $account)
		<li>Username: {{ $account->username }}</li>
		<li>Email: {{ $account->email }}</li>
		<!--<li><pre>{{-- var_dump($account->toArray()) --}}</pre></li>-->
		<li>Account Type: {{ $account->account_type->name }}</li>
		<br>
	@empty
		<li>Account table is empty</li>
	@endforelse
</ul>
</div>

<div class="col">
	
	@foreach($accounts_on_type as $type)
	<div class="block">
		<div class="block-header block-header-default">
			<h3 class="block-title">{{ $type->name }}</h3>
		</div>
		<div class="block-content block-content-full">
			<ul>
				<!--<li><pre>{{-- var_dump($type->toArray()) --}}</pre></li>-->
				@forelse($type->accounts as $account)
					<li>{{ $account->email }}</li>
				@empty
					<li>There is no account with this role.</li>
				@endforelse
			</ul>
		</div>
	</div>
		<!--<li>{{-- var_dump($type->accounts->toArray()) --}}</li>-->
	@endforeach
	
	<!--<ul>
		@forelse($account_types as $type)
			<li><pre>{{-- var_dump($type->toArray()) --}}</pre></li>
		@empty
			<li>Account table is empty</li>
		@endforelse
	</ul>-->
</div>
</div>
@endsection