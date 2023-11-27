<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Core;

use Imactool\Hikcloud\Http\ClientHttp;

class BaseService
{
    use ClientHttp;

    protected   $app;
    public      $nowApp;
    public      $appRunConfig = [];
    public      $verify = false;
    /**
     * 根据应用获取请求网址
     * @var string
     */
    public $baseUri = 'https://api2.hik-cloud.com';

    public function __construct(Container $app)
    {
        $this->app = $app;
        $class = get_class($app);
        $this->nowApp = basename(str_replace('\\','/',$class));

        if ($this->nowApp == "HikCloud"){
            $this->appRunConfig = self::getHikConfig();
            $this->baseUri = 'https://api2.hik-cloud.com';
        }else if($this->nowApp == "Isc"){
            $this->appRunConfig = self::getIsConfig();
            $iscProtocol = isset($this->appRunConfig['protocol']) ? $this->appRunConfig['protocol'] : 'https';
            $this->baseUri = $iscProtocol.'://'.$this->appRunConfig['artemisIp'].':'.$this->appRunConfig['artemisPort'];
           if (isset($this->appRunConfig['verify']) && is_bool($this->appRunConfig['verify'])){
               $this->verify = $this->appRunConfig['verify'];
           }
        }else if($this->nowApp == "Ys7"){
            $this->appRunConfig = self::getYsConfig();
            $this->baseUri = 'https://open.ys7.com';
        }
    }
}
