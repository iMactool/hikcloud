<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Ad;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class AdProvider
     *
     * @method publishProgram(array $params)
     * @method deleteProgram($deviceIds)
     *
     * @package Imactool\Hikcloud\Ad
     * @version 1.0.0
     */
    class AdProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Ad'] = function ($container){
                return new Ad($container);
            };
        }
    }