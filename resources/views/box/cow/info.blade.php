<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cow Info</h3>
        @if(isset($edit) && $edit)
        <a href="{{route('cow.edit', ['cow' => $cow])}}" class="pull-right"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="thumbnail">
                    <img src="{{ url('images/cow.svg') }}">
                </div>
            </div>
        </div>
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{$cow->name}}</dd>
            <dt>Birthdate</dt>
            <dd>@date($cow->birthdate)</dd>
            <dt>Herd</dt>
            <dd>{{$cow->herd->name or null}}</dd>
            <dt>Breeder</dt>
            <dd>{{$cow->breeder->name or null}}</dd>
            <dt>Mother</dt>
            <dd>{{$cow->mother->name or null}}</dd>
        </dl>
    </div>
</div>