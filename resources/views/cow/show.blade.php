@extends('layouts.app')

@section('title', 'Cow')

@section('header')
    Cow <small>{{$cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
    	@include('widgets.cow');
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.show', $cow) !!}
@endsection