@extends('layouts.app')

@section('title', trans('m.treatment'))

@section('header')
    @lang('m.treatment') <small>@lang('m.list')</small>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="{{ route('treatment.create') }}"><i class="fa fa-plus"></i> @lang('m.create')</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.treatment')</h3>
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
                    link_to_route('treatment.show', $treatment->cow->name, ['treatment' => $treatment])->toHtml(),
                    $treatment->date ? $treatment->date->format('d/m/Y') : null,
                    $treatment->getTypeList()[$treatment->type],
                    $treatment->summary,
                    $treatment->in_charge,
                    $treatment->cost ?: null,
                    $treatment->done ?: null,
                ];
            })
        !!};

        var table = $('#{{ $id }}').DataTable({
            data: dataSet,
            ordering: false,
            responsive: true,
            columns: [
                { title: "@lang('m.cow')"},
                { title: "@lang('m.date')"},
                { title: "@lang('m.type')"},
                { title: "@lang('m.summary')"},
                { title: "@lang('m.inCharge')"},
                { title: "@lang('m.cost')"},
                { title: "@lang('m.done')"}
            ],
            columnDefs: [
                { type: 'date-uk', targets: 1 }
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