<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Auth;

use Imactool\Hikcloud\Core\BaseService;
use Imactool\Hikcloud\Core\CacheAdapter;
use Imactool\Hikcloud\Exceptions\Exception;
use Imactool\Hikcloud\Exceptions\HttpException;
use Imactool\Hikcloud\Exceptions\InvalidArgumentException;

class Auth extends BaseService
{
    use CacheAdapter;

    /**
     * 测试用途 请求获取 access_token.
     * @param string|null $scope
     *
     * @return mixed
     * @author cc
     */
    public function requestAccessToken(?string $scope = '')
    {
        $params = [
            'client_id'     => $this->appRunConfig['client_id'],
            'client_secret' => $this->appRunConfig['client_secret'],
            'grant_type'    => 'client_credentials',
        ];
        if ($scope){$params['scope'] = $scope; }

        $options = [
            'headers' => [],
            'query' => $params,
        ];

        try {
            $result = $this->httpClient()->request('post', 'oauth/token', $options);
        }catch (Exception $exception){
            $message = $exception->getMessage();
            if ($exception instanceof InvalidArgumentException){
                $message = '参数异常：' . $message;
            }else if($exception instanceof HttpException){
                throw new HttpException($exception->getMessage(), $exception->getCode(),$exception);
            }
            return $message;
        }

        return $result;
    }

    /**
     * 第三方跳转登录云眸社区对接规范
     * @param array $params
     *
     * @return mixed
     * @author cc
     */
    public function thirdJummpLogin(array $params)
    {
        if (!\array_key_exists('appId',$params)){
            throw new \Imactool\Hikcloud\Exceptions\InvalidArgumentException("缺少必要参数 appId");
        }

        $ns     = strtoupper(self::randString(32));
        list($msec ,$sec) = explode(' ',microtime());
        $ts     =  (float) sprintf('%.0f',(floatval($msec) + floatval($sec)) * 1000);
        $secret = $params['secret'];
        $params['ns']           = $ns;
        $params['ts']           = $ts;
        unset($params['secret']);
        ksort($params);
        $queryStr = http_build_query($params);
        $string = $queryStr . '&secret='.$secret;
        $signature = strtoupper(hash_hmac('sha256', $string, $secret));

        return "https://sq.hik-cloud.com/?{$queryStr}&signature={$signature}";
    }

    /**
     * 生成随机字符串
     *
     * @access public
     * @param integer $length 字符串长度
     * @param string $specialChars 是否有特殊字符
     * @return string
     */
    public static function randString($length, $specialChars = false) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($specialChars) {
            $chars .= '!@#$%^&*()';
        }

        $result = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $result .= $chars[rand(0, $max)];
        }
        return $result;
    }
}
