<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\FaceDB;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class FaceDBProvider
     *
     * @method faceList(array $params)
     * @method ddFace(array $params)
     * @method delFaces($faceids)
     * @method syncFaceDatabase(string $faceDatabaseId)
     * @method addVisitor(array $params)
     * @method deleteVisitor(string $reservationId)
     *
     * @package Imactool\Hikcloud\FaceDB
     * @version 1.0.0
     */
    class FaceDBProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['FaceDB'] = function ($container){
                return new FaceDB($container);
            };
        }
    }