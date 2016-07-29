@extends('layouts.app')

@section('title', 'Cow')

@section('header')
    Cow <small>Create</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cow Create</h3>
            </div>
            {{ Form::open(['route' => 'cow.store']) }}
                <div class="box-body">

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', $cow->name, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('serial', 'Serial') }}
                        {{ Form::text('serial', $cow->serial, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('birthdate', 'Birthdate') }}
                        {{ Form::date('birthdate', $cow->birthdate, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('herd', 'Herd') }}
                        {{ Form::select('herd_id', \App\Herd::all()->lists('name', 'id'), $cow->herd_id, ['class' => 'form-control', 'placeholder' => 'Please Select Herd']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('breeder', 'Breeder') }}
                        {{ Form::select('breeder_id', \App\Breeder::all()->lists('name', 'id'), $cow->breeder_id, ['class' => 'form-control select2 select2-breeder', 'placeholder' => 'Please Select Breeder']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('mother', 'Mother') }}
                        {{ Form::select('mother_id', \App\Cow::all()->lists('name', 'id'), $cow->mother_id, ['class' => 'form-control', 'placeholder' => 'Please Select Mother']) }}
                    </div>

                </div>

                <div class="box-footer">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> Create</button>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection