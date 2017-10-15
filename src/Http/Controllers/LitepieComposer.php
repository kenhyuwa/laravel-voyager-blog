<?php

namespace Ken\Blog\Http\Controllers;

use Ken\Blog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use TCG\Voyager\Models\Page;

class LitepieComposer extends Controller
{
    public function compose(View $view)
    {
    		$data['pages'] = $this->allPage();
    		$data['menus'] = $this->menu();
    		$view->with('litepie', $data);
    }
}
