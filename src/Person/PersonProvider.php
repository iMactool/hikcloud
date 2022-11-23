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

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class PersonProvider
     *
     * @method addPerson(array $params)
     * @method deletePerson(string $personId)
     * @method updatePerson(array $params)
     * @method addCommunityRelation(array $params)
     * @method deleteCommunityRelation(array $params)
     * @method addRoomRelation(array $params)
     * @method deleteRoomRelation(array $params)
     * @method setRoomRelation(array $params)
     * @method roomList(array $params)
     * @method personInfoList(array $params)
     * @method labelList(array $params)
     * @method addLabelAndLicenseRelation(array $params)
     *
     * @method iscCardBind(array $params)
     * @method iscDeleteCard(array $params)
     * @method iscBatchLoseCard(array $params)
     * @method iscBatchUnlossCard(array $params)
     * @method iscGenerateCardQrCode(array $params)
     * @method iscGetCardList(array $params)
     * @method iscGetCardInfo(array $params = [])
     * @method iscSearchCardList(array $params = ['pageNo'=>1,'pageSize'=>100])
     * @method iscGetCardTimeRange(array $params)
     *
     * @package Imactool\Hikcloud\Person
     * @version 1.0.0
     */
    class PersonProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Person'] = function ($container){
                return new Person($container);
            };
        }
    }