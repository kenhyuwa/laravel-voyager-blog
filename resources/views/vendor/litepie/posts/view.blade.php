@extends('litepie::layouts.app')
@section('title')
{{ ucwords(str_slug($post->title , ' ')) }}
@endsection
@section('keywords')
{{ ucwords($post->meta_keywords) }}
@endsection
@section('link')
{{ URL($post->slug) }}
@endsection
@section('meta_desc')
{{ ucwords($post->meta_description) }}
@endsection
@section('images')
{{ !empty($post->image) ? asset('storage/' . $post->thumbnail('medium')) : asset('storage/pages/' . setting('site.site_background')) }}
@endsection
@section('content')
@include('litepie::partials.header')
@if (count(setting('quick-adsense.header_ads')))
<section>
	<div class="ads__1">
		<div class="container">
			<div class="row">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 hidden-xs"></div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<div class="_header_ads">
								{!! setting('quick-adsense.header_ads') !!}
						</div>
					</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 hidden-xs"></div>
			</div>
		</div>
	</div>
</section>
@endif
<div class="litepie-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="litepie-post">
					<div class="images-post">
						<img src="{{ !empty($post->image) ? asset('storage/' . $post->image) : asset('storage/pages/' . setting('site.site_background')) }}" alt="{{ ucwords($post->title) }}" class="img-responsive" />
					</div>
					<div class="litepie-post-content clearfix">
						<div class="{{ (is_null(setting('quick-adsense.random_ads'))) ? 'col-lg-12 col-md-12' : 'col-lg-9 col-md-9' }} col-sm-12 col-xs-12">
							<header class="header_post">
								<h1 class="post-title">{{ ucwords($post->title) }}</h1>
								<span class="label">
									<i class="pe-7s-pin cyan"></i> {{ (empty($post->category)) ? 'Category' : ucwords($post->category->name) }} 
									<i class="pe-7s-stopwatch cyan"></i> <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span>
								</span>
							</header>
							<p></p>
							{!! htmlspecialchars_decode($post->body) !!}
							<p></p>
							@if (!empty($prev_next['uriPrev']))
							<blockquote>
								Baca Juga: <a href="{{ URL($prev_next['uriPrev']->slug) }}">{{ ucwords($prev_next['uriPrev']->title) }}</a>
							</blockquote>
							@endif
							<p></p>
							@if(count(setting('quick-adsense.article_ads')))
							<p>
								{!! setting('quick-adsense.article_ads') !!}
							</p>
							@endif
							<p>
								Terima kasih telah meluangkan waktu membaca artikel-artikel dari <strong><a href="{{ URL('/') }}">{{ setting('site.title') }}</a></strong>, Semoga bermanfaat.
							</p>
							<p></p>
						</div>
						@if(count(setting('quick-adsense.random_ads')))
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="_adsense">
								<div class="_adsense_title">SPONSOR</div>
								@include('litepie::partials.responsive_ads')
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="_box_share">
	<div class="container">
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
				<a {!! (!empty($prev_next['uriPrev'])) ? 'href="' . URL($prev_next['uriPrev']->slug) .'"' : '' !!}
					{!! (!empty($prev_next['uriPrev'])) ? 'data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="'.$prev_next['uriPrev']->title.'"' : '' !!}>
					<div class="item __left">
						<i class="pe-7s-left-arrow pull-left"></i>
					</div>
				</a>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
				<div class="item">
					<h2>SHARE</h2>
					<div class="social">
						<a data-href="https://www.facebook.com/sharer/sharer.php?u={{ URL($post->slug) }}" title="facebook" class="facebook facebook-share" target="_blank"><i class="fa fa-facebook"></i></a>
						<a data-href="https://twitter.com/intent/tweet?text={{ ucwords($post->title) . '&url=' . URL($post->slug) . '&via=litepieweb' }}" title="twitter" class="twitter twitter-share" target="_blank"><i class="fa fa-twitter"></i></a>
						<a data-href="https://plus.google.com/share?url={{ URL($post->slug) }}" title="google" class="google-plus google-share" target="_blank"><i class="fa fa-google-plus"></i></a>
						<a data-href="https://www.pinterest.com/pin/create/button/?url={{ URL($post->slug) }}&media={{ (count(setting('site.logo'))) ? asset('storage/' . setting('site.logo')) : '/pavicon.png' }}&description={{ ucwords($post->meta_description) }}&hashtags=litepie,web,development" title="pinterest" class="pinterest pinterest-share" target="_blank"><i class="fa fa-pinterest"></i></a>
						<a data-href="https://www.linkedin.com/shareArticle?mini=true&url={{ URL($post->slug) }}&title={{ setting('site.title') }}&source={{ URL($post->slug) }}%2F&summary={{ ucwords($post->meta_description) }}" title="linkedin" class="linkedin linkedin-share" target="_blank"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
				<a {!! (!empty($prev_next['uriNext'])) ? 'href="' . URL($prev_next['uriNext']->slug) .'"' : '' !!}
					{!! (!empty($prev_next['uriNext'])) ? 'data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="'.$prev_next['uriNext']->title.'"' : '' !!}>
					<div class="item __right">
						<i class="pe-7s-right-arrow pull-right"></i>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="litepie-space bg-white _reset">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span class="bg-white reset">anything idea?</span></h1>
			</div>
		</div>
	</div>
</div>
<div class="ui-x">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@if(count(setting('general.discus')))
				<div id="disqus_thread"></div>
				<script>
				var disqus_config = function () {
				this.page.url = APP_URL;
				this.page.identifier = '{{ URL($post->slug) }}';
				};
				(function() {
				var d = document, s = d.createElement('script');
				s.src = '{{ setting('general.discus') }}/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				@endif
			</div>
		</div>
	</div>
</div>
@if(sizeof($recent) > 0)
<div class="litepie-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><span>do you want a {{ (empty($post->category)) ? '' : ucwords(str_slug($post->category->slug , ' ')) }}?</span></h1>
				<small><a href="{{ URL('category/'. (empty($post->category)) ? '' : $post->category->slug) }}">View all {{ (empty($post->category)) ? '' : ucwords(str_slug($post->category->slug , ' ')) }}</a></small>
			</div>
		</div>
	</div>
</div>
<div class="laravel-turorial">
	<div class="container">
		<div class="recent_title"><i class="pe-7s-way red"></i> other article:</div>
		<div class="row middle-lg middle-md middle-sm middle-xs">
			@foreach ($recent as $post)
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="{{ URL($post->slug) }}">
					<div class="litepie-card-item __hover_img">
						<div class="litepie-card-img">
							<img src="{{ asset('storage/' . $post->image) }}" alt="{{ ucwords($post->title) }}" class="img-responsive" />
							<i class="pe-7s-pin red"></i>
						</div>
						<div class="litepie-card-content">
							<h4><i class="pe-7s-pin cyan"></i> {{ (empty($post->category)) ? 'Category' : ucwords($post->category->name) }}</h4>
							<p>{{ ucwords($post->title) }}</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
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
@push('script')
@if (count(setting('general.discus')))
	<script id="dsq-count-scr" src="//litepie.disqus.com/count.js" async></script>
@endif
@endpush