@extends('layouts.app')

@section('title', trans('m.cow'))

@section('header')
    @lang('m.cow')
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="{{ route('cow.create') }}"><i class="fa fa-plus"></i> @lang('m.create')</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('m.cow')</h3>
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
                    link_to_route('cow.show', $cow->name, ['cow' => $cow])->toHtml(),
                    $cow->serial,
                    $cow->birthdate ? $cow->birthdate->format('d/m/Y') : null,
                    $cow->herd ? $cow->herd->name : null,
                    $cow->breeder ? $cow->breeder->name : null,
                    $cow->mother ? $cow->mother->name : null,
                ];
            })
        !!};

        var table = $('#{{ $id }}').DataTable({
            data: dataSet,
            responsive: true,
            ordering: false,
            columns: [
                { title: "@lang('m.name')"},
                { title: "@lang('m.serial')"},
                { title: "@lang('m.birthdate')"},
                { title: "@lang('m.herd')"},
                { title: "@lang('m.breeder')"},
                { title: "@lang('m.mother')"}
            ],
            columnDefs: [
                { type: 'date-uk', targets: 2 }
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