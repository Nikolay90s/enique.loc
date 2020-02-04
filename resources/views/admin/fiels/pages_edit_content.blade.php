{{ Form::open(['url' => route('pagesEdit', ['pages' => $data['id']]), 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

<div class="form-group row">
    {{ Form::hidden('id', $data['id']) }}
    {{ Form::label('name', 'Название:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('name', $data['name'], ['class' => 'form-control', 'placeholder' => 'Введите название страницы']) }}
    </div>
  </div>

<div class="form-group row">
    {{ Form::label('alias', 'Псевдоним:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('alias', $data['alias'], ['class' => 'form-control', 'placeholder' => 'Введите псевдоним страницы']) }}
    </div>
  </div>

<div class="form-group row">
    {{ Form::label('text', 'Текст:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::textarea('text', $data['text'], ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Введите текст страницы']) }}
    </div>
  </div>

<div class="form-group row">
    {{ Form::label('old_images', 'Изображение:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Html::image('asset/img/'.$data['images'], '', ['class' => 'img-circle img-responsive', 'width' => '150px']) }}
        {{ Form::hidden('old_images', $data['images']) }}
    </div>
  </div>

<div class="form-group row">
    {{ Form::label('images', 'Новое-изображение:', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::file('images', ['class' => 'filestyle']) }}
    </div>
  </div>

<div class="form-group">
    <div class="col-xs-offset-2 col-xs-10">
        {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
    </div>
    
{{ Form::close() }}
<script>
    CKEDITOR.replace('editor');
</script>

