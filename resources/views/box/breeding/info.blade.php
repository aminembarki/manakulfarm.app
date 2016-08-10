<div class="box box-primary">
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
    @if (isset($edit) && $edit)
    <div class="box-footer">

        @foreach($breeding->getPossibleStatus() as $status)
        <button type="button" class="btn {{$status['btn']}} btn-block btn-lg" data-toggle="modal" data-target="#breeding_{{$breeding->id}}{{$status['status']}}">
            <i class="fa {{$status['icon']}}"></i> {{$status['name']}}
        </button>
        @endforeach

        @foreach($breeding->getPossibleStatus() as $status)
        <div class="modal fade" id="breeding_{{$breeding->id}}{{$status['status']}}" tabindex="-1" role="dialog" aria-labelledby="breeding">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Change Breeding Status</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure change status to {{$status['name']}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                        <button type="submit" class="btn {{$status['btn']}}"><i class="fa fa-check"></i> Yes</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
