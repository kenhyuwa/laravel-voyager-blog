@extends('litepie::layouts.app')
@section('title')
{{ ucwords(str_slug($page->title , ' ')) }}
@endsection
@section('keywords')
{{ ucwords($page->meta_keywords) }}
@endsection
@section('link')
{{ URL($page->slug) }}
@endsection
@section('meta_desc')
{{ ucwords($page->meta_description) }}
@endsection
@section('images')
{{ !empty($page) ? asset('storage/' . $page->image) : asset('storage/pages/' . setting('site.site_background')) }}
@endsection
@section('content')
<div class="_back_img" style="background: url('{{ (!empty($page->image)) ? asset('storage/' . $page->image) : asset('storage/pages/' . setting('site.site_background')) }}');">
	<h1 class="white">{{ ucwords(str_slug($slug , ' ')) }}</h1>
</div>
<div class="litepie-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="litepie-post">
					<div class="litepie-post-content __page clearfix">
						<div class="{{ (is_null(setting('quick-adsense.random_ads'))) ? 'col-lg-12 col-md-12' : 'col-lg-9 col-md-9' }} col-sm-12 col-xs-12">
							<p></p>
							{!! htmlspecialchars_decode($page->body) !!}
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
@endsection