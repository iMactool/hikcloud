<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Ai;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class AiProvider
     *
     * @method getModels(array $params)
     * @method trainVersions(array $params)
     * @method analysis(array $params)
     * @method trainVersionInfo($versionid)
     * @method feedbackByTraceId($traceId)
     *
     * @package Imactool\Hikcloud\Ai
     * @version 1.0.0
     */
    class AiProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Ai'] = function ($container){
                return new Ai($container);
            };
        }
    }