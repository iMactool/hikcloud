<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Voice;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    class VoiceProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Voice'] = function ($container){
                return new Voice($container);
            };
        }
	}