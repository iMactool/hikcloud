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

	use Imactool\Hikcloud\Core\BaseService;

    class Confirm extends BaseService
	{
        public function autoconfirm(array $params)
        {
            return $this->getJson('v1/carrier/wing/endpoint/confirm/right/autoconfirm',$params);
        }

        public function offlineconfirm(string $deviceSerial)
        {
            return $this->getJson('v1/carrier/wing/endpoint/confirm/right/offlineconfirm',['deviceSerial'=>$deviceSerial]);
        }

        public function onlineconfirm(string $deviceSerial)
        {
            return $this->getJson('v1/carrier/wing/endpoint/confirm/right/onlineconfirm',['deviceSerial'=>$deviceSerial]);
        }

	}