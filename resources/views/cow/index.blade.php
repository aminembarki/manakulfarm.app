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
            <div class="box-body">
                <table class="table table-hover no-wrap" id={{ $id = uniqid() }}></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('cow.index') !!}
@endsection

@section('script')

@parent

<script>
    $(document).ready(function() {
        var dataSet = {!!
            $cows->map(function($cow, $index) {
                return [
                    $index + 1,
                    link_to_route('cow.show', $cow->name, ['cow' => $cow])->toHtml(),
                    $cow->serial,
                    $cow->birthdate ? $cow->birthdate->format('d/m/Y') : null,
                    $cow->herd ? $cow->herd->name : null,
                    $cow->breeder ? $cow->breeder->name : null,
                    $cow->mother ? $cow->mother->name : null,
                ];
            })
        !!};

        $('#{{ $id }}').DataTable({
            data: dataSet,
            responsive: true,
            columns: [
                { title: "#"},
                { title: "Name"},
                { title: "Serial"},
                { title: "Birthdate"},
                { title: "Herd"},
                { title: "Breeder"},
                { title: "Mother"}
            ],
            columnDefs: [
                { type: 'date-uk', targets: 3 }
            ]
        });
    });
</script>

@endsection