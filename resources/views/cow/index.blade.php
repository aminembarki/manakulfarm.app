@extends('layouts.app')

@section('title', 'Cow')

@section('header')
    Cow <small>List</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="{{ route('cow.create') }}"><i class="fa fa-plus"></i> Create</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cows</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Serial</th>
                            <th>Birthdate</th>
                            <th>Herd</th>
                            <th>Breeder</th>
                            <th>Mother</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cows as $index => $cow)
                        <tr>
                            <td>{{ $index + 1}}</a></td>
                            <td>{{ link_to_route('cow.show', $cow->name, ['cow' => $cow]) }}</td>
                            <td>{{ $cow->serial }}</td>
                            <td>@date($cow->birthdate)</td>
                            <td>{{ $cow->herd->name or null }}</td>
                            <td>{{ $cow->breeder->name or null }}</td>
                            <td>{{ $cow->mother->name or null }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.index') !!}
@endsection