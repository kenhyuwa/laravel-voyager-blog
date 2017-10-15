@extends('litepie::layouts.app')
@section('title')
{{ ucwords(str_slug($slug , ' ')) }}
@endsection
@section('keywords')
{{ ucwords(str_slug($slug , ' ')) }}
@endsection
@section('link')
{{ URL('category/' . $slug) }}
@endsection
@section('meta_desc')
{{ (count(setting('site.seo_description'))) ? ucwords(setting('site.seo_description')) : ucwords(config('litepie.description')) }}
@endsection
@section('images')
{{ !empty($post->image) ? asset('storage/' . $post->image) : asset('storage/pages/' . setting('site.site_background')) }}
@endsection
@section('content')
@if($slug === str_slug('blog', '-'))
<div class="_back_img" style="background: url('{{ (count(setting('site.site_background'))) ? asset('storage/pages/' . setting('site.site_background')) : '' }}');">
	<h1 class="purple">{{ ucwords(str_slug($slug , ' ')) }}</h1>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>{{ str_slug($slug , ' ') }}</span></h1>
				<small><a href="">View all {{ ucwords(str_slug($slug , ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="laravel-turorial">
	<div class="container">
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($category as $key => $post)
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="{{ URL($post->slug) }}">
					<div class="litepie-card-item __hover_img">
						@if ($key == 0)
						<div class="_banner_first_post _border_banner_black">
							<div class="_banner bg-lblack white">last tutorial</div>
						</div>
						@endif
						<div class="litepie-card-img">
							<img src="{{ !empty($post->image) ? asset('storage/' . $post->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($post->title) }}" class="img-responsive" />
						</div>
						<div class="litepie-card-content">
							<h4><i class="pe-7s-stopwatch cyan"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</h4>
							<p>
								{{ ucwords($post->title) }}
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@if(count(setting('quick-adsense.random_ads')))
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="litepie-card-item __hover_img _ads_on_index">
					<div class="litepie-card-img _ads_on_index_post">
						@include('litepie::partials.responsive_ads')
					</div>
				</div>
				<div class="adsense_title">sponsor</div>
			</div>
			@endif
		</div>
	</div>
</div>
@elseif ($slug === str_slug('Tutorial Laravel Indonesia', '-'))
<div class="_back_img" style="background: url('{{ (count(setting('site.site_background'))) ? asset('storage/pages/' . setting('site.site_background')) : '' }}');">
	<h1 class="red">{{ ucwords(str_slug($slug , ' ')) }}</h1>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>{{ str_slug($slug , ' ') }}</span></h1>
				<small><a href="">View all {{ ucwords(str_slug($slug , ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="laravel-turorial">
	<div class="container">
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($category as $key => $post)
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="{{ URL($post->slug) }}">
					<div class="litepie-card-item __hover_img">
						@if ($key == 0)
						<div class="_banner_first_post _border_banner_red">
							<div class="_banner bg-red white">last tutorial</div>
						</div>
						@endif
						<div class="litepie-card-img">
							<img src="{{ !empty($post->image) ? asset('storage/' . $post->thumbnail('medium')) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($post->title) }}" class="img-responsive" />
						</div>
						<div class="litepie-card-content">
							<h4><i class="pe-7s-stopwatch cyan"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</h4>
							<p>
								{{ ucwords($post->title) }}
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@if(count(setting('quick-adsense.random_ads')))
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="litepie-card-item __hover_img _ads_on_index">
					<div class="litepie-card-img _ads_on_index_post">
						@include('litepie::partials.responsive_ads')
					</div>
				</div>
				<div class="adsense_title">sponsor</div>
			</div>
			@endif
		</div>
	</div>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{!! $category->links() !!}
			</div>
		</div>
	</div>
</div>
@elseif($slug === str_slug('Packages Development', '-'))
<div class="_back_img" style="background: url('{{ (count(setting('site.site_background'))) ? asset('storage/pages/' . setting('site.site_background')) : '' }}');">
	<h1 class="cyan">{{ ucwords(str_slug($slug , ' ')) }}</h1>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row middle-lg middle-md middle-sm middle-xs">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>{{ str_slug($slug , ' ') }}</span></h1>
				<small><a href="">View all {{ ucwords(str_slug($slug , ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="laravel-turorial">
	<div class="container">
		<div class="row">
			@foreach ($category as $key => $post)
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="{{ URL($post->slug) }}">
					<div class="litepie-card-item __hover_img">
						@if ($key == 0)
						<div class="_banner_first_post _border_banner_cyan">
							<div class="_banner bg-cyan white">last packages</div>
						</div>
						@endif
						<div class="litepie-card-img">
							<img src="{{ !empty($post->image) ? asset('storage/' . $post->thumbnail('medium')) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($post->title) }}" class="img-responsive" />
						</div>
						<div class="litepie-card-content">
							<h4><i class="pe-7s-stopwatch cyan"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</h4>
							<p>
								{{ ucwords($post->title) }}
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@if(count(setting('quick-adsense.random_ads')))
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="litepie-card-item __hover_img _ads_on_index">
					<div class="litepie-card-img _ads_on_index_post">
						@include('litepie::partials.responsive_ads')
					</div>
				</div>
				<div class="adsense_title">sponsor</div>
			</div>
			@endif
		</div>
	</div>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{!! $category->links() !!}
			</div>
		</div>
	</div>
</div>
@elseif($slug === str_slug('php', '-'))
<div class="_back_img" style="background: url('{{ (count(setting('site.site_background'))) ? asset('storage/pages/' . setting('site.site_background')) : '' }}');">
	<h1 class="purple">Tutorial {{ strtoupper(str_slug($slug , ' ')) }}</h1>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>Tutorial {{ strtoupper(str_slug($slug , ' ')) }}</span></h1>
				<small><a href="">View all Tutorial {{ strtoupper(str_slug($slug , ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="php-development bg-body">
	<div class="container">
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($category as $key => $post)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<a href="{{ URL($post->slug) }}">
					<div class="box">
						<div class="php-list">
							@if ($key == 0)
							<div class="_banner_first_post _border_banner_black">
								<div class="_banner bg-lblack white">last tutorial</div>
							</div>
							@endif
							<div class="php-content">
								<span><small>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</small></span>
								<p>
									{{ ucwords($post->title) }}
								</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@if(count(setting('quick-adsense.random_ads')))
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="box">
					<div class="php-list">
						<div class="php-content">
							@include('litepie::partials.responsive_ads')
						</div>
					</div>
					<div class="adsense_title">sponsor</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{!! $category->links() !!}
			</div>
		</div>
	</div>
</div>
@elseif($slug === str_slug('Web Development', '-'))
<div class="_back_img" style="background: url('{{ (count(setting('site.site_background'))) ? asset('storage/pages/' . setting('site.site_background')) : '' }}');">
	<h1 class="teal">{{ ucwords(str_slug($slug , ' ')) }}</h1>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>{{ ucwords(str_slug($slug , ' ')) }}</span></h1>
				<small><a href="">View all {{ ucwords(str_slug($slug , ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="php-development bg-body">
	<div class="container">
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($category as $key => $post)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<a href="{{ URL($post->slug) }}">
					<div class="box">
						<div class="php-list">
							@if ($key == 0)
							<div class="_banner_first_post _border_banner_teal">
								<div class="_banner bg-lteal white">last tutorial</div>
							</div>
							@endif
							<div class="php-content">
								<span><small>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</small></span>
								<p>
									{{ ucwords($post->title) }}
								</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@if(count(setting('quick-adsense.random_ads')))
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="box">
					<div class="php-list">
						<div class="php-content">
							@include('litepie::partials.responsive_ads')
						</div>
					</div>
					<div class="adsense_title">sponsor</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{!! $category->links() !!}
			</div>
		</div>
	</div>
</div>
@endif
@endsection
