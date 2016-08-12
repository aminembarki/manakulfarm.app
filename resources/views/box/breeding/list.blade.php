<div class="box">
    <div class="box-header">
        <h3 class="box-title">Breedings</h3>
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
                $index + 1,
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
            responsive: true,
            columns: [
                { title: "#"},
                { title: "Name"},
                { title: "Breeder"},
                { title: "Service Date"},
                { title: "In Charge"},
                { title: "Status"},
                { title: "Calving Date"},
                { title: "Dry Date"}
            ],
            columnDefs: [
                { type: 'date-uk', targets: 3 },
                { type: 'date-uk', targets: 6 },
                { type: 'date-uk', targets: 7 }
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