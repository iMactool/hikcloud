<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

    namespace Imactool\Hikcloud\Property;

    use Imactool\Hikcloud\Core\BaseService;

    class Property extends BaseService
    {
        /**
         * 新增物业人员信息。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addProperty(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/property',$params);
        }

        /**
         * 编辑物业人员信息。（全量修改）
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateProperty(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/property/actions/updateProperty',$params);
        }

        /**
         * 删除物业人员
         * @param string $personId
         *
         * @return mixed
         * @author cc
         */
        public function deleteProperty(string $personId)
        {
            $endpoint = '/api/v1/estate/system/property/'.$personId;
            return $this->deleteJson($endpoint,['personId'=>$personId]);
        }

    }