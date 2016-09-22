<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Herd Pie Chart</h3>
    </div>
    <div class="box-body">
        <div id="herd-pie-chart" style="height: 300px;"></div>
    </div>
</div>


@section('script')
@parent
<script type="text/javascript">
$.get('<?php echo url('dashboard/herds') ?>', function(herds) {
    $.plot('#herd-pie-chart', herds.map(function(herd) {
        return {
            label: herd.name,
            data: herd.cows.length
        }
    }), {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.5,
                label: {
                    show: true,
                    radius: 2/3,
                    formatter: function(label, series) {
                        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                        + label + "<br>" + Math.round(series.data[0][1])
                        + " (" + Math.round(series.percent) + "%)</div>";
                    }
                }
            }
        },
        legend: {
            show: false
        }
    });
});
</script>
@endsection