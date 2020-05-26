<?php

namespace Booni3\Mws;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Booni3\Mws\Skeleton\SkeletonClass
 */
class MwsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mws';
    }
}
