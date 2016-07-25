@extends('layouts.app')

@section('title', 'Herd')

@section('header')
    Herd
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Herds</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($herds as $index => $herd)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ route('herd.show', ['herd' => $herd] ) }}">{{ $herd->name }}</a></td>
                            <td>{{ $herd->active ? 'Y' : 'N' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
