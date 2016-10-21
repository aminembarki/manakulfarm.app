@extends('layouts.app')

@section('title', trans('m.treatment'))

@section('header')
    @lang('m.treatment') <small>{{$treatment->cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.update')</h3>
            </div>
            @include('treatment.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('treatment.show', $treatment) !!}
@endsection