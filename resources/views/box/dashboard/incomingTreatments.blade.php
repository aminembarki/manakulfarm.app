<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">@lang('m.incomingTreatments')</h3>
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
                var dateFormat = date.format('DD/MM/YYYY')
                var dateFromNow = date.fromNow()
                return [
                    `<a href="${treatment.url}">${treatment.cow.name}</a>`,
                    `${dateFormat} <span class="text-danger">(${dateFromNow})</span>`,
                    treatment.typeName
                ]
            });

            console.log(data, dataSet)
            $('#incoming-treatments').DataTable({
                data: dataSet,
                ordering: false,
                columns: [
                    { title: "@lang('m.name')" },
                    { title: "@lang('m.date')" },
                    { title: "@lang('m.type')" }
                ]
            });
        });
    })("{{url('dashboard/treatments/notdone')}}")
</script>
@endsection