<script type="text/javascript" src="/js/vue@2.6.14.js"></script>
<script type="text/javascript" src="/js/get_images.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/">Sidmouth</a>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
	@foreach ($MenuList as $menu)
		<li class="nav-item">
			@if ($activeItem == $menu->name )
				<a class="nav-link active" href="/?name={{$menu->name}}">{{$menu->name}}</a>
			@else
				<a class="nav-link" href="/?name={{$menu->name}}">{{$menu->name}}</a>
			@endif
		
			
		</li>
	@endforeach
	</ul>
	</div>
</nav>