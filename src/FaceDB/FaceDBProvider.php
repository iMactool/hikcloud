<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\FaceDB;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    class FaceDBProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['FaceDB'] = function ($container){
                return new FaceDB($container);
            };
        }
    }