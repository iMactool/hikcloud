<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */
    namespace Imactool\Hikcloud\Person;

    use Imactool\Hikcloud\Core\BaseService;

    class Person extends BaseService
    {

        /**
         * 新增住户人员信息。
         * 注意：
         * 1、本篇住户专指业主、家属、租客三个身份类别的人员。
         * 2、“姓名”+“手机号”或者“证件类型”+“证件号码”至少有一组信息完整。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addPerson(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person',$params);
        }

        /**
         * 删除住户人员信息。
         * @param $personId
         *
         * @return mixed
         * @author cc
         */
        public function deletePerson(string $personId)
        {
            $endpoint = '/api/v1/estate/system/person/'.$personId;
            return $this->deleteJson($endpoint,['personId'=>$personId]);
        }

        /**
         * 修改住户人员的基础信息。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updatePerson(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/updatePerson',$params);
        }

        /**
         * 设置住户人员所属社区。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addCommunityRelation(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/addCommunityRelation',$params);
        }

        /**
         * 删除住户人员与社区的关联关系。
         * 若住户在该社区有所属房屋，将同步解除住户与房屋的所属关系。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function deleteCommunityRelation(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/deleteCommunityRelation',$params);
        }

        /**
         * 设置人员所属户室（人员和房屋关联之后，将自动下发权限到设备）。支持审核流程，如需修改审核方式，请在社区管理页面进行配置。审核结果将通过消息订阅进行通知，消息类型为community_message_audit_state。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addRoomRelation(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/addRoomRelation',$params);
        }

        /**
         * 删除住户人员所属户室（后台将同步删除设备上的权限）。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function deleteRoomRelation(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/deleteRoomRelation',$params);
        }

        /**
         * 重置人员所属户室
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setRoomRelation(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/setRoomRelation',$params);
        }

        /**
         * 获取人员户室信息
         * @param array $params
         * @author cc
         */
        public function roomList(array $params)
        {
            return $this->getJson('/api/v1/estate/system/person/actions/roomList',$params);
        }

        /**
         * 人员查询
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function personInfoList(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/personInfoList',$params);
        }

        /**
         * 获取人员标签列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function labelList(array $params)
        {
            return $this->getJson('/api/v1/estate/system/person/actions/labelList',$params);
        }

        /**
         * 设置人员标签和车牌号
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addLabelAndLicenseRelation(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/person/actions/addLabelAndLicenseRelation',$params);
        }

        /**
         * ------------------------------------------------------------
         * ------------------------------------------------------------
         * 以下是
         * 综合安防管理平台（iSecure Center） 人员信息接口集合
         * ------------------------------------------------------------
         */

        /**
         * 管理接口
         * 批量开卡
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscCardBind(array $params)
        {
            return $this->iscPostJson('/api/cis/v1/card/bindings',$params);
        }

        /**
         * 卡片退卡
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscDeleteCard(array $params)
        {
            return $this->iscPostJson('/api/cis/v1/card/deletion',$params);
        }

        /**
         * 用于卡片批量挂失，批量挂失数量不能超过200个。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscBatchLoseCard(array $params)
        {
            return $this->iscPostJson('/api/cis/v1/card/batch/loss',$params);
        }

        /**
         * 用于卡片批量解挂，批量解挂数量不能超过200个
         * @param array $params
         * @author cc
         */
        public function iscBatchUnlossCard(array $params)
        {
            return $this->iscPostJson('/api/cis/v1/card/batch/unLoss',$params);
        }

        /**
         * 用于生产卡片二维码，二维码默认有效期为24*60分钟，默认最大开锁次数4次.
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscGenerateCardQrCode(array $params)
        {
            return $this->iscPostJson('/api/cis/v1/card/barCode',$params);
        }

        /**
         *  获取卡片列表接口可用来全量同步卡片信息，返回结果分页展示，不作权限过滤。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscGetCardList(array $params)
        {
          return $this->iscPostJson('/api/resource/v1/card/cardList',$params);
        }

        /**
         * 获取卡片列表接口可用来全量同步卡片信息，返回结果分页展示，不作权限过滤。
         * 注：卡号为精确查找
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscGetCardInfo(array $params = [])
        {
            return $this->iscPostJson('/api/irds/v1/card/cardInfo',$params);
        }

        /**
         * 查询卡片列表
         * @param array|int[] $params
         *
         * @return mixed
         * @author cc
         */
        public function iscSearchCardList(array $params = ['pageNo'=>1,'pageSize'=>100])
        {
            return $this->iscPostJson('/api/irds/v1/card/advance/cardList',$params);
        }

        /**
         * 根据查询条件查询卡片列表信息，主要根据时间段分页获取卡片信息，包含已删除数据。其中开始日期与结束日期的时间差必须在48小时内。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function iscGetCardTimeRange(array $params)
        {
            return $this->iscPostJson('/api/resource/v1/card/timeRange',$params);
        }
    }