<div class="box">
    <div class="box-header">
        <h3 class="box-title">Breedings</h3>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Breeder</th>
                    <th>Service Date</th>
                    <th>In Charge</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($breedings as $index => $breeding)
                <tr>
                    <td>{{ $index + 1}}</a></td>
                    <td>{{ link_to_route('breeding.show', $breeding->cow->name, ['breeding' => $breeding]) }}</td>
                    <td>{{ $breeding->breeder->name }}</td>
                    <td>@date($breeding->service_date)</td>
                    <td>{{ $breeding->in_charge or null }}</td>
                    <td>{{ $breeding->status or null }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>