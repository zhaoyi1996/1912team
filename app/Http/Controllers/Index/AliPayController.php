<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Alipay\EasySDK\Kernel\Factory;
use Alipay\EasySDK\Kernel\Util\ResponseChecker;
use Alipay\EasySDK\Kernel\Config;


class AliPayController extends Controller
{
    public function getOptions()
    {
        $options = new Config();
        $options->protocol = 'https';
        $options->gatewayHost = 'openapi.alipaydev.com';
        $options->signType = 'RSA2';

        $options->appId = '2016102300743127';

        // 为避免私钥随源码泄露，推荐从文件中读取私钥字符串而不是写入源码中
        $options->merchantPrivateKey = 'MIIEpQIBAAKCAQEAvjS18yGZz+vebsjNrdybArSfLp2PbCvID/zKEjKnPlGOw3Z/u2wWw3hunDAJSG94B/N17DtUO5ehMtQ24kJG+ldfZ5nXj763O88ieugLKoqg64YZFUovsWACSxT1GTKTqTnbM6tgT/s9KP8t0nJwPkh5urAd2n45IBsqmAJtU1P3ZucPH9kSptuf65s9Ijc6Gw0FvuE3oF30xD5xNwMrHCGWchFZwzd+ZGSVjVo1/7qufvzUQe8KBiNW+geysmCdSEqO+FkdrQkMqtoj9Cctx/EN692EXX6bBnjvtBN8UTo7MVELye5xoFhVfELjM2987lfWUfE3RVGxTabYybBEvwIDAQABAoIBAHTZIvIDMV/HUjWSzLBDd0L5PVVA3Cwi1Vvk+yqkzZN+PQsdUCkOpQlege0XoYxLVlzkFwySAhQ9+XylXDYxazM929FkdEXNbvmiLVd+F+YBlgw6rEwk8BmylpYTgOMC7C2o6l3aqWdZO+Bkq3y+avAITCgBK8Xfhy6PIeKSkyD9w9jr2uJ/fKsCCJX+3GTuP4eM6ZVwNUMRqbynQOUVPtl1WvLaoj8yDCNibMY2SuMXwi9/0DQ5cUV2w2XpMEBRdIoMF4YwjwsxoHnkr127dM/wlWoYBYy6dhmnuEO8Eowrg7/mz+GxPfziBmduDXy1wT4N4C7mJvCRa4YtIp71eoECgYEA6O4O9kKNDUdY5GxC1VX/OqNCBIAwZIly/BNWUPWFwgIKHWQ6jJ7cCQaoeOYFBDWbo1p+MdKeZJA9DaWG3HMH7JSPR9HKaBOvAo7pCuSFO+tLv3FHbLDaSs0BMKOc+R9ulvdiY6UfkoTwhTki+GEd/nnQh53/vq9QKOt/eRy5WH8CgYEA0QtiXttPjIUkabBL8lg6o9/3z/u3xRyb9Jm641hzF1O2EhOfIcZeyCa2BpxqMI20d31sv/np6kKeMcyf4MyiaWahbu17oeIDNBJvTmtFx/NPsX1BDLbCF2QxFbCUsCxOxGkSGBuK/xbt1h2RgzlOO3tyI3DnQQIMKeEiq3MM88ECgYEAmqjuoE7CD04PVOQZYEOQi2O5QvnGqAqnoX5JcsoDPTVTd/6D7bjRSuDz3gqEzC24ILfGUNiTORyYnUYKDLgIS+q8VCiVJ5PiQWWYkRX47TcnfX7+uMmYt8/0+VG5uaRILs8lshoCo6vHc/3jHV6GpuBFOLcNB5SqOfFcG5OZ8YsCgYEAyEnoDoqCRVir8rd/jMsMJEdK4HOFN86ZflpsvbbZTthd8iPqrCmsVokAjoT/GVYsOvBpaebBQDpj58LuzCxE0EgNFINlmU07VID1NGWDjniJOr2Pvea9QDw261ksnT9WmMkzFPYOzyng5u2dpeUaF9PHID3k1Fxp2xZiaXLqTgECgYEA4BZvgvktNjEVDXDDunCYu32MPpo8oKnosuZsgrD7HIlJPHsfpEdLEuLoaYa46ygA0x8SnSeR9QJ6Z0LaQsX4FvnqCTMHdj9TG0LcnZnhVEb7aj4jbtpm4as4gRJUse6fRpnnXzT3UeQl0B7DnZe7j5Uw9LUWp6E52TGViCyua04=';

//        $options->alipayCertPath = '<-- 请填写您的支付宝公钥证书文件路径，例如：/foo/alipayCertPublicKey_RSA2.crt -->';
//        $options->alipayRootCertPath = '<-- 请填写您的支付宝根证书文件路径，例如：/foo/alipayRootCert.crt" -->';
//        $options->merchantCertPath = '<-- 请填写您的应用公钥证书文件路径，例如：/foo/appCertPublicKey_2019051064521003.crt -->';

        //注：如果采用非证书模式，则无需赋值上面的三个证书路径，改为赋值如下的支付宝公钥字符串即可
        $options->alipayPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAolWgGpB+nDKdBPGGNN3iKrUwLxy+udnhIz889J5TdXOtxHLRv3v8bZX4MiNQTCvHcxlDrQqIrtsLRRze1q1bgvtozaefG0x6tIagH6w/XXnpLa88xYDQLy4G2ZH27Q0ImYlL4jHwh34iMQycbz/C54jPkBvOL7FpPmun9NauY9wwUo4678HWbDf5/CXnzFoaXzD1XGcuRe2WvjUiR/jEEwn4ymwAgpxmwCOROxC1WrkSGLn4CtqDUHAuGQ6K1kumucYJsA4bDZulG3T2yRV2REpk+8cMXZ40UZ6/clWpXkJeibGl+/tCiUJeTe3Tw85/UGsBM2iY381KQLzzkM/nwQIDAQAB';

        //可设置异步通知接收服务地址（可选）
        $options->notifyUrl = "http://1912team.yisirdisco.cn/index/alipay";

        //可设置AES密钥，调用AES加解密相关接口时需要（可选）
//        $options->encryptKey = "<-- 请填写您的AES密钥，例如：aa4BtZ4tspm2wnXLb1ThQA== -->";



        return $options;
    }

    public function test()
    {
//        dd(111);
        Factory::setOptions($this->getOptions());

        try {
            //2. 发起API调用（以支付能力下的统一收单交易创建接口为例）
            $result = Factory::payment()->common()->create("iPhone6 16G", "20200326235526002", "0.01", "2088102180730314");
            $responseChecker = new ResponseChecker();
            //3. 处理响应或异常
            if ($responseChecker->success($result)) {
//                echo "调用成功". PHP_EOL;
                //生成二维码
                $AliCode=Factory::payment()->FaceToFace()->precreate('支付宝支付','20200326235526002','0.01');
//                var_dump($AliCode);die;
                $AliCode=json_decode($AliCode->httpBody,true);
                if($AliCode['alipay_trade_precreate_response']['code']=='10000'){
//                    dd($AliCode);
                    return view('index.pay.pay',compact('AliCode'));
                }
            } else {
                echo "调用失败，原因：". $result->msg."，".$result->subMsg.PHP_EOL;
            }
        } catch (Exception $e) {
            echo "调用失败，". $e->getMessage(). PHP_EOL;;
        }


    }


}
