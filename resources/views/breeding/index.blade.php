@extends('layouts.app')

@section('title', 'Breeding')

@section('header')
    Breeding <small>List</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="{{ route('breeding.create') }}"><i class="fa fa-plus"></i> Create</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('box.breeding.list')
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('breeding.index') !!}
@endsection