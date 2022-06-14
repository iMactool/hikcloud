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

	use Imactool\Hikcloud\Core\BaseService;

    class FaceDB extends BaseService
	{
        public function faceList(array $params)
        {
            return $this->getJson('api/v1/estate/device/faceDatabase/actions/list',$params);
        }

        public function ddFace(array $params)
        {
            return $this->postJosn('api/v1/estate/device/faceDatabase/actions/addFace',$params);
        }

        public function delFaces($faceids)
        {
            return $this->postJosn('api/v1/estate/device/faceDatabase/actions/delFaces',['faceIds'=>$faceids]);
        }

        public function syncFaceDatabase(string $faceDatabaseId)
        {
            return $this->getJson('api/v1/estate/device/faceDatabase/actions/syncFaceDatabase',['faceDatabaseId'=>$faceDatabaseId]);
        }

        /**
         * ---------------------------------------------------------------------------------------------------------
         * 访客管理
         * ---------------------------------------------------------------------------------------------------------
         */

        /**
         * 社区访客预约登记。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addVisitor(array $params)
        {
            return $this->postJosn('api/v1/estate/visitors',$params);
        }

        public function deleteVisitor(string $reservationId)
        {
            $endpoint = "api/v1/estate/visitors/{$reservationId}";
            return $this->deleteJson($endpoint,['reservationId'=>$reservationId]);
        }

	}