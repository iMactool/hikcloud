<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Auth;

use Imactool\Hikcloud\Core\Container;
use Imactool\Hikcloud\Interfaces\Provider;

/**
 * Class AuthProvider
 * @method requestAccessToken(?string $scope = '')
 * @method thirdJummpLogin(array $params)
 * @package Imactool\Hikcloud\Auth
 * @version 1.0.0
 */
class AuthProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Auth'] = function ($container) {
            return new Auth($container);
        };
    }
}
