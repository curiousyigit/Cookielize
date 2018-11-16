<?php
namespace hopefeda\Cookielize;
use Illuminate\Support\Facades\Facade;
class CookielizeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Cookielize';
    }
}