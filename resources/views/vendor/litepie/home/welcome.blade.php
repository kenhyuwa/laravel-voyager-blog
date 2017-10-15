@extends('litepie::layouts.app')
@section('title')
{{ (count(setting('site.title')) || count(setting('site.description'))) ? ucwords(setting('site.title') . ' - ' . setting('site.description')) : config('litepie.name') . ' - ' . config('litepie.description') }}
@endsection
@section('keywords')
{{ (count(setting('site.keywords'))) ? setting('site.title') : config('litepie.name') }}
@endsection
@section('link')
{{ URL('/') }}
@endsection
@section('meta_desc')
{{ (count(setting('site.seo_description'))) ? ucwords(setting('site.seo_description')) : ucwords(config('litepie.description')) }}
@endsection
@section('images')
{{ asset('storage/' . setting('site.logo')) }}
@endsection
@section('content')
@include('litepie::partials.header')
<!-- BLOG ALL-->
<div class="litepie-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<a href="{{ URL($new_post->first()->slug) }}">
					<div class="litepie-card-item __hover_img">
						<div class="litepie-card-img">
							<img src="{{ !empty($new_post->first()->image) ? asset('storage/' . $new_post->first()->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($new_post->first()->title) }}" class="img-responsive" />
						</div>
						<div class="litepie-card-content-big">
							<h4>{{ (empty($new_post->first()->category)) ? 'Category' : ucwords($new_post->first()->category->name) }}</h4>
							<p>
								{{ ucwords($new_post->first()->title) }}
							</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
						<div class="litepie-card-item auto_height">
							<div class="litepie-ui-item __lite_pie bg-red">
								<i class="fa fa-paperclip"></i>
								<h2>{{ (count(setting('site.title'))) ? setting('site.title') : config('litepie.name') }}</h2>
								<p>{{ (count(setting('site.description'))) ? setting('site.description') : config('litepie.description') }}</p>
								{!! (count(setting('general.social_media'))) ? setting('general.social_media') : '' !!}
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
						<a href="{{ URL($new_post->last()->slug) }}">
							<div class="litepie-card-item __hover_img">
								<div class="litepie-card-img">
									<img src="{{ !empty($new_post->last()->image) ? asset('storage/' . $new_post->last()->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($new_post->last()->title) }}" class="img-responsive" />
								</div>
								<div class="litepie-card-content">
									<h4>{{ (empty($new_post->last()->category)) ? 'Category' : ucwords($new_post->last()->category->name) }}</h4>
									<p>
										{{ ucwords($new_post->last()->title) }}
									</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		@if($blogs)
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($blogs as $key => $blog)
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="">
					<div class="litepie-card-item __hover_img">
						<div class="litepie-card-img">
							<img src="{{ !empty($blog->image) ? asset('storage/' . $blog->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($blog->title) }}" class="img-responsive" />
						</div>
						<div class="litepie-card-content">
							<h4>{{ (empty($blog->category)) ? 'Category' : ucwords($blog->category->name) }}</h4>
							<p>
								{{ ucwords($blog->title) }}
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		@endif
	</div>
</div>
<div class="litepie-space bg-white _reset">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span class="bg-white reset">{{ (count(setting('site.title'))) ? ucwords(setting('site.title')) : config('litepie.name') }} Tutorial</span></h1>
			</div>
		</div>
	</div>
</div>
<div class="ui-x">
	<div class="container">
		<div class="row middle-lg middle-md middle-sm middle-xs">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="ui-item clearfix">
					<div class="ui-left">
						<div class="ui-progress clearfix">
							<h4>FACEBOOK US:</h4>
						</div>
					</div>
					<div class="ui-right bg-red">
						@if(!empty(setting('general.facebook_fans_page')))
						<div class="fb-page" data-href="{{ setting('general.facebook_fans_page') }}" data-width="380" data-hide-cover="false" data-show-facepile="false">
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="litepie-card-item __hover_img _ads_on_index">
					<div class="litepie-card-img _ads_on_index_post">
						{!! setting('quick-adsense.header_ads') !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@if($packages->first())
<!-- PACKAGES -->
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>{{ str_slug($packages->first()->category->slug, ' ') }}</span></h1>
				<small><a href="{{ URL('category/' . $packages->first()->category->slug) }}">View all {{ ucwords(str_slug($packages->first()->category->slug, ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="packages">
	<div class="container">
		@foreach ($packages->chunk(2) as $chunk)
		<div class="block-content">
			<div class="row">
				@foreach ($chunk->chunk(2) as $chunk_again)
				@foreach ($chunk_again as $key => $package)
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="ui-item highlight {{ ($key == 0 || $key == 2) ? 'bg-red': 'bg-lblue' }}">
						<img src="{{ !empty($package->image) ? asset('storage/' . $package->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($package->title) }}" class="img-responsive" />
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="ui-item">
						<span class="top-text">Packages for {{ config('app.name', 'Laravel') }}</span>
						<h3><a href="{{ URL($package->slug) }}" class="_link-packages">{{ ucwords($package->title) }}</a></h3>
						<span class="bottom-text"><i class="pe-7s-pin cyan bold"></i> {{ ucwords($package->category->name) }}</span>
					</div>
				</div>
				@if ($key == 0 || $key == 2)
				<div class="clearfix visible-sm"></div>
				@endif
				@endforeach
				@endforeach
			</div>
		</div>
		@endforeach
	</div>
</div>
@endif
<!-- LARAVEL TUTORIAL -->
@if($laravels->first())
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>{{ str_slug($laravels->first()->category->slug, ' ') }}</span></h1>
				<small><a href="{{ URL('category/' . $laravels->first()->category->slug) }}">View all {{ ucwords(str_slug($laravels->first()->category->slug, ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="laravel-turorial">
	<div class="container">
		@foreach ($laravels->chunk(3) as $chunk)
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($chunk as $key => $laravel)
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="{{ URL($laravel->slug) }}">
					<div class="litepie-card-item __hover_img">
						@if ($key == 0)
						<div class="_banner_first_post _border_banner_red">
							<div class="_banner bg-red white">last tutorial</div>
						</div>
						@endif
						<div class="litepie-card-img">
							<img src="{{ !empty($laravel->image) ? asset('storage/' . $laravel->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($laravel->title) }}" class="img-responsive" />
							<i class="pe-7s-pin red"></i>
						</div>
						<div class="litepie-card-content">
							<h4 class="bold"><i class="pe-7s-pin cyan"></i> {{ (empty($laravel->category)) ? 'Category' : ucwords($laravel->category->name) }}</h4>
							<p>
								{{ ucwords($laravel->title) }}
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
</div>
@endif
@endsection
@section('footer_ads')
@if(count(setting('quick-adsense.footer_ads')))
<section>
	<div class="ads__2">
		<div class="container">
			<div class="row">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
					<div class="_footer_ads">
						{!! setting('quick-adsense.footer_ads') !!}
					</div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			</div>
		</div>
	</div>
</section>
@endif
@endsection