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

	use Imactool\Hikcloud\Core\BaseService;

    class Ai extends BaseService
	{
        public function getModels(array $params)
        {
            return $this->getJson('api/v1/ai/intelligence/models',$params);
        }

        public function trainVersions(array $params)
        {
            return $this->getJson('api/v1/ai/intelligence/models/trainVersions',$params);
        }

        public function analysis(array $params)
        {
            return $this->postJosn('api/v1/ai/intelligence/models/trainVersions/actions/analysi',$params);
        }

        public function trainVersionInfo($versionid)
        {
            $endpoint = 'api/v1/ai/intelligence/models/trainVersions/'.$versionid;
            return $this->getJson($endpoint,['versionId'=>$versionid]);
        }

        public function feedbackByTraceId($traceId)
        {
            return $this->postJosn('api/v1/ai/intelligence/actions/feedbackByTraceId',['traceId'=>$traceId]);
        }
	}