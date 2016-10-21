<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">@lang('m.info', ['name' => trans('m.breeding')])</h3>
        @if (isset($edit) && $edit)
        <a href="{{route('breeding.edit', ['breeding' => $breeding])}}" class="pull-right"><i class="fa fa-edit"></i> @lang('m.edit')</a>
        @endif
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>@lang('m.name')</dt>
            <dd>{{ $breeding->cow->name }}</dd>
            <dt>@lang('m.breeder')</dt>
            <dd>{{ $breeding->breeder->name }}</dd>
            <dt>@lang('m.serviceDate')</dt>
            <dd>@date($breeding->service_date)</dd>
            <dt>@lang('m.inCharge')</dt>
            <dd>{{ $breeding->in_charge or null }}</dd>
            <dt>@lang('m.status')</dt>
            <dd>{{ $breeding->getStatusName() }}</dd>
            <dt>@lang('m.calvingDate')</dt>
            <dd>@date($breeding->getCalvingDate())</dd>
            <dt>@lang('m.dryDate')</dt>
            <dd>@date($breeding->getDryDate())</dd>
        </dl>
    </div>
    @if (isset($edit) && $edit)
    <div class="box-footer">

        {{ Form::bsErrors($errors) }}

        @foreach($breeding->getPossibleStatus() as $status)
        <button type="button" class="btn {{$status['btn']}} btn-block btn-lg" data-toggle="modal" data-target="#breeding_{{$breeding->id}}{{$status['status']}}">
            <i class="fa {{$status['icon']}}"></i> {{$status['name']}}
        </button>
        @endforeach

        @foreach($breeding->getPossibleStatus() as $status)
        <div class="modal fade" id="breeding_{{$breeding->id}}{{$status['status']}}" tabindex="-1" role="dialog" aria-labelledby="breeding">
            {{ Form::open(['url' => route('breeding.update.status', ['breeding' => $breeding, 'status' => $status['status']]), 'method' => 'put', 'class' => 'form-inline']) }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('m.changeBreedingStatus')</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" style="font-weight: normal;">
                            @lang('m.areYouSureToChangeStatusTo') {{$status['name']}}
                            @if ( in_array($status['status'], $breeding->calvingStatus) )
                            @lang('m.on')
                            <div class="input-group">
                                {{ Form::date('date', date('Y-m-d'), ['class' => 'form-control']) }}
                            </div>
                            @endif
                            ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> @lang('m.cancel')</button>
                        <button type="submit" class="btn {{$status['btn']}}">
                            <i class="fa {{$status['icon']}}"></i> {{$status['name']}}
                        </button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        @endforeach
    </div>
    @endif
</div>
