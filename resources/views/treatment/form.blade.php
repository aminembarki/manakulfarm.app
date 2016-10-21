@if ($treatment->exists)
{{ Form::open(['url' => route('treatment.update', ['treatment' => $treatment]), 'method' => 'put']) }}
@else
{{ Form::open(['url' => route('treatment.store')]) }}
@endif

<div class="box-body">

    <div class="form-group">
        {{ Form::label('cow_id', trans('m.cow')) }}
        {{ Form::select('cow_id', \App\Cow::all()->lists('name', 'id'), $treatment->cow_id, ['class' => 'form-control select2', 'data-placeholder' => 'Please Cow', 'placeholder' => '', 'disable' => true]) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('date', trans('m.date')) }}
        {{ Form::date('date', $treatment->date ?: date('Y-m-d'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', trans('m.type')) }}
        {{ Form::select('type', $treatment->getTypeList(), $treatment->type, ['class' => 'form-control', 'placeholder' => '']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('summary', trans('m.summary')) }}
        {{ Form::textarea('summary', $treatment->summary, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('in_charge', trans('m.inCharge')) }}
        {{ Form::text('in_charge', $treatment->in_charge, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cost', trans('m.cost')) }}
        {{ Form::number('cost', $treatment->cost, ['class' => 'form-control']) }}
    </div>

    <div class="checkbox icheck">
        <label>
            {{ Form::checkbox('done', 1, $treatment->done) }} @lang('m.done')
        </label>
    </div>

</div>

<div class="box-footer">

    {{ Form::bsErrors($errors) }}
    
    @if ($treatment->exists)
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> @lang('m.save')</button>
    <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash-o"></i> @lang('m.delete')</button>
    @else
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> @lang('m.create')</button>
    @endif
</div>

{{ Form::close() }}

{{ Form::bsModalDelete(route('treatment.destroy', ['treatment' => $treatment]), 'delete-modal') }}
