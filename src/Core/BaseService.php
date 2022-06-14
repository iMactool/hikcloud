<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Core;

use Imactool\Hikcloud\Http\Client;

class BaseService
{
    use Client;

    protected $app;

    public $appRunConfig = [];

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->appRunConfig = self::getAppConfig();
    }
}
