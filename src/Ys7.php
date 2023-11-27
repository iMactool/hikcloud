<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 萤石云 https://open.ys7.com/doc/zh/book/index/user.html
     *
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud;

	use Imactool\Hikcloud\Auth\AuthProvider;
    use Imactool\Hikcloud\Core\ContainerBase;
    use Imactool\Hikcloud\Device\DeviceProvider;
    use Imactool\Hikcloud\Http\ClientHttp;
    use Imactool\Hikcloud\Live\LiveProvider;
    use Imactool\Hikcloud\Msg\MsgProvider;
    use Imactool\Hikcloud\Ptz\PtzProvider;
    use Imactool\Hikcloud\Setting\SettingProvider;
    use Imactool\Hikcloud\Voice\VoiceProvider;

    /**
     * Class Ys7
     *
     * @property AuthProvider     $Auth
     * @property DeviceProvider   $Device
     * @property LiveProvider     $Live
     * @property SettingProvider  $Setting
     * @property VoiceProvider    $Voice
     * @property MsgProvider      $Msg
     * @property PtzProvider      $Ptz
     *
     * @package Imactool\Hikcloud
     * @version 1.0.0
     */
    class Ys7 extends ContainerBase
	{
        use ClientHttp;
        private static $config;

        /**
         * 服务提供者
         * @var array
         */
        public $provider = [
            AuthProvider::class,
            DeviceProvider::class,
            LiveProvider::class,
            SettingProvider::class,
            VoiceProvider::class,
            MsgProvider::class,
            PtzProvider::class
        ];

        public function __construct (array $config)
        {
            self::$config = $config;
            ClientHttp::setAppConfig('ysconfig',$config);
            parent::__construct();
        }

	}