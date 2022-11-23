<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Building;

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class BuildingProvider
     * @method addBuilding(array $params) 新增楼栋
     * @method deleteBuilding($buildingId)
     * @method addUnit(array $params)
     * @method deleteUnit($unitId)
     * @method addRoom(array $params)
     * @method deleteRoom($roomId)
     * @method getRoomByNumber(array $params)
     * @method getRoomById($roomId)
     * @method getRoomList(array $params)
     * @method getBuildingList(array $params)
     * @method getUnitList(array $params)
     * @method getUnitRoomList(array $params)
     *
     * @package Imactool\Hikcloud\Building
     * @version 1.0.0
     */
    class BuildingProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Building'] = function ($container){
                return new Building($container);
            };
        }
    }