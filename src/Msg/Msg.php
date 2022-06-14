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

	use Imactool\Hikcloud\Core\BaseService;

    class Msg extends BaseService
	{
        public function createCustomer()
        {
            return $this->postJosn('api/v1/mq/consumer/group1');
        }

        public function getCustomer(array $params)
        {
            return $this->post('/api/v1/mq/consumer/messages',$params);
        }

        public function offsetCustomer($consumerId)
        {
            return $this->post('api/v1/mq/consumer/offsets',['consumerId'=>$consumerId]);
        }
	}