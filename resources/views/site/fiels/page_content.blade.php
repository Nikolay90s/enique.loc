<div class="inner_wrapper">
  <div class="container">
    <h2>{{ $page->name }}</h2>
    <div class="inner_section">
	<div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">{{ Html::image('asset/img/'.$page->images, $page->name, ['class' => ' zoomIn']) }}<img src="img/about-img.jpg" class="img-circle delay-03s animated wow zoomIn" alt=""></div>
      	<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        	<div class="animated">
                {!! $page->text !!}
              </div>
            {{ Html::link(route('home1'), 'home', ['class' => 'btn btn-primary btn-lg btn-block']) }}
	   </div>
      </div>
    </div>
  </div> 
  </div>

