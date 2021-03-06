@extends('layouts.app')

@section('title', 'Treatment')

@section('header')
Treatment <small>{{$treatment->cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4">
        @include('box.cow.info', ['cow' => $treatment->cow])
    </div>
    <div class="col-md-6 col-lg-4">
        @include('box.treatment.info', ['edit' => true])
    </div>
    @if ( in_array($treatment->type, ['PREGNANCY_DIAGNOSE', 'BREEDING']) )
    <div class="col-md-6 col-lg-4">
        @include('box.treatment.breeding')
    </div>
    @endif
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('treatment.show', $treatment) !!}
@endsection