@extends('layouts.app')

@section('title', 'Cow')

@section('header')
    Cow <small>Update</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cow Update</h3>
            </div>
            @include('cow.form')
        </div>
    </div>
</div>
@endsection