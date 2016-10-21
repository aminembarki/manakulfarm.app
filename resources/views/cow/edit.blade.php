@extends('layouts.app')

@section('title', trans('m.cow'))

@section('header')
    @lang('m.cow') <small>{{$cow->name}}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.update')</h3>
            </div>
            @include('cow.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.show', $cow) !!}
@endsection