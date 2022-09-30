<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Resource;

	use Imactool\Hikcloud\Core\BaseService;

    class Resource extends BaseService
	{
        /**
         * 获取根区域信息
         * 适配：综合安防管理平台iSecure Center V1.0及以上版本
         * @return mixed
         * @author cc
         */
        public function getRootRegions()
        {
            return $this->iscPostJson('/api/resource/v1/regions/root',['pageNo'=>1]);
        }

        /**
         * 根据查询条件查询区域列表信息，主要用于区域信息查询过滤。
         * 相对V1接口，支持级联场景的区域查询。
         * 当返回字段对应的值为空时，该字段不返回。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getNodesByParams(array $params)
        {
            return $this->iscPostJson('/api/irds/v2/region/nodesByParams',$params);
        }

        /**
         * 根据区域编号获取下一级区域列表v2
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getSubRegions(array $params)
        {
            return $this->iscPostJson('/api/resource/v2/regions/subRegions',$params);
        }

        /**
         * 分页获取区域列表
         * @param array|int[] $params
         *
         * @return mixed
         * @author cc
         */
        public function getRegions(array $params = ['pageNo'=>1,'pageSize'=>100])
        {
            return $this->iscPostJson('/api/resource/v1/regions',$params);
        }

        /**
         * 根据编号获取区域详细信息
         * @param array $params 区域编号，最大1000个，根据查询区域列表v2接口获取返回报文中的indexCode字段
         *
         * @return mixed
         * @author cc
         */
        public function getRegionInfo(array $params)
        {
            $params = [
                'indexCodes' => $params
            ];
            return $this->iscPostJson('/api/resource/v1/region/regionCatalog/regionInfo',$params);
        }

        /**
         * 增量获取区域数据
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getTimeRange(array $params)
        {
            return $this->iscPostJson('/api/resource/v1/region/timeRange',$params);
        }

        /**
         * 批量添加区域
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function batchAddRegion(array $params)
        {
            return $this->iscPostJson('/api/resource/v1/region/batch/add',$params);
        }

        /**
         * 根据区域标志修改区域信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateRegion(array $params)
        {
            return $this->iscPostJson('/api/resource/v1/region/single/update',$params);
        }
	}