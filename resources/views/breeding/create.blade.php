@extends('layouts.app')

@section('title', 'Breeding')

@section('header')
Breeding <small>Create</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Breeding Create</h3>
            </div>
            
            @include('breeding.form')
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('breeding.create') !!}
@endsection