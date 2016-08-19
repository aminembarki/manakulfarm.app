@extends('layouts.app')

@section('title', 'Treatment')

@section('header')
Treatment <small>{{$treatment->cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('box.cow.info', ['cow' => $treatment->cow])
    </div>
    <div class="col-md-4">
        @include('box.treatment.info')
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('treatment.show', $treatment) !!}
@endsection