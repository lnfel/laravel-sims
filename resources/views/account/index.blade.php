@extends('layouts.app')

@section('content')
<h1 class="pl-4 pt-4">Accounts</h1>
<span class="pl-4">Sample account registration</span>
<div class="row p-4">
	<div class="col">
	<form class="pl-4" action="/account-test" method="post">
		@csrf
		<div class="form-group row">
			<div class="col-12 col-sm-6 col-md-4">
				<div class="form-material form-material-sm floating">
					<input id="username" type="text" class="form-control form-control-sm" name="username" autocomplete="off" placeholder="">
					<label for="username">Username</label>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<div class="form-material form-material-sm floating">
					<input id="email" type="email" class="form-control form-control-sm" name="email" placeholder="">
					<label for="email">Email</label>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="form-material form-material-sm floating">
					<input id="password" type="password" class="form-control form-control-sm" name="password">
					<label for="password">Password</label>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="form-material form-material-sm floating">
					<select id="account_type" class="form-control" name="account_type">
						<option hidden=""></option>
						@forelse($accounts_on_type as $type)
							<option value="{{ $type->id }}">{{ $type->name }}</option>
						@empty
							<option disabled="">{{ __('No roles found on database.') }}</option>
						@endforelse
					</select>
					<label for="account_type">Account Type</label>
				</div>
			</div>
		</div>
		<button class="btn btn-alt-primary">Submit</button>
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
	<!-- PHP 7’s Null Coalesce Operator -->
	<!-- {{-- or so called Ternary operator, sample: $variable ?? "If variable is null show this text" --}} -->
	<p class="pl-4">Last username created: {{ $last_username ?? "No accounts on database yet." }}</p>
	<p class="pl-4">New username generated: {{ $new_username ?? "Of course we cannot generate from last account username if there is no existing account." }}</p>

	<div id="accordion" role="tablist" area-multiselectable="true">
		<div class="block block-bordered block-rounded mb-2">
			<div id="accordion_h1" class="block-header" role="tab">
				<a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q1" aria-expanded="true" aria-controls="accordion_q1">Sample JSON array data from accounts with Super Admin role</a>
			</div>
			<div id="accordion_q1" class="collapse" role="tabpanel" aria-labelledby="accordion_h1" data-parent="#accordion">
				<div class="block-content">
					<!-- Using the common ternary operator: argument ? true : false -->
					<p class="pl-4"><pre>{{ $super_admin ? var_dump($super_admin->toArray()) : "No super admin(s) yet" }}</pre></p>	
				</div>
			</div>
		</div>
	</div>

	<ul>
		@forelse($accounts as $account)
			<li>Username: {{ $account->username }}</li>
			<li>Email: {{ $account->email }}</li>
			<!--<li><pre>{{-- var_dump($account->toArray()) --}}</pre></li>-->
			<li>Account Type: {{ $account->account_type->name }}</li>
			<li>Status: {{ $account->status->name }}</li>
			<br>
		@empty
			<li>Account table is empty</li>
		@endforelse
	</ul>
	</div>
</div>

<h1 class="pl-4">Account Types</h1>
<span class="pl-4">Iterate through account_types table and get associated accounts if exists.</span>
<div class="row p-4">
	@foreach($accounts_on_type as $type)
	<div class="col-12 col-md-3">
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
	</div>
		<!--<li>{{-- var_dump($type->accounts->toArray()) --}}</li>-->
	@endforeach
	
	<!-- <ul>
		@forelse($account_types as $type)
			<li><pre>{{-- var_dump($type->toArray()) --}}</pre></li>
		@empty
			<li>Account table is empty</li>
		@endforelse
	</ul> -->
</div>

<h1 class="pl-4">Status</h1>
<div class="row p-4">
	@foreach($status as $status)
	<div class="col-6">
		<div class="block">
			<div class="block-header block-header-default">
				<h3 class="block-title">{{ $status->name }}</h3>
			</div>
			<div class="block-content block-content-full">
				<span><b>Accounts</b></span>
				<ul>
					@forelse($status->accounts as $account)
						<li>{{ $account->username }}</li>
					@empty
						<li>There is no account with {{ $status->name }} status.</li>
					@endforelse
				</ul>
			</div>
		</div>
	</div>
	@endforeach
</div>

<h1 class="pl-4">Employee</h1>
@endsection