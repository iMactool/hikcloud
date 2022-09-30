<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

    namespace Imactool\Hikcloud\Communit;

    use Imactool\Hikcloud\Core\BaseService;
    use Imactool\Hikcloud\Exceptions\Exception;
    use Imactool\Hikcloud\Exceptions\HttpException;
    use Imactool\Hikcloud\Exceptions\InvalidArgumentException;

    class Communit extends BaseService
    {
        /**
         * 在云眸社区租户下新增一个社区
         * 注：默认不支持6000C，需要在web端绑定边缘服务后才能支持（后续的楼栋、单元、房屋、人员接口在此基础上才会实时同步给6000C）
         * @param array $params
         *
         * @return mixed
         * @throws InvalidArgumentException
         * @author cc
         */
        public function communities(array $params)
        {
            if (!\array_key_exists('communityName',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 communityName");
            }
            if (!\array_key_exists('provinceCode',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 provinceCode");
            }
            if (!\array_key_exists('addressDetail',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 addressDetail");
            }

//            $headers = [
//                'Authorization'=>'Bearer e4d31bc1-ac63-4791-9f74-ccc784a592b7'
//            ];

            $result = $this->postJosn('/api/v1/estate/system/communities',$params);
//            $result = $this->httpClient()->request('post', 'api/v1/estate/system/communities', $options);

            return $result;

        }

        /**
         * 功能描述
         * 从云眸社区租户下删除一个社区。
         * @param string $communityId
         *
         * @return mixed
         * @throws InvalidArgumentException
         * @author cc
         */
        public function delCommunities(string $communityId)
        {
            if (empty($communityId)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数");
            }
            $params = ['communityId'=>$communityId];
            $result = $this->deleteJson('/api/v1/estate/system/communities/'.$communityId,$params);
            return $result;
        }

        /**
         * 修改社区
         * 修改云眸社区租户下的社区基础信息。（全量修改）
         * @param array $params
         *
         * @return mixed
         * @throws InvalidArgumentException
         * @author cc
         */
        public function updateCommunity(array $params)
        {
            if (!\array_key_exists('communityId',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 communityId");
            }
            if (!\array_key_exists('communityName',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 communityName");
            }
            if (!\array_key_exists('provinceCode',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 provinceCode");
            }
            if (!\array_key_exists('addressDetail',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 addressDetail");
            }

            $result = $this->postJosn('/api/v1/estate/system/communities/actions/updateCommunity',$params);

            return $result;
        }

        /**
         * 分页查询云眸社区租户下的社区。
         * @param array $params
         *
         * @return mixed
         * @throws InvalidArgumentException
         * @author cc
         */
        public function getCommunities(array $params)
        {
            if (!\array_key_exists('pageNo',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 pageNo");
            }
            if (!\array_key_exists('pageSize',$params)){
                throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 pageSize");
            }

            $endpoint = "/api/v1/estate/system/communities/actions/list?pageNo={$params['pageNo']}&pageSize={$params['pageSize']}";
            $result = $this->getJson($endpoint,$params);

            return $result;
        }
    }