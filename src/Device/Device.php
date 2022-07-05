<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Device;

	use Imactool\Hikcloud\Core\BaseService;

    class Device extends BaseService
	{
        public function addDevice(array $params)
        {
            return $this->postJosn('api/v1/estate/devices',$params);
        }

        public function updateDevice(array $params)
        {
            return $this->postJosn('api/v1/estate/devices/actions/updateDevice',$params);
        }

        public function deleteDevice(string $deviceId)
        {
            return $this->postJosn('api/v1/estate/devices/actions/deleteDevice',['deviceId'=>$deviceId]);
        }

        public function getDeviceInfo(string $deviceId)
        {
            return $this->getJson('api/v1/estate/devices',['deviceId'=>$deviceId]);
        }

        public function getDeviceByCommunityId(array $params)
        {
            return $this->postJosn('api/v1/estate/devices/actions/listByCommunityId',$params);
        }

        public function getDeviceChannelByCommunityId(array $params)
        {
            return $this->getJson('api/v1/estate/devices/channels/actions/listByCommunityId',$params);
        }

        /**
         * 设备抓图
         * 该接口仅适用于IPC或者关联IPC的DVR设备，该接口并非预览时的截图功能。海康型号设备可能不支持萤石协议抓拍功能，使用该接口可能返回不支持或者超时。
         * 注意：设备抓图能力有限，请勿频繁调用，频繁调用将会被拉入限制黑名单,建议调用的间隔为4s左右。
         * @param string $channelId
         *
         * @return mixed
         * @author cc
         */
        public function getCapture(string $channelId)
        {
            $endpoint = "v1/channels/{$channelId}/capture";
            return $this->postJosn($endpoint,['channelId'=>$channelId]);
        }

        /**
         * 设备抓图（支持6000C）
         * 提供设备抓拍当前画面功能。
         * 该接口仅适用于IPC或者关联IPC的DVR设备及6000C下的设备视频通道，该接口并非预览时的截图功能。海康型号设备可能不支持萤石协议抓拍功能，使用该接口可能返回不支持或者超时。
         * 注意：设备抓图能力有限，请勿频繁调用，频繁调用将会被拉入限制黑名单,建议调用的间隔为4s左右。
         * @param string $channelId
         *
         * @return mixed
         * @author cc
         */
        public function getCaptureNew(string $channelId)
        {
            return $this->postJosn('api/v1/estate/devices/channels/actions/capture',['channelId'=>$channelId]);
        }


       /**
        * ---------------------------------------------------------------------------------------------------------
        * 门禁管理
        * ---------------------------------------------------------------------------------------------------------
        */

       public function getRemotePersonList(array $params)
       {
           return $this->getJson('api/v1/estate/entranceGuard/remoteControl/actions/deviceList',$params);
       }

       public function faceIssued(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/faceIssued',$params);
       }

       public function deleteFaceIssued(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/deleteFaceIssued',$params);
       }

       public function gateControl(array $params)
       {
            return $this->postJosn('api/v1/estate/entranceGuard/remoteControl/actions/gateControl',$params);
       }

       public function dynamicCode(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/dynamicCode',$params);
       }

       public function getQRcode(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/getQRcode',$params);
       }

       public function authorityIssued(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/authorityIssued',$params);
       }

       public function authorityDelete(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/authorityDelete',$params);
       }

       public function elevatorControl(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/remoteControl/actions/elevatorControl',$params);
       }

       public function batchAuthorityIssued(array $params)
       {
           return $this->postJosn('api/v1/estate/entranceGuard/permissions/actions/batchAuthorityIssued',$params);
       }

        /**
         * ---------------------------------------------------------------------------------------------------------
         * 视频服务能力
         * ---------------------------------------------------------------------------------------------------------
         */

        public function ptzControl(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }
            if (!\array_key_exists('direction',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 direction");
            }
            if (!\array_key_exists('speed',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 speed	");
            }

            $endpoint = "v1/channels/{$params['channelId']}/ptz/start";
            return $this->post($endpoint,$params);

        }

        public function ptzStop(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }

            $endpoint = "v1/channels/{$params['channelId']}/ptz/stop";
            return $this->post($endpoint,$params);
        }

        public function addPreset($channelId)
        {
            $endpoint = "v1/channels/{$channelId}/presets/add";
            return $this->post($endpoint,['channelId'=>$channelId]);
        }

        public function movePreset(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }
            $endpoint = "v1/channels/{$params['channelId']}/presets/move";
            return $this->post($endpoint,$params);
        }

        public function clearPreset(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }
            $endpoint = "v1/channels/{$params['channelId']}/presets/clear";
            return $this->post($endpoint,$params);
        }

        /**
         * 关闭设备视频加密
         * @param array $params
         *
         * @return mixed
         * @throws \Imactool\Hikcloud\Exceptions\InvalidArgumentException
         * @author cc
         */
        public function offDeviceVoideEncrypt(array $params)
        {
            if (!\array_key_exists('deviceId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 deviceId");
            }
            $endpoint = "v1/devices/{$params['deviceId']}/encrypt/off";
            return $this->post($endpoint,$params);
        }

        /**
         * 开通标准流预览功能
         * @param $channelIds
         *
         * @return mixed
         * @author cc
         */
        public function liveVideoOpen($channelIds)
        {
            return $this->post('v1/devices/liveVideoOpen',['channelIds'=>$channelIds]);
        }

        /**
         * 获取标准流预览地址
         * 该接口获取的标准流预览地址适用于公众号、公共标准流预览等场景，特点是视频信息公开。
         * @param $channelId
         *
         * @return mixed
         * @author cc
         */
        public function liveAddress($channelId)
        {
            $endpoint = "/v1/devices/liveAddress?channelId=".trim($channelId);
            return $this->get($endpoint ,['channelId'=>$channelId]);
        }

        public function liveAddressLimit(array $params)
        {
            return $this->post('v1/devices/liveAddressLimit',$params);
        }

        /**
         * 获取视频取流时需要的认证信息
         * @return mixed
         * @author cc
         */
        public function getEzvizInfo()
        {
            return $this->get('v1/ezviz/account/info');
        }
    }