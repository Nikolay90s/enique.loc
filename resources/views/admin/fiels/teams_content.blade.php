 {{ Html::link(route('teamsAdd'), 'Новая запись', ['class' => 'btn btn-primary']) }}
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <div class="">
        @if(isset($teams) && is_object($teams))
            @foreach($teams as $team)
            <div class="team_area" style="width: 200px;">
        <div class="team_box wow fadeInDown">
          {{ Html::image('asset/img/'.$team->images, $team->name) }}
        </div>
        <h3 class="wow fadeInDown ">{{ $team->name }}</h3>
        <span class="wow fadeInDown ">{{ $team->prof }}</span>
        <p class="wow fadeInDown ">{{ $team->text }}</p>
              {{ Html::link(route('teamsEdit', ['team' => $team->id]), 'Изменить', ['class' => 'btn btn-success']) }}
              {{ Form::open(['url' => route('teamsEdit', ['team' => $team->id]), 'method' => 'delete']) }}
                {{ Form::button('Удалить', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
              {{ Form::close() }} 
              
      </div>
            @endforeach
        @endif
  </div>
  </div>
</section>