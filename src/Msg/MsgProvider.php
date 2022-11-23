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

    /**
     * Class MsgProvider
     *
     * @method createCustomer()
     * @method getCustomer(array $params)
     * @method offsetCustomer($consumerId)
     * @method getYsAlarmList(array $params=[])
     * @method getYsAlarmDeviceList(array $params)
     *
     * @package Imactool\Hikcloud\Msg
     * @version 1.0.0
     */
    class MsgProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Msg'] = function ($container){
                return new Msg($container);
            };
        }
    }