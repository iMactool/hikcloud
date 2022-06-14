<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Http;

use Imactool\Hikcloud\Core\CacheAdapter;

trait AuthService
{
    use CacheAdapter;

    /**
     * 尝试获取可用的 access_token.
     *
     * @return string
     */
    public function getAccessToken($cacheKey)
    {
        $accessToken = CacheAdapter::getInstance()->getItem($cacheKey);

        if (!$accessToken->isHit()) {
            $result = $this->refreshSelfAccessToken();
            if (!empty($result)) {
                $this->access_token = $result['access_token'];
                $accessToken->set($this->access_token);
                $accessToken->expiresAfter((int) $result['expires_in'] - 3);
                CacheAdapter::getInstance()->save($accessToken);
            }
        } else {
            $this->access_token = $accessToken->get();
        }

        return $this->access_token;
    }
}
