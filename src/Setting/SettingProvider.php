<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Setting;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;


    class SettingProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Setting'] = function ($container){
                return new Setting($container);
            };
        }
	}