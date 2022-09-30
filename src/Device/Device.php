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
            return $this->postJosn('/api/v1/estate/devices',$params);
        }

        public function updateDevice(array $params)
        {
            return $this->postJosn('/api/v1/estate/devices/actions/updateDevice',$params);
        }

        public function deleteDevice(string $deviceId)
        {
            return $this->postJosn('/api/v1/estate/devices/actions/deleteDevice',['deviceId'=>$deviceId]);
        }

        public function getDeviceInfo(string $deviceId)
        {
            return $this->getJson('/api/v1/estate/devices',['deviceId'=>$deviceId]);
        }

        public function getDeviceByCommunityId(array $params)
        {
            return $this->postJosn('/api/v1/estate/devices/actions/listByCommunityId',$params);
        }

        public function getDeviceChannelByCommunityId(array $params)
        {
            return $this->getJson('/api/v1/estate/devices/channels/actions/listByCommunityId',$params);
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
            $endpoint = "/v1/channels/{$channelId}/capture";
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
            return $this->postJosn('/api/v1/estate/devices/channels/actions/capture',['channelId'=>$channelId]);
        }

        /**
         * 设置设备使能
         * 进行设备参数配置，支持使能和仅测温模式设置(注：不支持6000C)
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateDeviceAcsConfig(array $params)
        {
            return $this->postJosn('/api/v1/estate/devices/actions/updateDeviceAcsConfig',$params);
        }

       /**
        * ---------------------------------------------------------------------------------------------------------
        * 门禁管理
        * ---------------------------------------------------------------------------------------------------------
        */

       public function getRemotePersonList(array $params)
       {
           return $this->getJson('/api/v1/estate/entranceGuard/remoteControl/actions/deviceList',$params);
       }

       public function faceIssued(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/faceIssued',$params);
       }

       public function deleteFaceIssued(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/deleteFaceIssued',$params);
       }

       public function gateControl(array $params)
       {
            return $this->postJosn('/api/v1/estate/entranceGuard/remoteControl/actions/gateControl',$params);
       }

       public function dynamicCode(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/dynamicCode',$params);
       }

       public function getQRcode(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/getQRcode',$params);
       }

       public function authorityIssued(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/authorityIssued',$params);
       }

       public function authorityDelete(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/authorityDelete',$params);
       }

       public function elevatorControl(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/remoteControl/actions/elevatorControl',$params);
       }

       public function batchAuthorityIssued(array $params)
       {
           return $this->postJosn('/api/v1/estate/entranceGuard/permissions/actions/batchAuthorityIssued',$params);
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

            $endpoint = "/v1/channels/{$params['channelId']}/ptz/start";
            return $this->post($endpoint,$params);

        }

        public function ptzStop(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }

            $endpoint = "/v1/channels/{$params['channelId']}/ptz/stop";
            return $this->post($endpoint,$params);
        }

        public function addPreset($channelId)
        {
            $endpoint = "/v1/channels/{$channelId}/presets/add";
            return $this->post($endpoint,['channelId'=>$channelId]);
        }

        public function movePreset(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }
            $endpoint = "/v1/channels/{$params['channelId']}/presets/move";
            return $this->post($endpoint,$params);
        }

        public function clearPreset(array $params)
        {
            if (!\array_key_exists('channelId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 channelId");
            }
            $endpoint = "/v1/channels/{$params['channelId']}/presets/clear";
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
            $endpoint = "/v1/devices/{$params['deviceId']}/encrypt/off";
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
            return $this->post('/v1/devices/liveVideoOpen',['channelIds'=>$channelIds]);
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
            return $this->post('/v1/devices/liveAddressLimit',$params);
        }

        /**
         * 获取视频取流时需要的认证信息
         * @return mixed
         * @author cc
         */
        public function getEzvizInfo()
        {
            return $this->get('/v1/ezviz/account/info');
        }

        /**
         * （新）获取指定有效期标准流预览地址/回放地址
         * 根据通道ID获取设备通道指定有效期的标准流预览、回放地址信息,支持6000C子设备通道。
         * 该该接口获取的标准流预览地址适用于报警值守、社区监控等场景，特点是视频信息私有，需要有安全性保证。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getLiveAddressNew(array $params)
        {
            return $this->postJosn('/api/v1/estate/devices/channels/actions/liveAddress',$params);
        }


        /**
         * 以下 萤石云设备管理
         * ---------------------------------------------------------------------
         * ---------------------------------------------------------------------
         * @see https://open.ys7.com/doc/zh/book/index/device_option.html
         * 添加设备
         * ---------------------------------------------------------------------
         */
        public function addYsDevice(array $params)
        {
            return $this->post('/api/lapp/device/add',$params);
        }

        /**
         * 删除账号下设备（为保证该接口正常使用，请勿在萤石云APP开启终端绑定。
         * 如果该接口报错20031请手机登录萤石云视频客户端“我的”--“通用设置”--“账号安全”--“终端绑定”，关闭即可）
         *
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function deleteYsDevice(string $deviceSerial)
        {
            $params['deviceSerial'] = $deviceSerial;
            return $this->post('/api/lapp/device/delete',$params);
        }

        /**
         * 修改萤石设备
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDevice(array $params)
        {
            return $this->post('/api/lapp/device/name/update',$params);
        }

        /**
         * 萤石 设备抓拍图片.
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsCapture(array $params)
        {
            return $this->post('/api/lapp/device/capture',$params);
        }

        /**
         * 萤石云 NVR设备关联IPC
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addYsDeviceNvrAndIpc(array $params)
        {
            return $this->post('/api/lapp/device/ipc/add',$params);
        }

        /**
         * 萤石云 NVR设备删除IPC
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function deleteYsDeviceNvrAndIpc(array $params)
        {
            return $this->post('/api/lapp/device/ipc/delete',$params);
        }

        /**
         * 萤石云 该接口用于修改设备视频加密密码（设备重置后修改的密码失效）
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDevicePassword(array $params)
        {
            return $this->post('/api/lapp/device/password/update',$params);
        }

        /**
         * 萤石云 该接口用于生成设备扫描配网二维码二进制数据，需要自行转换成图片（300x300像素大小）。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceNetworkQrCode(array $params)
        {
            return $this->post('/api/lapp/device/wifi/qrcode',$params);
        }

        /**
         * 萤石云 修改通道名称
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceChannelName(array $params)
        {
            return $this->post('/api/lapp/camera/name/update',$params);
        }

        /**
         * 萤石云 获取设备列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceList(array $params =[])
        {
            return $this->post('/api/lapp/device/list',$params);
        }

        /**
         * 萤石云 获取单个设备信息
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceInfo(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/info',$params);
        }

        /**
         * 萤石云 获取摄像头列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsCameraList(array $params =[])
        {
            return $this->post('/api/lapp/camera/list',$params);
        }

        /**
         * 萤石云 获取设备状态信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceStatus(array $params)
        {
            return $this->post('/api/lapp/device/status/get',$params);
        }

        /**
         * 萤石云 获取指定设备的通道信息
         * @param $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceChannelInfo($deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/camera/list',$params);
        }

        /**
         * 萤石云 根据设备型号以及设备版本号查询设备是否支持萤石协议
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function checkYsDeviceSupport(array $params)
        {
            return $this->post('/api/lapp/device/support/ezviz',$params);
        }

        /**
         * 萤石云 根据设备序列号查询设备能力集
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceCapacity(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/capacity',$params);
        }

        /**
         * 萤石云 根据时间获取存储文件信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceFileInfo(array $params)
        {
            return $this->post('/api/lapp/video/by/time',$params);
        }

        /**
         * 萤石云 本节包含设备开关状态操作的相关接口等。
         */

        /**
         * 获取设备版本信息
         * 查询用户下指定设备的版本信息
         * @author cc
         */
        public function getYsDeviceVersionInfo(string $deviceSerial)
        {
            return $this->post('/api/lapp/device/version/info',['deviceSerial'=>strtoupper($deviceSerial)]);
        }

        /**
         * 设备升级固件(升级设备固件至最新版本)
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceUpgrade(string $deviceSerial)
        {
            return $this->post('/api/lapp/device/upgrade',['deviceSerial'=>strtoupper($deviceSerial)]);
        }

        /**
         * 获取设备升级状态(查询用户下指定设备的升级状态，包括升级进度。)
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceUpgradeStatus(string $deviceSerial)
        {
            return $this->post('/api/lapp/device/upgrade/status',['deviceSerial'=>strtoupper($deviceSerial)]);
        }
    }