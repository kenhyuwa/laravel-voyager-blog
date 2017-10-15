<?php

namespace Ken\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Ken\Blog\Http\Controllers\Controller;
use Ken\Blog\Facades\Litepie;

class LitepieController extends Controller
{
	protected $page = 'litepie::';
	
	public function index()
	{
		return Litepie::view($this->page . 'home.welcome', $this->allPost());
	}

	public function category(Request $request, $slug)
	{
		return view($this->page . 'posts.index', $this->allCategory($slug));
	}

	public function any(Request $request)
	{
		if($request->path() == 'blog')
			return view($this->page . 'posts.index', $this->blog($request->path()));
		else if($request->path() == 'about-us')
			return view($this->page . 'page.index', $this->page($request->path()));
		else if($request->path() == 'disclaimer')
			return view($this->page . 'page.index', $this->page($request->path()));
		else if($request->path() == 'privacy-policy')
			return view($this->page . 'page.index', $this->page($request->path()));
		else
			return view($this->page . 'posts.view', $this->post($request->path()));
	}

	public function searching(Request $request, $q)
	{
		if($request->ajax()){
			return response()
				->json($this->search($q));
		}
	}
}
