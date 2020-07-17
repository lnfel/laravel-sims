@extends('layouts.app')

@section('content')
<h1 class="pl-4">Account tests</h1>

<form class="pl-4" action="/account-test" method="post">
	<input type="text" name="username" autocomplete="off">
	@csrf
	<input type="password" name="password">
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
		<li><pre>{{ var_dump($account->toArray()) }}</pre></li>
	@empty
		<li>Account table is empty</li>
	@endforelse
</ul>
@endsection