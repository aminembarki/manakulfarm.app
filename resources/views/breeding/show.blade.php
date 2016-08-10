@extends('layouts.app')

@section('title', 'Breeding')

@section('header')
Breeding <small>Edit</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('box.cow.info', ['cow' => $breeding->cow])
    </div>
    <div class="col-md-4">
        @include('box.breeding.info', ['edit' => true])
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('breeding.show', $breeding) !!}
@endsection