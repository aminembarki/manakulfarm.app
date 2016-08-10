<div class="box">
    <div class="box-header">
        <h3 class="box-title">Breeder Info</h3>
        @if (isset($edit) && $edit)
        <a href="{{route('breeding.edit', ['breeding' => $breeding])}}" class="pull-right"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $breeding->cow->name }}</dd>
            <dt>Breeder</dt>
            <dd>{{ $breeding->breeder->name }}</dd>
            <dt>Service Date</dt>
            <dd>@date($breeding->service_date)</dd>
            <dt>In Charge</dt>
            <dd>{{ $breeding->in_charge or null }}</dd>
            <dt>Status</dt>
            <dd>{{ $breeding->getStatusName() }}</dd>
            <dt>Calving Date</dt>
            <dd>@date($breeding->getCalvingDate())</dd>
            <dt>Dry Date</dt>
            <dd>@date($breeding->getDryDate())</dd>
        </dl>
    </div>
</div>