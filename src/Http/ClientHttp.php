<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Hikcloud\Http;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use Imactool\Hikcloud\Exceptions\Exception;

trait ClientHttp
{
    use AuthService;

    public static $client;
    protected static $appConfig = [];
    protected $access_token_key = 'imactool.hik.access_token.';
    protected $access_token_ys_key = 'imactool.hik.ys.access_token.';


    public function httpClient()
    {

        if (!static::$client) {
            static::$client = new Http();
            static::$client->setUrl($this->baseUri);
        }

        return static::$client;
    }

    public static function setAppConfig($cachePrefix ,$appConfig)
    {
        $config = self::getInstance()->getItem($cachePrefix);
        if (!$config->isHit()){
            $config->set($appConfig);
            self::getInstance()->save($config);
        }
    }

    /**
     * 云牟配置项获取
     * @param null $key
     *
     * @return mixed
     * @author cc
     */
    public static function getHikConfig($key = null)
    {
        $config = self::getInstance()->getItem('hikconfig');
        $nowConfig = $config->get();
        if (is_null($key)) {
            return $nowConfig;
        }
        return $nowConfig[$key];
    }

    /**
     * 获取萤石云配置信息
     * @param null $key
     *
     * @return mixed
     * @author cc
     */
    public static function getYsConfig($key = null)
    {
        $config = self::getInstance()->getItem('ysconfig');
        $nowConfig = $config->get();
        if (is_null($key)) {
            return $nowConfig;
        }
        return $nowConfig[$key];
    }

