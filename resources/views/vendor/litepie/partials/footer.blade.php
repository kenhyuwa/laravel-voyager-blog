<div id="footer"></div>
<footer>
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
	<div class="last-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					{{ (count(setting('site.title'))) ? setting('site.title') : config('litepie.name') }} <i class="fa fa-copyright"> 2017 [\] with &nbsp;</i><i class="fa fa-heartbeat heartbeat animate-infinite-heartbeat"></i> &nbsp;in {{ (count(setting('site.building'))) ? setting('site.building') : config('litepie.building') }}
				</div>
			</div>
		</div>
	</div>
</footer>