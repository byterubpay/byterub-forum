@extends('master')

@section('description')
	<meta name="description" content="ByteRub is a digital currency that is secure, private, and untraceable." />
@stop

@section('content')
{{ Breadcrumbs::addCrumb('Home', '/') }}

<div class="row category-block">
@foreach ($categories as $category)
@if (Visibility::check('category', $category->id))
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" id="category-{{ $category->id }}"><i class="fa fa-th"></i> {{ $category->name }}</h3>
	  </div>
	  <div class="panel-body">
		  @foreach ($category->forums as $forum)
			@include('pages.includes.forum')
		  @endforeach
	  </div>
	</div>
@endif
@endforeach
</div>
@stop