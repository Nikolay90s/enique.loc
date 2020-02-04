
{{ Form::open(['url' => route('portfoliosEdit', ['portfolio' => $portfolio['id']]), 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="form-group row">
    {{ Form::hidden('id', $portfolio['id']) }}
    {{ Form::label('name', 'Название', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('name', $portfolio['name'], ['class' => 'form-control', 'placeholder' => 'Введите название страницы']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('alias', 'Псевдоним', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('alias', $portfolio['alias'], ['class' => 'form-control', 'placeholder' => 'Введите псевдоним страницы']) }}
    </div>
</div>`

<div class="form-group row">
    {{ Form::label('old_images', 'Текущая картинка', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::hidden('old_images', $portfolio['images']) }}
        {{ Html::image('asset/img/'.$portfolio['images'], '', ['width' => '150px']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('images', 'Новое изображение', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::file('images', ['class' => 'filestyle']) }}
    </div>
</div>

<div class="form-group row">
    <div class="col-xs-offset-2 col-xs-10">
        {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
    </div>
</div>
{{ Form::close() }}
