<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Msg;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    class MsgProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Msg'] = function ($container){
                return new Msg($container);
            };
        }
    }