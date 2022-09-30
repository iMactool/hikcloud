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

	use Imactool\Hikcloud\Core\BaseService;

    class Setting extends BaseService
	{
        /**
         * 萤石云 设备布撤防
         * 对设备布撤防状态进行修改（活动检测开关），实现布防和撤防功能。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceDefence(array $params)
        {
            return $this->post('/api/lapp/device/defence/set',$params);
        }

        /**
         * 萤石云 关闭设备视频加密
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function offYsDevicevideoEncrypt(array $params)
        {
            return $this->post('/api/lapp/device/encrypt/off',$params);
        }

        /**
         * 萤石云 开启设备视频加密
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function onYsDevicevideoEncrypt(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/encrypt/on',$params);
        }

        /**
         * 萤石云 获取wifi配置提示音开关状态..
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsSoundStatusOfWifi(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/sound/switch/status',$params);
        }

        /**
         * 萤石云 设置wifi配置提示音开关
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function setYsSoundStatusOfWifi(array $params)
        {
            return $this->post('/api/lapp/device/sound/switch/set',$params);
        }

        /**
         * 获取镜头遮蔽开关
         * 萤石云 该接口用于获取设备镜头遮蔽开关状态（需要设备支持镜头遮蔽功能）
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceSceneStatus(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/scene/switch/status',$params);
        }

        /**
         * 设置镜头遮蔽开关
         * 萤石云 该接口用于设置设备镜头遮蔽开关状态（需要设备支持镜头遮蔽功能）
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceSceneStatus(array $params)
        {
            return $this->post('/api/lapp/device/scene/switch/set',$params);
        }

        /**
         * 萤石云 获取声源定位开关状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceSoundSrouceLocatedStatus(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/ssl/switch/status',$params);
        }

        /**
         * 萤石云 设置声源定位开关
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceSoundSrouceLocatedStatus(array $params)
        {
            return $this->post('/api/lapp/device/ssl/switch/set',$params);
        }

        /**
         * 萤石云 获取设备布撤防时间计划
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceDefencePlan(array $params)
        {
            return $this->post('/api/lapp/device/defence/plan/get',$params);
        }

        /**
         * 萤石云 设置布撤防时间计划
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceDefencePlan(array $params)
        {
            return $this->post('/api/lapp/device/defence/plan/set',$params);
        }

        /**
         * 萤石云 获取摄像机指示灯开关状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsSameraLightStatus(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/device/light/switch/status',$params);
        }

        /**
         * 萤石云 设置摄像机指示灯开关
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsSameraLightStatus(array $params)
        {
            return $this->post('/api/lapp/device/light/switch/set',$params);
        }

        /**
         * 萤石云 获取全天录像开关状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsFullDayRecordStatus(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/device/fullday/record/switch/status',$params);
        }

        /**
         * 萤石云 设置全天录像开关
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsFullDayRecordStatus(array $params)
        {
            return $this->post('/api/lapp/device/fullday/record/switch/set',$params);
        }

        /**
         * 萤石云 获取移动侦测灵敏度配置
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceAlgorithmConfig(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/device/algorithm/config/get',$params);
        }

        /**
         * 萤石云 设置移动侦测灵敏度
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceAlgorithmConfig(array $params)
        {
            return $this->post('/api/lapp/device/algorithm/config/set',$params);
        }

        /**
         * 萤石云 设置告警声音模式
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceAlarmSound(array $params)
        {
            return $this->post('/api/lapp/device/alarm/sound/set',$params);
        }

        /**
         * 萤石云 开启或关闭设备下线通知
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceNotify(array $params)
        {
            return $this->post('/api/lapp/device/notify/switch',$params);
        }

        /**
         * 萤石云 获取设备麦克风开关状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceCameraSound(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/camera/video/sound/status',$params);
        }

        /**
         * 萤石云 设置设备麦克风开关状态.
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceCameraSound(array $params)
        {
            return $this->post('/api/lapp/camera/video/sound/set',$params);
        }

        /**
         * 萤石云 设置设备移动跟踪开关
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDevceMove(array $params)
        {
            return $this->post('/api/lapp/device/mobile/status/set',$params);
        }

        /**
         * 萤石云 获取设备移动跟踪开关状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDevceMove(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/device/mobile/status/get',$params);
        }

        /**
         * 萤石云 设置设备的osd名称
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceOsdName(array $params)
        {
            return $this->post('/api/lapp/device/update/osd/name',$params);
        }

        /**
         * 萤石云 获取设备智能检测开关状态
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceIntelligenceDetection(array $params)
        {
            return $this->post('/api/lapp/device/intelligence/detection/switch/status',$params);
        }

        /**
         * 萤石云 设置设备智能检测开关状态
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setYsDeviceIntelligenceDetection(array $params)
        {
            return $this->post('/api/lapp/device/intelligence/detection/switch/set',$params);
        }

	}