@extends('layouts.app')

@section('title', trans('m.breeding'))

@section('header')
    @lang('m.breeding') <small>{{$breeding->cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4">
        @include('box.cow.info', ['cow' => $breeding->cow])
    </div>
    <div class="col-md-6 col-lg-4">
        @include('box.breeding.info', ['edit' => true])
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('breeding.show', $breeding) !!}
@endsection