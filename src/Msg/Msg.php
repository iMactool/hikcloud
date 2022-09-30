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
            return $this->postJosn('/api/v1/mq/consumer/group1');
        }

        public function getCustomer(array $params)
        {
            return $this->post('/api/v1/mq/consumer/messages',$params);
        }

        public function offsetCustomer($consumerId)
        {
            return $this->post('/api/v1/mq/consumer/offsets',['consumerId'=>$consumerId]);
        }

        /**
         * --------------------------------------------------------
         * --------------------------------------------------------
         *  萤石云 本节包含设备告警消息查询相关接口等
         * --------------------------------------------------------
         * --------------------------------------------------------
         */

        /**
         * 获取所有告警信息列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsAlarmList(array $params=[])
        {
            return $this->post('/api/lapp/alarm/list',$params);
        }

        /**
         * 按照设备获取告警消息列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsAlarmDeviceList(array $params)
        {
            return $this->post('/api/lapp/alarm/device/list',$params);
        }
	}