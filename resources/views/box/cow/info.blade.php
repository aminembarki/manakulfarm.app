<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('m.info', ['name' => trans('m.cow')])</h3>
        @if(isset($edit) && $edit)
        <a href="{{route('cow.edit', ['cow' => $cow])}}" class="pull-right"><i class="fa fa-edit"></i> @lang('m.edit')</a>
        @endif
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="thumbnail">
                    <img src="{{ $cow->defaultImageUrl() }}">
                </div>
            </div>
        </div>
        <dl class="dl-horizontal">
            <dt>@lang('m.name')</dt>
            <dd>{{$cow->name}}</dd>
            <dt>@lang('m.birthdate')</dt>
            <dd>@date($cow->birthdate)</dd>
            <dt>@lang('m.herd')</dt>
            <dd>{{$cow->herd->name or null}}</dd>
            <dt>@lang('m.breeder')</dt>
            <dd>{{$cow->breeder->name or null}}</dd>
            <dt>@lang('m.mother')</dt>
            <dd>{{$cow->mother->name or null}}</dd>
        </dl>
    </div>
</div>