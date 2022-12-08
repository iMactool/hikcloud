<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */
    namespace Imactool\Hikcloud\Card;

    use Imactool\Hikcloud\Core\BaseService;

    class Card extends BaseService
    {
        /**
         * 添加一张新的空白卡片。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addCard(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards',$params);
        }

        /**
         * 删除一张空白卡。
         * @param string $cardId
         *
         * @return mixed
         * @author cc
         */
        public function deleteCard(string $cardId)
        {
            $endpoint = '/api/v1/estate/system/cards/'.$cardId;
            return $this->deleteJson($endpoint,['cardId'=>$cardId]);
        }

        /**
         * 给人员开通卡片。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function openCard(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/openCard',$params);
        }

        public function refundCard(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/refundCard',$params);
        }

        public function changeCard(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/changeCard',$params);
        }

        public function lossCard($cardId)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/lossCard',['cardId'=>$cardId]);
        }

        public function cancelLossCard(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/cancelLossCard',$params);
        }

        public function reissueCard(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/reissueCard',$params);
        }

        /**
         * 查卡
         */
        public function getCards(array $params)
        {
            return $this->postJosn('/api/v1/estate/system/cards/actions/getCards',$params);
        }

    }
