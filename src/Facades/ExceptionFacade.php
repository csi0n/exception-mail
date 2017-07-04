<?php
namespace csi0n\Exception\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/14/16
 * Time: 17:10
 */
class ExceptionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ExceptionRepository';
    }
}
