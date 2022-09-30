<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Ptz;

	use Imactool\Hikcloud\Core\Container;


    class PtzProvider
	{
        public function serviceProvider (Container $container)
        {
            $container['Ptz'] = function ($container){
                return new Ptz($container);
            };
        }
	}