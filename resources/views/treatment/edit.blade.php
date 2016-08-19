@extends('layouts.app')

@section('title', 'Treatment')

@section('header')
    Treatment <small>Update</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Treatment Update</h3>
            </div>
            @include('treatment.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('treatment.show', $treatment) !!}
@endsection