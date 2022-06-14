<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Ad;

	use Imactool\Hikcloud\Core\BaseService;

    class Ad extends BaseService
	{
        public function publishProgram(array $params)
        {
            return $this->postJosn('api/v1/estate/publish/actions/publishProgram',$params);
        }

        public function deleteProgram($deviceIds)
        {
            return $this->postJosn('api/v1/estate/publish/actions/deleteProgram',['deviceIds'=>$deviceIds]);
        }
	}