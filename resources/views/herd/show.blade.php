@extends('layouts.app')

@section('title', 'Herd')

@section('header')
    Herd <small>{{ $herd->name }}</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Herd</h3>
            </div>
            <div class="box-body">
                {{ $herd->toJson() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('herd.show', $herd) !!}
@endsection