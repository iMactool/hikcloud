<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 综合安防管理平台（iSecure Center）
     * @see https://open.hikvision.com/docs/docId?productId=5c67f1e2f05948198c909700&version=%2F9e6b1870e25348608d01b5669a7f3595&curNodeId=9a5f3b4b59124e34b1f4b50083d566ba
     *  暂时基于 V1.5.100 版本
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud;

    use Imactool\Hikcloud\Core\ContainerBase;
    use Imactool\Hikcloud\Event\EventProvider;
    use Imactool\Hikcloud\Http\Client;
    use Imactool\Hikcloud\Org\OrgProvider;
    use Imactool\Hikcloud\Person\PersonProvider;
    use Imactool\Hikcloud\Resource\ResourceProvider;

    class Isc extends ContainerBase
	{
        private static $config;

        protected $provider = [
            ResourceProvider::class,
            PersonProvider::class,
            OrgProvider::class,
            EventProvider::class,
        ];

        public function __construct (array $config)
        {
            self::$config = $config;
            Client::setAppConfig('isConfig',$config);
            parent::__construct();
        }

    }