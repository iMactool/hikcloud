<h1 align="center"> hikcloud </h1>

<p align="center"> 企业内部应用开发-社区.</p>
 

## 安装

```shell
$ composer require imactool/hikcloud -vvv
```

## 使用

```php

	require __DIR__ .'/vendor/autoload.php';

	use Imactool\Hikcloud\HikCloud;


	$config = [
		'client_id'     => '客户端ID',
		'client_secret' => '访问密钥'
	];
	
	$hikCloud = new HikCloud($config);
	
	//开始使用
       $params = [
            'communityName' =>'龙湖社区',
            'provinceCode' =>'130002',
            'addressDetail' =>'玉兰大道与黄山路交叉口192号'
	];
    $res = $hikCloud->Communit->communities($params);
    var_dump($res);

```

`client_id` 使用云眸系统管理员账号登录开放平台门户网站 [open2.hik-cloud.com](https://www.hik-cloud.com/poseidon/index.html#/) ，进入密钥管理页面查看获取

`client_secret` 使用云眸账号登录开放平台门户网站 [open2.hik-cloud.com](https://www.hik-cloud.com/poseidon/index.html#/) ，进入密钥管理页面查看获取

更多用法请参考源码，支持 6000C。

6000c 拉取视频流 demo

```php

    #1、分页查询云眸社区租户下的社区
	$params = [
		'pageNo'=>1,
		'pageSize'=>100
	];
    $res = $hik->Communit->getCommunities($params);
    var_export($res);
 
    #2、查询社区下的设备列表
	$params = [
		'communityId'=>'123456789',
		'pageNo'=>2,
		'pageSize'=>100
	];
	$res = $hik->Device->getDeviceByCommunityId($params);
	var_export($res);

    #3、查询社区下设备通道列表
	$params = [
		'communityId'=>'123456789',
		'pageNo'=>2,
		'pageSize'=>100
	];
	$res = $hik->Device->getDeviceChannelByCommunityId($params);
	var_dump($res);

	#4、 获取标准流预览地址(支持6000C子设备通道。)
	$params = [
		'channelId' =>  '1234526789',
		'protocol'  => 4,
		'expireTime' => 180
	];
	$res = $hik->Device->getLiveAddressNew($params); 
 	var_dump($res);
 	
 	
    #查询设备详情
	$deviceId = '744e45a58f1c45aa84096fc00476ce53';
	$res = $hik->Device->getDeviceInfo($deviceId);
 	var_dump($res);



```

## 参考文档
> 请熟悉和参考文档的参数要求

[企业内部应用开发-社区 ](https://pic.hik-cloud.com/opencustom/apidoc/online/neptune/4cb4c4f2147e4624bc29408ac70e92c4.html?timestamp=1653966047558)

#### 典型使用场景
- 访客邀请：通过云眸社区 API实现住户邀请访客以二维码开门的方式出入社区场景。
- 社区管理：通过云眸社区 API实现社区、楼栋、单元、户室信息的增、删、改、查操作，应用于智慧社区管理场景。
- 门禁管理：通过云眸社区 API远程操控海康门禁对讲设备，实现人员权限下发，远程一键开门等业务场景。
- 可视对讲：通过云眸社区 API接入海康可视对讲设备，第三方通过集成可视对讲SDK，实现单元门口机/围墙机的APP呼叫功能，应用于智慧社区场景。

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/imactool/hikcloud/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/imactool/hikcloud/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT