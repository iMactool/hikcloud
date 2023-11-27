<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Http;

use Imactool\Hikcloud\Core\CacheAdapter;
use Imactool\Hikcloud\Exceptions\Exception;

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
        $accessToken = self::getInstance()->getItem($cacheKey);

        if (!$accessToken->isHit()) {
            $result = $this->refreshSelfAccessToken();
            if (!empty($result)) {
                $this->access_token = $result['access_token'];
                $accessToken->set($this->access_token);
                $accessToken->expiresAfter((int) $result['expires_in'] - 3);
                self::getInstance()->save($accessToken);
            }
        } else {
            $this->access_token = $accessToken->get();
        }

        return $this->access_token;
    }

    public function getYsAccessToken($cacheKey)
    {
        $accessToken = self::getInstance()->getItem($cacheKey);

        if (!$accessToken->isHit()){
            $result = $this->refreshYsAccessToken();
            if ($result['code'] == 10002){
                $result = $this->refreshYsAccessToken();
            }
            if ($result['code'] != 200){
                throw new Exception(\json_encode($result));
            }
            $this->ys_access_token = $result['data']['accessToken'];
            $accessToken->set($this->ys_access_token);
            $accessToken->expiresAfter((int) $result['data']['expireTime'] - 3);
            self::getInstance()->save($accessToken);
        }else{
            $this->ys_access_token = $accessToken->get();
        }
        return $this->ys_access_token;
    }
}
