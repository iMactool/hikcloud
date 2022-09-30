<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Event;

	use Imactool\Hikcloud\Core\BaseService;

    class Event extends BaseService
	{
        /**
         *按事件类型订阅事件
         * 接口说明
         * 该接口用于满足应用方按事件类型码订阅事件，同一个用户重复订阅相同的事件，接口内部逻辑自动去重，确保不重复投递事件。
         * 事件订阅接口， 支持订阅平台的所有业务的各种事件类型，具体参考附录D
         * 本接口要求，三方订阅的时候，要求三方指定的http/https接收事件的服务地址。后续平台产生对应的事件，会推送到此http/https服务地址。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function eventSubscriptionByEventTypes(array $params)
        {
            return $this->iscPostJson('/api/eventService/v1/eventSubscriptionByEventTypes',$params);
        }

        /**
         * 查询事件订阅信息
         * @return mixed
         * @author cc
         */
        public function eventSubscriptionView()
        {
            return $this->iscPostJson('/api/eventService/v1/eventSubscriptionView');
        }
	}