@extends('layouts.app')

@section('content')
<h1 class="pl-4">Application tests</h1>

<h3 class="pl-4"><u>Accounts</u></h3>
<ul>
	@forelse($accounts as $account)
		<li><pre>{{ var_dump($account->toArray()) }}</pre></li>
	@empty
		<li>Account table is empty</li>
	@endforelse
</ul>
@endsection