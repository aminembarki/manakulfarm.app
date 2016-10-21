<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('m.info', ['name' => trans('m.treatment')])</h3>
        @if(isset($edit) && $edit)
        <a href="{{route('treatment.edit', ['treatment' => $treatment])}}" class="pull-right"><i class="fa fa-edit"></i> @lang('m.edit')</a>
        @endif
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>@lang('m.cow')</dt>
            <dd>{{$treatment->cow->name}}</dd>
            <dt>@lang('m.date')</dt>
            <dd>{{$treatment->date ? $treatment->date->format('d/m/Y') : null}}</dd>
            <dt>@lang('m.type')</dt>
            <dd>{{$treatment->getTypeList()[$treatment->type]}}</dd>
            <dt>@lang('m.summary')</dt>
            <dd>{{$treatment->summary}}</dd>
            <dt>@lang('m.inCharge')</dt>
            <dd>{{$treatment->in_charge}}</dd>
            <dt>@lang('m.cost')</dt>
            <dd>{{$treatment->cost ?: null}}</dd>
            <dt>@lang('m.done')</dt>
            <dd>{{$treatment->done ?: null}}</dd>
        </dl>
    </div>
</div>