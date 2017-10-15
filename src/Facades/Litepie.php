<?php
namespace Ken\Blog\Facades;
use Illuminate\Support\Facades\Facade;

class Litepie extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'litepie';
    }
}
