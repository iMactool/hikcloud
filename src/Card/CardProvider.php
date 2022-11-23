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

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class CardProvider
     *
     * @method addCard(array $params)
     * @method deleteCard(string $cardId)
     * @method openCard(array $params)
     * @method refundCard(array $params)
     * @method changeCard(array $params)
     * @method lossCard($cardId)
     * @method cancelLossCard(array $params)
     * @method reissueCard(array $params)
     *
     * @package Imactool\Hikcloud\Card
     * @version 1.0.0
     */
    class CardProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Card'] = function ($container){
                return new Card($container);
            };
        }
    }