<?php

namespace Ken\Blog\Traits;

trait LiteSeed
{
    public function litepieSeed($class)
    {
        if (!class_exists($class)) {
            require_once $this->litepieSeed.$class.'.php';
        }

        with(new $class())->run();
    }
}
