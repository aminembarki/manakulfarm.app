@if ($treatment->exists)
{{ Form::open(['url' => route('treatment.update', ['treatment' => $treatment]), 'method' => 'put']) }}
@else
{{ Form::open(['url' => route('treatment.store')]) }}
@endif

<div class="box-body">

    <div class="form-group">
        {{ Form::label('cow_id', 'Cow') }}
        {{ Form::select('cow_id', \App\Cow::all()->lists('name', 'id'), $treatment->cow_id, ['class' => 'form-control select2', 'data-placeholder' => 'Please Cow', 'placeholder' => '']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('start_date', 'Start Date') }}
        {{ Form::date('start_date', $treatment->start_date ?: date('Y-m-d'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('end_date', 'End Date') }}
        {{ Form::date('end_date', $treatment->end_date ?: date('Y-m-d'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'Type') }}
        {{ Form::select('type', $treatment->typeList, $treatment->type, ['class' => 'form-control', 'placeholder' => '']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('summary', 'Summary') }}
        {{ Form::textarea('summary', $treatment->summary, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('in_charge', 'In Charge') }}
        {{ Form::text('in_charge', $treatment->in_charge, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cost', 'Cost') }}
        {{ Form::number('cost', $treatment->cost, ['class' => 'form-control']) }}
    </div>

    <div class="checkbox icheck">
        <label>
            {{ Form::checkbox('done', 1, $treatment->done) }} Done
        </label>
    </div>

</div>

<div class="box-footer">

    {{ Form::bsErrors($errors) }}
    
    @if ($treatment->exists)
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> Save</button>
    <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash-o"></i> Delete</button>
    @else
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> Create</button>
    @endif
</div>

{{ Form::close() }}

{{ Form::bsModalDelete(route('treatment.destroy', ['treatment' => $treatment]), 'delete-modal', "Delete {$treatment->name}", "Are you sure to delete {$treatment->name}?") }}

@section('script')

@parent

<script type="text/javascript">
    $(document).ready(function() {
        $('#start_date').change(function(event) {
            $('#end_date').val( $(this).val() );
        });
    });
</script>

@endsection