@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('box.dashboard.herds')
    </div>
    <div class="col-md-9">
        @include('box.dashboard.incomingTreatments')
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection