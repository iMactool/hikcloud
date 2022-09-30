<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Ptz;

	use Imactool\Hikcloud\Core\BaseService;

    class Ptz extends BaseService
	{
        /**
         * 开始云台控制
         * 对设备进行开始云台控制，开始云台控制之后必须先调用停止云台控制接口才能进行其他操作，包括其他方向的云台转动
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function ysPtzStart(array $params)
        {
            return $this->post('/api/lapp/device/ptz/start',$params);
        }

        /**
         * 停止云台控制
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function ysPtzStop(array $params)
        {
            return $this->post('/api/lapp/device/ptz/stop',$params);
        }

        /**
         * 镜像翻转
         * 对设备进行镜像翻转操作(需要设备支持)。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function ysPtzMirror(array $params)
        {
            return $this->post('/api/lapp/device/ptz/mirror',$params);
        }

        /**
         * 添加预置点
         * 支持云台控制操作的设备添加预置点
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function ysDevicePresetAdd(array $params)
        {
            return $this->post('/api/lapp/device/preset/add',$params);
        }

        /**
         * 调用预置点
         * 对预置点进行调用控制
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function ysDevicePresetMove(array $params)
        {
            return $this->post('/api/lapp/device/preset/move',$params);
        }

        /**
         * 清除预置点
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function ysDevicePresetClear(array $params)
        {
            return $this->post('/api/lapp/device/preset/clear',$params);
        }
	}