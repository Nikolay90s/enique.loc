<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Псевдоним</th>
      <th scope="col">Изображения</th>
      <th scope="col">Текст</th>
      <th scope="col">Удалить</th>
    </tr>
  </thead>
  <tbody>
      @foreach($pages as $page)
    <tr>
      <th scope="row">{{ $page->id }}</th>
      <td><a href="{{ route('pagesEdit', ['id' => $page->id]) }}">{{ $page->name }}</a></td>
      <td>{{ $page->alias }}</td>
      <td>{{ $page->images }}</td>
      <td>{{ $page->text }}</td>
      <td>
          {!! Form::open(['url' => route('pagesEdit', ['page' => $page->id]), 'class' => 'form-horizontal', 'method' => 'post']) !!}
                {{ method_field('delete') }}
                {!! Form::button('Удалить', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
          {!! Form::close() !!}
      </td>
    </tr>
     @endforeach
  </tbody>
</table>
<div class="row">
    <div class="col-3">
{{ Html::link(route('pagesAdd'), 'Новая страница', ['class' => 'btn btn-primary']) }}
    </div>
</div>