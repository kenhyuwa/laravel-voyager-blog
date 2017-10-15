<?php 
namespace Ken\Blog;

class Litepie
{
	protected $view = [];

	public function routes()
    	{
        	require_once __DIR__.'/../routes/litepie.php';
    	}

    	public function view($name, array $parameters = [])
    	{
    		foreach (array_get($this->view, $name, []) as $event) {
            	$event($name, $parameters);
        	}
        	return view($name, $parameters);
    	}

    public function onLoadingView($name, \Closure $closure)
    {
        if (!isset($this->view[$name])) {
            $this->view[$name] = [];
        }

        $this->view[$name][] = $closure;
    }
}
