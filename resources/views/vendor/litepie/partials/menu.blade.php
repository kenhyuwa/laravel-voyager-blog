<div class="litepie">
	<div class="ui-icon bg-lblue">
		<a href="{{ URL('/') }}" class="ui-tooltip" data-toggle="tooltip" data-placement="right" title=" HOME"><i class="pe-7s-home bold f20"></i></a>
	</div>
	@foreach ($litepie['menus'] as $menu)
	<div class="ui-icon bg-lblue">
		<a href="{{ URL('category/' . $menu->slug) }}" class="ui-tooltip bold f20" data-toggle="tooltip" data-placement="right" title=" {{ strtoupper($menu->name) }}"> {{ strtoupper(str_limit($menu->name, $limit = 1, $end = '')) }}</a>
	</div>
	@endforeach
	<a href="#" id="_litepie-menu" class="ui-btn bg-lblue hidden-xs hidden-sm hidden-md">
		<div class="hamburger">
			<i class="bars"></i>
		</div>
	</a>
	<a href="#" class="ui-btn bg-lblue ui-trigger-menu hidden-lg">
		<div class="hamburger">
			<i class="bars"></i>
		</div>
	</a>
</div>

<div class="litepie-outer bg-github">
	<a href="#" class="litepie-close">&times;</a>
	<div class="litepie-content">
		<form id="form_search">
			<input type="search" name="q" class="litepie-full-search" placeholder="Type Anything..." autofocus autocomplete="off">
		</form>
	</div>
	<div class="php-development bg-github">
		<div class="container">
			<div class="row middle-lg middle-md middle-sm middle-xs" id="preloader-active"></div>
		</div>
	</div>
</div>
<div class="litepie-outer-menu bg-github">
	<a href="#" class="litepie-close-menu">&times;</a>
	<div class="litepie-content">
		<div class="menu">
			<a href="{{ URL('/') }}">Home</a>
			@foreach ($litepie['menus'] as $menu)
			<a href="{{ URL('category/' . $menu->slug) }}">{{ strtoupper($menu->name) }}</a>
			@endforeach
		</div>
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="litepie-ui-item">
							{!! (count(setting('general.social_media'))) ? setting('general.social_media') : '' !!}
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="footer-brand">
							<h1>{{ (count(setting('site.title'))) ? setting('site.title') : config('app.name') }}</h1>
							<small>{{ (count(setting('site.description'))) ? setting('site.description') : config('app.description') }}</small>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="nav-footer">
							@foreach ($litepie['pages'] as $page)
							<li><a href="{{ URL($page->slug) }}">{{ ucwords($page->title) }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>