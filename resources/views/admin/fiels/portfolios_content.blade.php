{{ Html::link(route('portfoliosAdd'), 'Новая запись', ['class' => 'btn btn-primary']) }}
<br>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Псевдоним</th>
      <th scope="col">Картинка</th>
      <th scope="col">Удалить</th>
    </tr>
  </thead>
  <tbody>
      @foreach($portfolios as $portfolio)
    <tr>
      <th scope="row">{{ $portfolio->id }}</th>
      <td><a href="{{ route('portfoliosEdit', ['id' => $portfolio->id]) }}">{{ $portfolio->name }}</a></td>
      <td>{{ $portfolio->alias }}</td>
      <td>{{ $portfolio->images }}</td>
      <td>
          {!! Form::open(['url' => route('portfoliosEdit', ['portfolio' => $portfolio->id]), 'method' => 'post', 'class' => 'form-horizontal']) !!}
                {{ method_field('delete') }}
                {!! Form::button('Удалить', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
          {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>