@extends('layouts.app')

@section('title', 'Treatment')

@section('header')
    Treatment <small>List</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="{{ route('treatment.create') }}"><i class="fa fa-plus"></i> Create</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Treatments</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover no-wrap" id={{ $id = uniqid() }}></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('treatment.index') !!}
@endsection

@section('script')

@parent

<script>
    $(document).ready(function() {
        var dataSet = {!!
            $treatments->map(function($treatment, $index) {
                return [
                    $index + 1,
                    link_to_route('treatment.show', $treatment->cow->name, ['treatment' => $treatment])->toHtml(),
                    $treatment->start_date ? $treatment->start_date->format('d/m/Y') : null,
                    $treatment->end_date ? $treatment->end_date->format('d/m/Y') : null,
                    $treatment->typeList[$treatment->type],
                    $treatment->summary,
                    $treatment->in_charge,
                    $treatment->cost ?: null,
                    $treatment->done ?: null,
                ];
            })
        !!};

        var table = $('#{{ $id }}').DataTable({
            data: dataSet,
            responsive: true,
            columns: [
                { title: "#"},
                { title: "Cow"},
                { title: "Start Date"},
                { title: "End Date"},
                { title: "Type"},
                { title: "Summary"},
                { title: "In Charge"},
                { title: "Cost"},
                { title: "Done"}
            ],
            columnDefs: [
                { type: 'date-uk', targets: 2 },
                { type: 'date-uk', targets: 3 }
            ]
        });

        $(window).resize(function() {
            table
            .columns.adjust()
            .responsive.recalc();
        });
    });
</script>

@endsection