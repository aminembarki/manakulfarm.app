@extends('layouts.app')

@section('title', 'Cow')

@section('header')
Cow <small>{{$cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('box.cow.info', ['edit' => true])
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('box.breeding.list', ['breedings' => $cow->breedings()->orderBy('service_date', 'desc')->get()])
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.show', $cow) !!}
@endsection