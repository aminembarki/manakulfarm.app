@if ($cow->exists)
{{ Form::open(['url' => route('cow.update', ['cow' => $cow]), 'method' => 'put', 'files' => true]) }}
@else
{{ Form::open(['url' => route('cow.store'), 'files' => true]) }}
@endif

<div class="box-body">

    <div class="form-group">
        {{ Form::label('name', trans('m.name')) }}
        {{ Form::text('name', $cow->name, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('serial', trans('m.serial')) }}
        {{ Form::text('serial', $cow->serial, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('birthdate', trans('m.birthdate')) }}
        {{ Form::date('birthdate', $cow->birthdate, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('herd', trans('m.herd')) }}
        {{ Form::select('herd_id', \App\Herd::all()->lists('name', 'id'), $cow->herd_id, ['class' => 'form-control', 'placeholder' => 'Please Select Herd']) }}
    </div>

    <div class="form-group">
        {{ Form::label('breeder', trans('m.breeder')) }}
        {{ Form::select('breeder_id', \App\Breeder::all()->lists('name', 'id'), $cow->breeder_id, ['class' => 'form-control select2-tags', 'data-placeholder' => 'Please Select Breeder', 'placeholder' => '']) }}
    </div>

    <div class="form-group">
        {{ Form::label('mother', trans('m.mother')) }}
        {{ Form::select('mother_id', \App\Cow::where('id', '<>', $cow->id)->get()->lists('name', 'id'), $cow->mother_id, ['class' => 'form-control select2', 'data-placeholder' => 'Please Select Mother', 'placeholder' => '']) }}
    </div>

    <div class="form-group">
        {{ Form::label('images[]', trans('m.images')) }}
        {{ Form::file('images[]', ['multiple' => 'multiple']) }}
    </div>

</div>

<div class="box-footer">

    {{ Form::bsErrors($errors) }}
    
    @if ($cow->exists)
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> @lang('m.save')</button>
    <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash-o"></i> @lang('m.delete')</button>
    @else
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> @lang('m.create')</button>
    @endif
</div>

{{ Form::close() }}

{{ Form::bsModalDelete(route('cow.destroy', ['cow' => $cow]), 'delete-modal', trans('m.delete')." {$cow->name}", trans('m.areYouSureToDelete', ['name' => $cow->name])) }}