@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('box.dashboard.herds')
    </div>
    <div class="col-md-8">
        @include('box.dashboard.incomingTreatments')
        @include('box.dashboard.pregnantBreedings')
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection