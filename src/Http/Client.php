<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Http;

use Imactool\Hikcloud\Exceptions\Exception;

trait Client
{
    use AuthService;

    public static $client;
    protected static $appConfig = [];
    protected $access_token_key = 'imactool.hik.access_token.';

    public function httpClient()
    {
        if (!self::$client) {
            self::$client = new Http();
        }

        return self::$client;
    }

    public static function setAppConfig($key, $appConfig)
    {
        self::$appConfig[$key] = $appConfig;
    }

    public static function getAppConfig($key = null)
    {
        if (is_null($key)) {
            return self::$appConfig['config'];
        }

        return self::$appConfig['config'][$key];
    }


    public static function getAllConfig()
    {
        return self::$appConfig;
    }



    /**
     * 发送 get 请求
     *
     * @param string $endpoint
     * @param array  $query
     * @param array  $headers
     *
     * @return mixed
     */
    public function get($endpoint, $query = [], $headers = [])
    {
        $header = $this->generateHeader();
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $header,
            'query' => $query,
        ]);
    }

    public function getJson($endpoint, $query = [], $headers = [])
    {
        $header = $this->generateHeader();
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $header,
            'json' => $query,
            'query' => $query,
        ]);
    }

    /**
     * 发送 post 请求
     *
     * @param string $endpoint
     * @param array  $params
     * @param array  $headers
     *
     * @return mixed
     */
    public function post($endpoint, $params = [], $headers = [])
    {
        $header = $this->generateHeader();
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }

        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $header,
            'form_params' => $params,
        ]);
    }


    /**
     * 用 json 的方式发送 post 请求
     *
     * @param $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     */
    public function postJosn($endpoint, $params = [], $headers = [])
    {
        $header = $this->generateHeader();
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $header,
            'json' => $params,
        ]);
    }

    public function deleteJson($endpoint, $params = [], $headers = [])
    {
        $header = $this->generateHeader();
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        $options = [
            'form_params'=> $params,
            'headers' =>$header
        ];
       return $this->httpClient()->request('DELETE',$endpoint,$options);
    }

    public function generateHeader($headers = []) : array
    {
        $accessToken = $this->getAccessToken($this->authorizerTokenKey());

        return [
            'Authorization'=>'Bearer '.$accessToken
        ];
    }

    public function authorizerTokenKey()
    {
        return $this->access_token_key . self::getAppConfig('client_id');
    }


    public function refreshSelfAccessToken()
    {
        $params = [
            'client_id'     => self::getAppConfig('client_id'),
            'client_secret' => self::getAppConfig('client_secret'),
            'grant_type'    => 'client_credentials',
        ];

        $options = [
            'headers' => [],
            'query' => $params,
        ];

        try {
            $result = $this->httpClient()->request('post', 'oauth/token', $options);
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
        return $result;
    }
}
