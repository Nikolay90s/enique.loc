@if(isset($menu) && is_array($menu))
<div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="{{ asset('asset/img/logo.png') }}" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
                            @foreach($menu as $k => $men)
			  <li class="{{ $k == 0 ? 'active' : '' }}"><a href="#{{ $men['alias'] }}" class="scroll-link">{{ $men['title'] }}</a></li>
                            @endforeach
			</ul>
      </div>
	 </nav>
    </div>
  </div>
@endif

