<?php

namespace Ken\Blog\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Category;

class Controller extends BaseController
{
   	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   	protected $is_publish = 'PUBLISHED';
   	protected $is_active = 'ACTIVE';

   	protected function allPost()
   	{
   		$data['slug'] = '';
   		$data['laravels'] = $this->postWithLimit('Laravel', 3);
   		$data['packages'] = $this->postWithLimit('Packages', 2);
   		$data['new_post'] = $this->newPost(2);
   		$data['blogs'] = $this->postWithLimitAndNotIn(['Laravel', 'Packages'], [$data['new_post']->first()->id, $data['new_post']->last()->id], 3);
   		if(sizeof($data['laravels']) >= 6)
   			$data['laravels'] = $data['laravels']->limit(6)->get();
   		if(sizeof($data['packages']) >= 4)
   			$data['packages'] = $data['packages']->limit(4)->get();
   		if(sizeof($data['blogs']) < 3)
   			$data['blogs'] = '';
   		return $data;
   	}

   	protected function newPost($limit)
   	{
   		return Post::where(
   			[
   				'status' => $this->is_publish,
   			]
   		)->orderby('created_at', 'DESC')
   		->limit($limit)
   		->get();
   	}

   	protected function postWithLimit($category, $limit)
   	{
   		return Post::whereHas('category', function($categorys) use ($category){
   			$categorys->whereName($category);
   		})->where(
   			[
   				'status' => $this->is_publish,
   			]
   		)->orderby('created_at', 'DESC')
   		->limit($limit)
   		->get();
   	}

   	protected function postWithLimitAndNotIn($array_category, $array_id, $limit)
   	{
   		return Post::whereHas('category', function($category) use ($array_category){
   			$category->whereNotIn('name', $array_category);
   			$category->where('name', 'Blog');
   		})->where(
   			[
   				'status' => $this->is_publish,
   			]
   		)->orderby('created_at', 'DESC')
   		->whereNotIn('id', $array_id)
   		->limit($limit)
   		->get();
   	}

	protected function allCategory($slug)
	{
		$category = Category::whereSlug($slug)->first();
		if($category){
			$data['category'] = Post::where(
				[
					'category_id' => $category->id,
					'status' => $this->is_publish,
				]
			)
			->orderby('created_at', 'DESC')
			->paginate(8);
			$data['slug'] = $slug;
			return $data;
		}else{
			return abort(404);
		}
	}

	protected function post($slug)
	{
		$post = Post::where(
			[
				'slug' => $slug,
				'status' => $this->is_publish,
			]
		)->first();
		if($post){
			$data['post'] = $post;
			$data['recent'] = $this->randomPost($post->id, 3);
			$data['prev_next'] = $this->prevNext($post->id, $post->category_id);
			return $data;
		}else{
			return abort(404);
		}
	}

	protected function randomPost($id, $count)
	{
		$random = Post::where('id', '!=', $id)->where(
			[
				'status' => $this->is_publish,
			]
		)->get();
		if($random->count() < $count)
			$count = $random->count();
		return collect($random)->random($count);
	}

	protected function prevNext($id, $category)
	{
		$data['uriPrev'] = '';
		$data['uriNext'] = '';
		$previous = Post::where('id', '<', $id)
                  ->where(
                  	[
                  		'status' => $this->is_publish,
                  		'category_id' => $category,
                  	]
                  )
                  ->orderBy('id', 'DESC')
                  ->limit(1)
                  ->first();
               if($previous)
               	$data['uriPrev'] = $previous;
        	$next = Post::where('id', '>', $id)
                  ->where(
                  	[
                  		'status' => $this->is_publish,
                  		'category_id' => $category,
                  	]
                  )
                  ->orderBy('id', 'ASC')
                  ->limit(1)
                  ->first();
               if($next)
               	$data['uriNext'] = $next;
               return $data;
	}

	protected function allPage()
	{
		return Page::where(
			[
				'status' => $this->is_active,
			]
		)->orderby('title', 'ASC')
		->get();
	}

	protected function page($slug)
	{
		$page = Page::where(
				[
					'status' => $this->is_active,
					'slug' => $slug,
				]
			)->first();
		if($page){
			$data['slug'] = $slug;
			$data['page'] = $page;
			return $data;
		}else{
			return abort(404);
		}
	}

	protected function blog($slug)
	{
		$blog = Post::whereHas('category', function($blog) use ($slug){
			$blog->where(
				[
					'slug' => $slug,
				]
			);
		})
		->where(
			[
				'status' => $this->is_publish,
			]
		)->orderby('created_at', 'DESC')
		->get();
		if($blog){
			$data['slug'] = $slug;
			$data['category'] = $blog;
			return $data;
		}else{
			return abort(404);
		}
	}

	protected function search($query)
	{
		$result = '';
		$post = Post::with('category')
			->where('title', 'LIKE', "%{$query}%")
			->where(
				[
					'status' => $this->is_publish,
				]
			)->skip(0)
			->take(10)
			->get();
		if($post)
			$result = $post;
		return $result;
	}

	protected function menu()
	{
		return Category::limit(4)
			->orderby('name', 'ASC')
			->get();
	}
}