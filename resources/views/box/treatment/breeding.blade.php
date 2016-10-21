@if( $treatment->treatable )
@include( 'box.breeding.info', ['breeding' => $treatment->treatable, 'edit' => $treatment->treatable->status == 'UNCONFIRM' && $treatment->type == 'PREGNANCY_DIAGNOSE'] )
@else
{{ Form::open(['url' => route('treatment.update.treatable', ['treatment' => $treatment]), 'method' => 'put']) }}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('m.breeding')</h3>
    </div>
    <div class="box-body">
        <a href="{{ route('breeding.create', ['treatment_id' => $treatment->id]) }}" class="btn btn-primary btn-block btn-lg">
            <i class="fa fa-plus"></i> @lang('m.create')
        </a>
        <hr>
        <div class="form-group">
            {{ Form::select('treatable_id', $treatment->cow->breedings()->orderBy('service_date', 'desc')->get()->lists('full_name', 'id'), $treatment->treatable_id, ['class' => 'form-control', 'placeholder' => '']) }}
            {{ Form::hidden('treatable_type', App\Breeding::class) }}
        </div>
        <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-check"></i> @lang('m.select')</button>
    </div>
</div>
{{ Form::close() }}
@endif