<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Incoming Clavings</h3>
    </div>
    <div class="box-body">
        <table id="incoming-calvings" class="table"></table>
    </div>
</div>

@section('script')
@parent
<script type="text/javascript">
    (function(url) {
        $.get(url, function(data) {
            var dataSet = data.map(function(breeding) {
                var date = moment(breeding.calving_date)
                var dateFormat = date.format('DD/MM/YYYY')
                var dateFromNow = date.fromNow()
                return [
                    `<a href="${breeding.url}">${breeding.cow.name}</a>`,
                    `${dateFormat} <span class="text-danger">(${dateFromNow})</span>`,
                    breeding.breeder.name
                ]
            });

            console.log(data, dataSet)
            $('#incoming-calvings').DataTable({
                data: dataSet,
                ordering: false,
                columns: [
                    { title: "Name" },
                    { title: "Date" },
                    { title: "Breeder" }
                ]
            });
        });
    })("{{url('dashboard/breedings/pregnant')}}")
</script>
@endsection