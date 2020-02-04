{{ Form::open(['url' => route('portfoliosAdd'), 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
 <div class="form-group">
     {{ Form::label('name', 'Имя', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-10">
      {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Введите имя портфолио']) }}
    </div>
 </div>
<br>
     <br>
     <br>
   <div class="form-group">
     {{ Form::label('alias', 'Псевдоним', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-10">
      {{ Form::text('alias', old('alias'), ['class' => 'form-control', 'placeholder' => 'Введите псевдоним портфолио']) }}
    </div>
  </div>
     <br>
     <br>
   <div class="form-group">
     {{ Form::label('images', 'Изображение', ['class' => 'col-xs-2 col-form-label']) }}
    <div class="col-sm-10">
      {{ Form::file('images', ['class' => 'filestyle']) }}
    </div>
  </div>
     <br>
     <br>
<div class="form-group">
    <div class="col-xs-offset-2 col-xs-10">
    {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
    </div>
</div>
{{ Form::close() }}

