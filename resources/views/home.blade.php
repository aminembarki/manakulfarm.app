@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection