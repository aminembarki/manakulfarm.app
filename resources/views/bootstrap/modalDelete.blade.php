<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="delete">
    <div class="modal-dialog" role="document">
        {{ Form::open(['url' => $url, 'method' => 'delete']) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="delete">{{ $header or 'Delete'}}</h4>
            </div>
            <div class="modal-body">
                {{ $body or trans('m.areYouSureToDelete', ['name' => ''])}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> @lang('m.cancel')</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> @lang('m.delete')</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>