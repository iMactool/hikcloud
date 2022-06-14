<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Interfaces;

use Imactool\Hikcloud\Core\Container;

interface Provider
{
    /**
     * @param Container $container
     *
     * @return mixed
     * @author cc
     */
    public function serviceProvider(Container $container);
}
