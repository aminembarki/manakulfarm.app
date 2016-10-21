@if( $breeding->exists )
{{ Form::open(['url' => route('breeding.update', ['breeding' => $breeding]), 'method' => 'put']) }}
@else
{{ Form::open(['url' => route('breeding.store')]) }}
@endif

<div class="box-body">

    <div class="form-group">
        {{ Form::label('cow_id', trans('m.cow')) }}
        {{ Form::select('cow_id', \App\Cow::all()->lists('name', 'id'), $breeding->cow_id, ['class' => 'form-control select2', 'data-placeholder' => 'Please Cow', 'placeholder' => '']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('breeder_id', trans('m.breeder')) }}
        {{ Form::select('breeder_id', \App\Breeder::all()->lists('name', 'id'), $breeding->breeder_id, ['class' => 'form-control select2-tags', 'data-placeholder' => 'Please Breeder', 'placeholder' => '']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('service_date', trans('m.serviceDate')) }}
        {{ Form::date('service_date', $breeding->service_date, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('in_charge', trans('m.inCharge')) }}
        {{ Form::text('in_charge', $breeding->in_charge, ['class' => 'form-control']) }}
    </div>

    @if( $breeding->exists )
    
    <div class="form-group">
        {{ Form::label('status', trans('m.status')) }}
        {{ Form::select('status', array_pluck($breeding->getStatusList(), 'name', 'status') ,$breeding->status, ['class' => 'form-control']) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('calving_date', trans('m.calvingDate')) }}
        {{ Form::date('calving_date', $breeding->calving_date, ['class' => 'form-control']) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('dry_date', trans('m.dryDate')) }}
        {{ Form::date('dry_date', $breeding->dry_date, ['class' => 'form-control']) }}
    </div>

    @else

    {{ Form::hidden('status', 'UNCONFIRM') }}

        @if (isset($treatment))
        <div class="checkbox icheck">
            <label>
                {{ Form::checkbox('treatment_id', $treatment->id, true) }}
                @lang('m.createForTreatmentAndDirectBack')
            </label>
        </div>
        @endif

        <div class="checkbox icheck">
            <label>
                {{ Form::checkbox('with_treatments', true, true) }}
                @lang('m.createTreatmentsAsPossible')
            </label>
        </div>
    
    @endif
</div>

<div class="box-footer">

    {{ Form::bsErrors($errors) }}
    
    @if ($breeding->exists)
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> @lang('m.save')</button>
    <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash-o"></i> @lang('m.delete')</button>
    @else
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> @lang('m.create')</button>
    @endif
</div>

{{ Form::close() }}

{{ Form::bsModalDelete(route('breeding.destroy', ['breeding' => $breeding]), 'delete-modal') }}