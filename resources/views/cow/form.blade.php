@if ($cow->exists)
{{ Form::open(['url' => route('cow.update', ['cow' => $cow]), 'method' => 'put']) }}
@else
{{ Form::open(['url' => route('cow.store')]) }}
@endif

<div class="box-body">

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $cow->name, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('serial', 'Serial') }}
        {{ Form::text('serial', $cow->serial, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('birthdate', 'Birthdate') }}
        {{ Form::date('birthdate', $cow->birthdate, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('herd', 'Herd') }}
        {{ Form::select('herd_id', \App\Herd::all()->lists('name', 'id'), $cow->herd_id, ['class' => 'form-control', 'placeholder' => 'Please Select Herd']) }}
    </div>

    <div class="form-group">
        {{ Form::label('breeder', 'Breeder') }}
        {{ Form::select('breeder_id', \App\Breeder::all()->lists('name', 'id'), $cow->breeder_id, ['class' => 'form-control select2-tags', 'placeholder' => 'Please Select Breeder']) }}
    </div>

    <div class="form-group">
        {{ Form::label('mother', 'Mother') }}
        {{ Form::select('mother_id', \App\Cow::where('id', '<>', $cow->id)->get()->lists('name', 'id'), $cow->mother_id, ['class' => 'form-control', 'placeholder' => 'Please Select Mother']) }}
    </div>

</div>

<div class="box-footer">

    {{ Form::bsErrors($errors) }}
    
    @if ($cow->exists)
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> Save</button>
    <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash-o"></i> Delete</button>
    @else
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> Create</button>
    @endif
</div>

{{ Form::close() }}

{{ Form::bsModalDelete(route('cow.destroy', ['cow' => $cow]), 'delete-modal', "Delete {$cow->name}", "Are you sure to delete {$cow->name}?") }}