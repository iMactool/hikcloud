<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 海康云牟
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud;

	use Imactool\Hikcloud\Ad\AdProvider;
    use Imactool\Hikcloud\Ai\AiProvider;
    use Imactool\Hikcloud\Auth\AuthProvider;
    use Imactool\Hikcloud\Building\BuildingProvider;
    use Imactool\Hikcloud\Card\CardProvider;
    use Imactool\Hikcloud\Communit\CommunitProvider;
    use Imactool\Hikcloud\Confirm\ConfirmProvider;
    use Imactool\Hikcloud\Core\ContainerBase;
    use Imactool\Hikcloud\Device\DeviceProvider;
    use Imactool\Hikcloud\FaceDB\FaceDBProvider;
    use Imactool\Hikcloud\Http\Client;
    use Imactool\Hikcloud\Msg\MsgProvider;
    use Imactool\Hikcloud\Person\PersonProvider;
    use Imactool\Hikcloud\Property\PropertyProvider;

    class HikCloud extends ContainerBase
	{

        private static $config;

        /**
         * 配置服务提供者
         * @var string []
         */
        protected $provider = [
            AuthProvider::class,
            CommunitProvider::class,
            BuildingProvider::class,
            PersonProvider::class,
            PropertyProvider::class,
            CardProvider::class,
            DeviceProvider::class,
            ConfirmProvider::class,
            AdProvider::class,
            FaceDBProvider::class,
            MsgProvider::class,
            AiProvider::class,

        ];

        public function __construct (array $config)
        {
            self::$config = $config;
            Client::setAppConfig('config',$config);
            parent::__construct();
        }

    }