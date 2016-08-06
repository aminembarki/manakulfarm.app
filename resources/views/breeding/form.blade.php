{{ Form::open(['url' => route('breeding.store')]) }}

<div class="box-body">

    <div class="form-group">
        {{ Form::label('cow_id', 'Cow') }}
        {{ Form::select('cow_id', \App\Cow::all()->lists('name', 'id'), $breeding->cow_id, ['class' => 'form-control', 'placeholder' => 'Please Cow']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('breeder_id', 'Breeding') }}
        {{ Form::select('breeder_id', \App\Breeder::all()->lists('name', 'id'), $breeding->breeder_id, ['class' => 'form-control select2-tags', 'placeholder' => 'Please Breeder']) }}                    
    </div>

    <div class="form-group">
        {{ Form::label('service_date', 'Service Date') }}
        {{ Form::date('service_date', $breeding->service_date, ['class' => 'form-control', 'placeholder' => 'Please Enter Service Date']) }}
    </div>

    <div class="form-group">
        {{ Form::label('in_charge', 'In Charge') }}
        {{ Form::text('in_charge', $breeding->in_charge, ['class' => 'form-control']) }}
    </div>

</div>

<div class="box-footer">
    {{ Form::bsErrors($errors) }}
    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-floppy-o"></i> Create</button>
</div>

{{ Form::close() }}