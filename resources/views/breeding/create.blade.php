@extends('layouts.app')

@section('title', trans('m.breeding'))

@section('header')
    @lang('m.breeding') <small>@lang('m.create')</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.create')</h3>
            </div>
            
            @include('breeding.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('breeding.create') !!}
@endsection