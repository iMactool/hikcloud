<?php
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\Hikcloud\Voice;

	use Imactool\Hikcloud\Core\BaseService;

    class Voice extends BaseService
	{
        /**
         * 萤石云 语音文件上传接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function uploadYsVoiceFile(array $params)
        {
            return $this->multipart('/api/lapp/voice/upload',$params);
        }

        /**
         * 萤石云 语音文件查询接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsVoiceFile(array $params = [])
        {
            return $this->post('/api/lapp/voice/query',$params);
        }

        /**
         * 萤石云 删除已保存的语音文件接口
         * @param string $voiceName
         *
         * @return mixed
         * @author cc
         */
        public function deleteYsVoiceFile(string $voiceName)
        {
            $params = ['voiceName' => $voiceName];
            return $this->post('',$params);
        }

        /**
         * 萤石云 语音文件下发接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function downYsVoiceFile(array $params)
        {
            return $this->post('/api/lapp/voice/send',$params);
        }

        /**
         *  萤石云 临时语音下发接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function downYsVoiceFileOnce(array $params)
        {
            return $this->multipart('/api/lapp/voice/sendonce',$params);
        }

        /**
         * 萤石云 获取设备语音列表接口
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsVoiceFileList(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
//            return $this->post('/api/route/voice/v3/devices/voices',$params);
//            return $this->multipartGet('/api/route/voice/v3/devices/voices',$params);
            return $this->get('/api/route/voice/v3/devices/voices',$params,['Content-Type'=>'multipart/form-data']);
        }

        /**
         * 萤石云 新增设备语音接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addYsDeviceVoice(array $params)
        {
            return $this->post('/api/route/voice/v3/devices/voices',$params);
        }

        /**
         * 萤石云 修改设备语音名称接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceVoice(array $params)
        {
//            return $this->put('/api/route/voice/v3/devices/voices',$params,['Content-Type'=>'multipart/form-data']);
            return $this->put('/api/route/voice/v3/devices/voices',$params);
        }

        /**
         * 萤石云 删除设备语音接口
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function deleteYsDeviceVoice(array $params)
        {
//            return $this->deleteJson('/api/route/voice/v3/devices/voices',$params,['Content-Type'=>'multipart/form-data']);
//            return $this->delete('/api/route/voice/v3/devices/voices',$params,['Content-Type'=>'multipart/form-data']);
            return $this->delete('/api/route/voice/v3/devices/voices',$params);
        }



	}