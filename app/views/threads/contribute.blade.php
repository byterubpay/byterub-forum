@extends('master')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1>How to contribute to "{{{ $thread->name }}}"</h1>
			<p>This project is funded with <strong>XMR</strong>!</p>
			<p>In order to contribute to the cause of <strong>"{{{ $thread->name }}}"</strong> all you have to do is the following:</p>
			<ol>
				<li>Have a <strong>valid ByteRub address</strong>. If you don't have one, you can read on <a href="http://getbyterub.org/getting-started/">getting started</a>!</li><br>
				<li>Send the amount of XMR that you wish to contribute to the address:<br> <strong>{{ Config::get('byterub::address') }}</strong></li><br>
				<li>Make sure that you enter a payment ID of <strong>{{ $thread->funding->payment_id }}</strong> 
					in order for us to be able to assign your contribution to this specific project!</li><br>
			</ol>
			<p class="text-danger">Your contribution should be visible within 5 minutes of you sending your contribution. If for some reason it is not there, please contact <a href="http://getbyterub.org/knowledge-base/people">a member of the Core Team</a>!</p>
		</div>
	</div>
@stop
