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

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class DeviceProvider
     *
     * @method addDevice(array $params)
     * @method updateDevice(array $params)
     * @method deleteDevice(string $deviceId)
     * @method getDeviceInfo(string $deviceId)
     * @method getDeviceByCommunityId(array $params)
     * @method getDeviceChannelByCommunityId(array $params)
     * @method getCapture(string $channelId)
     * @method getCaptureNew(string $channelId)
     * @method updateDeviceAcsConfig(array $params)
     *
     * @method getRemotePersonList(array $params)
     * @method faceIssued(array $params)
     * @method deleteFaceIssued(array $params)
     * @method gateControl(array $params)
     * @method dynamicCode(array $params)
     * @method getQRcode(array $params)
     * @method authorityIssued(array $params)
     * @method authorityDelete(array $params)
     * @method elevatorControl(array $params)
     * @method batchAuthorityIssued(array $params)
     *
     * @method ptzControl(array $params)
     * @method ptzStop(array $params)
     * @method addPreset($channelId)
     * @method movePreset(array $params)
     * @method clearPreset(array $params)
     * @method offDeviceVoideEncrypt(array $params)
     * @method liveVideoOpen($channelIds)
     * @method liveAddress($channelId)
     * @method liveAddressLimit(array $params)
     * @method getEzvizInfo()
     * @method getLiveAddressNew(array $params)
     *
     * @method addYsDevice(array $params)
     * @method deleteYsDevice(string $deviceSerial)
     * @method updateYsDevice(array $params)
     * @method getYsCapture(array $params)
     * @method addYsDeviceNvrAndIpc(array $params)
     * @method deleteYsDeviceNvrAndIpc(array $params)
     * @method updateYsDevicePassword(array $params)
     * @method getYsDeviceNetworkQrCode(array $params)
     * @method updateYsDeviceChannelName(array $params)
     * @method getYsDeviceList(array $params =[])
     * @method getYsDeviceInfo(string $deviceSerial)
     * @method getYsCameraList(array $params =[])
     * @method getYsDeviceStatus(array $params)
     * @method getYsDeviceChannelInfo($deviceSerial)
     * @method checkYsDeviceSupport(array $params)
     * @method getYsDeviceCapacity(string $deviceSerial)
     * @method getYsDeviceFileInfo(array $params)
     * @method getYsDeviceVersionInfo(string $deviceSerial)
     * @method updateYsDeviceUpgrade(string $deviceSerial)
     * @method updateYsDeviceUpgradeStatus(string $deviceSerial)
     *
     * @package Imactool\Hikcloud\Device
     * @version 1.0.0
     */
    class DeviceProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Device'] =function ($container){
                return new Device($container);
            };
        }
    }