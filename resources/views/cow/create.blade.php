@extends('layouts.app')

@section('title', trans('m.cow'))

@section('header')
    @lang('m.cow')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.create')</h3>
            </div>
            @include('cow.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.create') !!}
@endsection