    /**
     *  综合安防管理平台（iSecure Center） 配置信息
     * @param null $key
     *
     * @return mixed
     * @author cc
     */
    public static function getIsConfig($key = null)
    {
        $config = self::getInstance()->getItem('isConfig');
        $nowConfig = $config->get();
        if (is_null($key)) {
            return $nowConfig;
        }
        return $nowConfig[$key];
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
    public function get($endpoint, $params = [], $headers = [])
    {
        $header = [];
        if ($this->nowApp == 'HikCloud'){
            $header = $this->generateHeader();
        }else if($this->nowApp == 'Ys7'){
            $params = $this->generateYsCommonParam($params);
        }

        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }

        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $header,
            'query' => $params,
//            'debug' => true
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
     * get 方式请求
     * 设置请求的主体为 multipart/form-data 表单 .
     * @param       $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     * @throws Exception
     * @author cc
     */
    public function multipartGet($endpoint, $params = [], $headers = [])
    {

        $header = [];
        if ($this->nowApp == 'HikCloud'){
            $header = $this->generateHeader();
        }else if($this->nowApp == 'Ys7'){
            $params = $this->generateYsCommonParam($params);
        }

        $data = [];
        foreach ($params as $key => $val){
            $tmp['name'] = $key;
            $tmp['contents'] = $val;
            $data[] = $tmp;
        }

        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        $multipart = [];
        foreach ($params as $key=>$param){
            $tmp = [];
            if (in_array($key,['voiceFile'])){
                $tmp['name']     = $key;
                $tmp['contents'] = Utils::tryFopen($param,'r');
                $tmp['filename'] = $param;
                $tmp['headers'] = ['Content-Type'=>'multipart/form-data'];
            }else{
                $tmp['name']     = $key;
                $tmp['contents'] = $param;
            }
            $multipart[] = $tmp;
        }

        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $header,
            'multipart'=>$multipart,
//            'debug' => true
        ]);


    }

    /**
     * post multipart/form-data 方式请求
     *设置请求的主体为 multipart/form-data 表单
     * @param       $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     * @throws Exception
     * @author cc
     */
    public function multipart($endpoint, $params = [], $headers = [])
    {
        $header = [];
        if ($this->nowApp == 'HikCloud'){
            $header = $this->generateHeader();
        }else if($this->nowApp == 'Ys7'){
            $params = $this->generateYsCommonParam($params);
        }
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        $multipart = [];
        foreach ($params as $key=>$param){
            $tmp = [];
            if (in_array($key,['voiceFile'])){
                $tmp['name']     = $key;
                $tmp['contents'] = Utils::tryFopen($param,'r');
                $tmp['filename'] = $param;
                $tmp['headers'] = ['Content-Type'=>'multipart/form-data'];
            }else{
                $tmp['name']     = $key;
                $tmp['contents'] = $param;
            }
            $multipart[] = $tmp;
        }
        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $header,
            'multipart' => $multipart,
//            'debug'=>true
        ]);
    }

    public function put($endpoint, $params = [], $headers = [])
    {
        $params = $this->generateYsCommonParam($params);
        $multipart = [];
        foreach ($params as $key=>$param){
             $tmp = [];
             if (in_array($key,['voiceUrl'])){
                 $tmp['name'] = $key;
                 $tmp['contents'] = Utils::tryFopen($param,'r');
                 $tmp['filename'] = $param;
             }else{
                 $tmp['name'] = $key;
                 $tmp['contents'] = $param;
             }
            $multipart[] = $tmp;
        }
//        try {
         return   $this->httpClient()->request('PUT', $endpoint, [
                'headers'   => $headers,
                'multipart' => $multipart,
//                'debug'     => true
            ]);
//        }catch (BadResponseException $e){
//            return $e->getMessage();
//        }
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
        $header = [];
        if ($this->nowApp == 'HikCloud'){
            $header = $this->generateHeader();
        }else if($this->nowApp == 'Ys7'){
            $params = $this->generateYsCommonParam($params);
        }

        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        return $this->httpClient()->request('POST', $endpoint, [
            'headers' => $header,
            'form_params' => $params,
            'verify'      => false,
//            'debug'=>true
        ]);
    }

    public function postData($endpoint, $params = [], $headers = [])
    {

       $params = $this->generateYsCommonParam($params);
        return $this->httpClient()->request('POST', $endpoint, [
            'headers'       => $headers,
            'body'          => \json_encode($params),
            'verify'        => false,
//            'debug'         => true
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
        $header = [];
        if ($this->nowApp == 'HikCloud'){
            $header = $this->generateHeader();
        }else if($this->nowApp == 'Ys7'){
            $params = $this->generateYsCommonParam($params);
        }
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $header,
            'json'    => $params,
//            'verify'  => false,
//            'debug'   => true
        ]);
    }

    public function delete($endpoint, $params = [], $headers = [])
    {
        $header = [];
        if ($this->nowApp == 'HikCloud'){
            $header = $this->generateHeader();
        }else if($this->nowApp == 'Ys7'){
            $params = $this->generateYsCommonParam($params);
        }

        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        $options = [
            'query'  => $params,
            'headers' =>$header,
//            'debug' =>true
        ];


        return $this->httpClient()->request('DELETE',$endpoint,$options);
    }

    public function deleteJson($endpoint, $params = [], $headers = [])
    {

        $header = $this->generateHeader();
        if (!empty($headers)){
            $header = array_merge($header,$headers);
        }
        $options = [
            'form_params'=> $params,
            'headers' =>$header,
//            'debug' =>true
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

    /**
     * 萤石云 请求业务参数合并access_token 生成最终请求参数
     * @param array $params
     *
     * @return array|mixed
     * @throws Exception
     * @author cc
     */
    public function generateYsCommonParam($params = [])
    {
        $accessToken = $this->getYsAccessToken($this->authorizerYsTokenKey());
        $param = ['accessToken'=>$accessToken];
        return $param + $params;
    }

    /**
     * 获取海康云牟缓存key
     * @return string
     * @author cc
     */
    public function authorizerTokenKey()
    {
        return $this->access_token_key . static::getHikConfig('client_id');
    }

    /**
     * 获取萤石云缓存key
     * @return string
     * @author cc
     */
    public function authorizerYsTokenKey()
    {
        return $this->access_token_ys_key . static::getYsConfig('appKey');
    }

    public function refreshSelfAccessToken()
    {
        $params = [
            'client_id'     => static::getHikConfig('client_id'),
            'client_secret' => static::getHikConfig('client_secret'),
            'grant_type'    => 'client_credentials',
        ];

        $options = [
            'headers' => [],
            'query' => $params,
        ];

        try {
            $result = $this->httpClient()->request('post', '/oauth/token', $options);
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
        return $result;
    }

    /**
     * 萤石云 access token
     * @return mixed
     * @author cc
     */
    public function refreshYsAccessToken()
    {
        $params = [
            'appKey'    => static::getYsConfig('appKey'),
            'appSecret' => static::getYsConfig('appSecret')
        ];
        $options = [
            'headers' => ['Content-Type'=>'application/x-www-form-urlencoded'],
            'query' => $params,
        ];
        $result = $this->httpClient()->request('post', '/api/lapp/token/get', $options);
        return $result;
    }

    public function iscPostJson($endpoint,$params=[])
    {
        $endpoint = '/artemis'.$endpoint;
        $header = [
            'Accept'                => '*/*',
            'Content-Type'          => 'application/json',
            'X-Ca-Key'              => trim(static::getIsConfig('appKey')),
            'X-Ca-Signature'        => $this->getSignResult($endpoint),
            'X-Ca-Timestamp'        => $this->geTimeStamp(),
            'X-Ca-Signature-Headers'=> 'x-ca-key,x-ca-timestamp',
        ];

        return $this->httpClient()->request('POST', $endpoint, [
            'headers' => $header,
            'json'    => $params,
            'verify'  => $this->verify,
//            'debug'=>true
        ]);
    }

    public function iscPost($endpoint,$params=[])
    {
        $endpoint = '/artemis'.$endpoint;
        $header = [
            'Accept'                => '*/*',
            'Content-Type'          => 'application/json',
            'X-Ca-Key'              => trim(static::getIsConfig('appKey')),
            'X-Ca-Signature'        => $this->getSignResult($endpoint),
            'X-Ca-Timestamp'        => $this->geTimeStamp(),
            'X-Ca-Signature-Headers'=> 'x-ca-key,x-ca-timestamp',
        ];

        return $this->httpClient()->request('POST', $endpoint, [
            'headers' => $header,
            'form_params'    => $params,
            'verify'  => $this->verify,
//            'debug'=>true
        ]);
    }


    /**
     * 获取isc平台签名
     * @param $url
     * @param $httpMethod
     *
     * @return string
     * @author cc
     */
    public function getSignResult($url,$httpMethod='post') {
        $signString = $this->generateSignString($url,$httpMethod);
        $sign       = hash_hmac('sha256',$signString, static::getIsConfig('appSecret'),true);
        $result     = base64_encode($sign);
        return $result;
    }

    /**
     * isc 平台
     * 1.签名字符串组成及顺序
     * @param $httpMethod http method
     * @param $url api url
     *
     * @return string
     * @author cc
     */
    public function generateSignString($url,$httpMethod) {
        $enter   = "\n";
        $string  = strtoupper($httpMethod)  . $enter;
        $string .= "*/*"                    . $enter;
        $string .= "application/json"       . $enter;
        $string .= "x-ca-key:"              . trim(static::getIsConfig('appKey')).$enter;
        $string .= "x-ca-timestamp:"        . $this->geTimeStamp().$enter;
        $string .= $url;
        return $string;
    }

    public function geTimeStamp()
    {
        [$msec, $sec] = explode(' ', microtime());
        $msectime     = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }



}
