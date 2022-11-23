<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Confirm;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class ConfirmProvider
     *
     * @method autoconfirm(array $params)
     * @method offlineconfirm(string $deviceSerial)
     * @method onlineconfirm(string $deviceSerial)
     *
     * @package Imactool\Hikcloud\Confirm
     * @version 1.0.0
     */
    class ConfirmProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Confirm'] = function ($container){
                return new Confirm($container);
            };
        }
    }