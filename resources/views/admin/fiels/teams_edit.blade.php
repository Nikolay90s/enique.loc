{{ Form::open(['url' => route('teamsEdit', ['team' => $team['id']]), 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="form-group row">
    {{ Form::label('name','Имя:', ['class' => 'col-xs-2 col-form-label']) }}
    {{ Form::hidden('id', $team['id']) }}
    <div class="col-sm-8">
        {{ Form::text('name', $team['name'], ['class' => 'form-control', 'placeholder' => 'Введите имя']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('prof', 'Профессия:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-xs-8">
        {{ Form::text('prof', $team['prof'], ['class' => 'form-control', 'placeholder' => 'Введите профессию']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('text', 'Текст:', ['class' => 'col-xs-2 col-form-label']) }}
    {{ Form::hidden('old_images', $team['images']) }}
    <div class="col-xs-8">
        {{ Form::text('text', $team['text'], ['class' => 'form-control', 'placeholder' => 'Введите текст']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('images', 'Фотография:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-xs-8">
        {{ Html::image('asset/img/'.$team['images'], '', ['width' => '200px']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('images', 'Фотография:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-xs-8">
        {{ Form::file('images', ['class' => 'filestyle']) }}
    </div>
</div>


<div class="form-group row">
    <div class="col-xs-offset-2 col-xs-10">
        {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
    </div>
</div>
{{ Form::close() }}

