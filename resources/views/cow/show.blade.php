@extends('layouts.app')

@section('title', 'Cow')

@section('header')
    Cow <small>{{$cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
    	@include('box.cow.info');
    </div>
    <div class="col-md-7">
    	@include('box.breeding.list', ['breedings' => $cow->breedings])
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.show', $cow) !!}
@endsection