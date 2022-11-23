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

	use Imactool\Hikcloud\Core\Container;
    use Imactool\Hikcloud\Interfaces\Provider;

    /**
     * Class PropertyProvider
     *
     * @method addProperty(array $params)
     * @method updateProperty(array $params)
     * @method deleteProperty(string $personId)
     *
     * @package Imactool\Hikcloud\Property
     * @version 1.0.0
     */
    class PropertyProvider implements Provider
	{
        public function serviceProvider (Container $container)
        {
            $container['Property'] = function ($container){
                return new Property($container);
            };
        }
    }