<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Resource;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    class ResourceProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Resource'] = function ($container){
                return new Resource($container);
            };
        }
    }