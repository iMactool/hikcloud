<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Core;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

trait CacheAdapter
{
    private static $instance;
    protected $access_token;
    protected $ys_access_token;
    protected $cachePrefix = 'imactool.hik.core.access_token';
    protected $cacheYsPrefix = 'imactool.hik.ys.core.access_token';
    protected $cacheIscPrefix= 'imactool.hik.isc.core.access_token';


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new FilesystemAdapter();
        }

        return self::$instance;
    }

    protected function getCacheKey($credentials)
    {
        return $this->cachePrefix.md5(\json_encode($credentials));
    }

    protected function getYsCacheKey($credentials)
    {
        return $this->cacheYsPrefix . md5(\json_encode($credentials));
    }

    protected function getIsCacheKey($credentials)
    {
        return $this->cacheIscPrefix . md5(\json_encode($credentials));
    }
}
