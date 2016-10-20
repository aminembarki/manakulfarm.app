<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Incoming Treatments</h3>
    </div>
    <div class="box-body">
        <table id="incoming-treatments" class="table"></table>
    </div>
</div>

@section('script')
@parent
<script type="text/javascript">
    (function(url) {
        $.get(url, function(data) {
            var dataSet = data.map(function(treatment) {
                var date = moment(treatment.date)
                return [
                    `<a href="${treatment.url}">${treatment.cow.name}</a>`,
                    date.format('DD/MM/YYYY') + ' <span class="text-danger">(' + date.fromNow() + ')</span>',
                    treatment.typeName
                ]
            });

            console.log(data, dataSet)
            $('#incoming-treatments').DataTable({
                data: dataSet,
                ordering: false,
                columns: [
                    { title: "Name" },
                    { title: "Date" },
                    { title: "Type" }
                ]
            });
        });
    })("{{url('dashboard/treatments/notdone')}}")
</script>
@endsection