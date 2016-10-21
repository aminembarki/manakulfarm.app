<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Treatment Info</h3>
        @if(isset($edit) && $edit)
        <a href="{{route('treatment.edit', ['treatment' => $treatment])}}" class="pull-right"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>Cow</dt>
            <dd>{{$treatment->cow->name}}</dd>
            <dt>Date</dt>
            <dd>{{$treatment->date ? $treatment->date->format('d/m/Y') : null}}</dd>
            <dt>Type</dt>
            <dd>{{$treatment->getTypeList()[$treatment->type]}}</dd>
            <dt>Summary</dt>
            <dd>{{$treatment->summary}}</dd>
            <dt>In Charge</dt>
            <dd>{{$treatment->in_charge}}</dd>
            <dt>Cost</dt>
            <dd>{{$treatment->cost ?: null}}</dd>
            <dt>Done</dt>
            <dd>{{$treatment->done ?: null}}</dd>
        </dl>
    </div>
</div>