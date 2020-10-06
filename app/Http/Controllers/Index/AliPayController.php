<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderModel;
use App\Model\OrderGoodsModel;

use Alipay\EasySDK\Kernel\Factory;
use Alipay\EasySDK\Kernel\Util\ResponseChecker;
use Alipay\EasySDK\Kernel\Config;
class AliPayController extends Controller
{
    public function ali()
    {
        $data=session('order_id');
//        dd($data);
        if(!empty($data)){
            //查询订单和订单商品信息
            $order_data=OrderModel::where('order_id',$data['order_id'])->first();
            $goods_order_data=OrderGoodsModel::where('order_number',$order_data->order_number)->get();
            dump($order_data);
            dd($goods_order_data);
        }
        Factory::setOptions($this->getOptions());

        try {
            //2. 发起API调用（以支付能力下的统一收单交易创建接口为例）
            $result = Factory::payment()->common()->create("iPhone6 16G", "20200326235526002", $order_data->goods_price, "2088102180730314");
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
