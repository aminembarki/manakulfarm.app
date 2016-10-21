@extends('layouts.app')

@section('title', trans('m.treatment'))

@section('header')
    @lang('m.treatment') <small>@lang('m.create')</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.create')</h3>
            </div>
            @include('treatment.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('treatment.create') !!}
@endsection