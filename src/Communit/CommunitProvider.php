<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Communit;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    class CommunitProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Communit'] = function ($container){
                return new Communit($container);
            };
        }

    }