<div class="box">
    <div class="box-header">
        <h3 class="box-title">@lang('m.breeding')</h3>
    </div>
    <div class="box-body">
        <table class="table table-hover no-wrap" id={{ $id = uniqid() }}></table>
    </div>
</div>

@section('script')

@parent

<script>
    $(document).ready(function() {
        var dataSet = {!!
            $breedings->map(function($breeding, $index) {
                return [
                link_to_route('breeding.show', $breeding->cow->name, ['breeding' => $breeding])->toHtml(),
                $breeding->breeder->name,
                $breeding->service_date ? $breeding->service_date->format('d/m/Y') : null,
                $breeding->in_charge,
                $breeding->status,
                $breeding->getCalvingDate() ? $breeding->getCalvingDate()->format('d/m/Y') : null,
                $breeding->getDryDate() ? $breeding->getDryDate()->format('d/m/Y') : null,
                ];
            })
        !!};

        var table = $('#{{ $id }}').DataTable({
            data: dataSet,
            ordering: false,
            responsive: true,
            columns: [
                { title: "@lang('m.name')"},
                { title: "@lang('m.breeder')"},
                { title: "@lang('m.serviceDate')"},
                { title: "@lang('m.inCharge')"},
                { title: "@lang('m.status')"},
                { title: "@lang('m.calvingDate')"},
                { title: "@lang('m.dryDate')"}
            ],
            columnDefs: [
                { type: 'date-uk', targets: 2 },
                { type: 'date-uk', targets: 5 },
                { type: 'date-uk', targets: 6 }
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