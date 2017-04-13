<?php
namespace SiCoUK\LaravelTitle\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelTitleFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'LaravelTitle';
    }
}