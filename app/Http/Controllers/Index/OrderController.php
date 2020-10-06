<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CartModel;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\DefaultModel;
use App\Model\OrderGoodsModel;
// use App\Model\CartModel;
use App\Model\OrderModel;

class OrderController extends Controller
{



    const EPOCH_OFFSET = 0;  //偏移时间戳,该时间一定要小于第一个id生成的时间,且尽量大(影响算法的有效可用时间)

    const SIGN_BITS = 1;        //最高位(符号位)位数，始终为0，不可用
    const TIMESTAMP_BITS = 41;  //时间戳位数(算法默认41位,可以使用69年)
    const DATA_CENTER_BITS = 5;  //IDC(数据中心)编号位数(算法默认5位,最多支持部署32个节点)
    const MACHINE_ID_BITS = 5;  //机器编号位数(算法默认5位,最多支持部署32个节点)
    const SEQUENCE_BITS = 12;   //计数序列号位数,即一系列的自增id，可以支持同一节点同一毫秒生成多个ID序号(算法默认12位,支持每个节点每毫秒产生4096个ID序号)。

    /**
     * @var integer 数据中心编号
     */
    protected $data_center_id;

    /**
     * @var integer 机器编号
     */
    protected $machine_id;

    /**
     * @var null|integer 上一次生成id使用的时间戳(毫秒级别)
     */
    protected $lastTimestamp = null;

    /**
     * @var int
     */
    protected $sequence = 1;    //序列号
    protected $signLeftShift = self::TIMESTAMP_BITS + self::DATA_CENTER_BITS + self::MACHINE_ID_BITS + self::SEQUENCE_BITS;  //符号位左位移位数
    protected $timestampLeftShift = self::DATA_CENTER_BITS + self::MACHINE_ID_BITS + self::SEQUENCE_BITS;    //时间戳左位移位数
    protected $dataCenterLeftShift = self::MACHINE_ID_BITS + self::SEQUENCE_BITS;   //IDC左位移位数
    protected $machineLeftShift = self::SEQUENCE_BITS;  //机器编号左位移位数
    protected $maxSequenceId = -1 ^ (-1 << self::SEQUENCE_BITS);    //最大序列号
    protected $maxMachineId = -1 ^ (-1 << self::MACHINE_ID_BITS);   //最大机器编号
    protected $maxDataCenterId = -1 ^ (-1 << self::DATA_CENTER_BITS);   //最大数据中心编号

    /**
     * @param integer $dataCenter_id 数据中心的唯一ID(如果使用多个数据中心,需要设置此ID用以区分)
     * @param integer $machine_id 机器的唯一ID (如果使用多台机器,需要设置此ID用以区分)
     * @throws \Exception
     */
    public function __construct($dataCenter_id = 0, $machine_id = 0)
    {
        if ($dataCenter_id > $this->maxDataCenterId) {
            throw new \Exception('数据中心编号取值范围为:0-' . $this->maxDataCenterId);
        }
        if ($machine_id > $this->maxMachineId) {
            throw new \Exception('机器编号编号取值范围为:0-' . $this->maxMachineId);
        }
        $this->data_center_id = $dataCenter_id;
        $this->machine_id = $machine_id;
    }

    /**
     * 使用雪花算法生成一个唯一ID
     * @return string 生成的ID
     * @throws \Exception
     */
    public function generateID()
    {
        $sign = 0; //符号位,值始终为0
        $timestamp = $this->getUnixTimestamp();
        if ($timestamp < $this->lastTimestamp) {
            throw new \Exception('时间倒退了!');
        }

        //与上次时间戳相等,需要生成序列号.不相等则重置序列号
        if ($timestamp == $this->lastTimestamp) {
            $sequence = ++$this->sequence;
            if ($sequence == $this->maxSequenceId) { //如果序列号超限，则需要重新获取时间
                $timestamp = $this->getUnixTimestamp();
                while ($timestamp <= $this->lastTimestamp) {    //时间相同则阻塞
                    $timestamp = $this->getUnixTimestamp();
                }
                $this->sequence = 0;
                $sequence = ++$this->sequence;
            }
        } else {
            $this->sequence = 0;
            $sequence = ++$this->sequence;
        }

        $this->lastTimestamp = $timestamp;
        $time = (int)($timestamp - self::EPOCH_OFFSET);
        $id = ($sign << $this->signLeftShift) | ($time << $this->timestampLeftShift) | ($this->data_center_id << $this->dataCenterLeftShift) | ($this->machine_id << $this->machineLeftShift) | $sequence;

        return (string)$id;
    }

    /**
     * 获取去当前时间戳
     *
     * @return integer 毫秒级别的时间戳
     */
    private function getUnixTimestamp()
    {
        return floor(microtime(true) * 1000);
    }   

    public function index(Request $request,$id){
        // 接受传过来的值
        $fef_id = $request->get("fef_id");

        $cart_id = explode(',',$id);

        //根绝传过来的收货地址id获取到一条数据 来进行用那条收货地址进行下单
        $fefinfo = DefaultModel::where('fef_id',$fef_id)->first();
        // dd($fefinfo);

    	// 取出登录的用户
    	$user_id = session("User_Info")['user_id'];

    	//地址表
    	$defaultwhere = [
    		'user_id'=>$user_id,
    		'is_del'=>1,
    	];
    	$defaultinfo = DefaultModel::where($defaultwhere)->get();
//        dd($defaultinfo);
    	// 查询购物车数据   接受购物车传过来的值
    	// $cart_id = request()->post("cart_id");
//    	$cart_id =request()->get('car_id');
//
//        dd($cart_id);
    	// dd($cartwhere);
    	$cartinfo = CartModel::where('user_id',$user_id)->whereIn('car_id',$cart_id)->leftjoin("shop_goods","shop_cart.goods_id","=","shop_goods.goods_id")->get();
//        dd($cartinfo);

    	//循环获取总价
    	$price = 0;
    	//总商品数量
    	$numbers = 0;
        //求总共多少积分 + 总共优惠多少
        $integral=0;
        $coupon = 0;
    	foreach($cartinfo as $k=>$v){
    		$price += $v['car_num']*$v['goods_price'];
    		$numbers += $v['car_num'];
            $integral += $v['goods_integral']*$v['car_num'];
            $coupon += $v['goods_coupon']*$v['car_num'];
    	}
        // dd($integral);
    	// dd($numbers);


        // 满减
        // 重新获取满减
        //满减规则
        if($price>=100&&$price<200){
            $less_price = 10;
        }else if($price>=200&&$price<500){
            $less_price = 25;
        }else if($price>=500&&$price<600){
            $less_price = 50;
        }else if($price>=600&&$price<700){
            $less_price = 65 ;
        }else if($price>=700&&$price<3000){
            $less_price = 85;
        }else if($price>=3000&&$price<5000){
            $less_price=120;
        }else if($price>=5000&&$price<8000){
            $less_price=150;
        }else if($price>=8000&&$price<10000){
            $less_price=200;
        }else if($price>10000){
            $less_price=300;
        }else{
            $less_price=0;
        }

    	//收货地址飙获取到默认收货地址数据、
    	$defwhere = [
    		'user_id'=>$user_id,
    		'fef_is_more'=>1
    	];
    	$defmo = DefaultModel::where($defwhere)->first();
    	// dd($defmo);
         //满减后 + 优惠价后的 实际付款价格
        $manjianprice = $price-$less_price;
        //重新计算应付金额
        $yingfunumber = $manjianprice-$coupon;
        
        // dd($yingfunumber);
        $cart_id = json_encode($cart_id);

    	return view("index.order.orderinfo",["car_id"=>$cart_id,"less_price"=>$less_price,"manjianprice"=>$manjianprice,"yingfunumber"=>$yingfunumber,"integral"=>$integral,'coupon'=>$coupon,'fefinfo'=>$fefinfo,'defaultinfo'=>$defaultinfo,'cartinfo'=>$cartinfo,'price'=>$price,'numbers'=>$numbers,'defmo'=>$defmo]);
    }


    //逻辑删除
    public function del($id){
    	$user_id  = session("User_Info")['user_id'];
    	$where = [
    		'fef_id'=>$id,
    	];
    	$res = DefaultModel::where($where)->update(['is_del'=>2]);
    	if($res){
    		return redirect("/index/orderinfo");
    	}else{
    		return redirect("/index/orderinfo");
    	}
    }



    public function tijiao(){
        // dd("123");
        $car_id = request()->post('car_id');
//        dd($car_id);
        $cart_id = json_decode($car_id);
//         dd($cart_id);
        $order_number = $this->generateID();
        // dd($order_number);
            // 取出登录的用户
        $user_id = session("User_Info")['user_id'];
        $cartinfo = CartModel::where('user_id',$user_id)->wherein('car_id',$cart_id)->leftjoin("shop_goods","shop_cart.goods_id","=","shop_goods.goods_id")->get();
        // dd($cartinfo);
        //收货地址飙获取到默认收货地址数据、
        $defwhere = [
            'user_id'=>$user_id,
            'fef_is_more'=>1
        ];
        $defmo = DefaultModel::where($defwhere)->first();
        //循环获取总价
        // dd($defmo);
        $price = 0;
        //总商品数量
        $numbers = 0;
        //求总共多少积分 + 总共优惠多少
        $integral=0;
        $coupon = 0;
        foreach($cartinfo as $k=>$v){
            $price += $v['car_num']*$v['goods_price'];
            $numbers += $v['car_num'];
            $integral += $v['goods_integral']*$v['car_num'];
            $coupon += $v['goods_coupon']*$v['car_num'];
        }
            // dd($price);
          
            foreach ($cartinfo as $k => $v) {

            // 将数据存入订单商品表
            $wheress = [
                'goods_id' => $v->goods_id,
                'user_id' => $user_id,
            ];
//                dd($wheress);
            // dd($v->$ordergoodstime);
            $order_goods_info = OrderGoodsModel::where($wheress)->get();
//                dd($order_goods_info);
            if (!empty($order_goods_info)) {
                if (time()-$v->ordergoodstime < 3000) {

                    foreach ($order_goods_info as $kkk => $vvv) {
                        $orderinfo = OrderModel::where('order_number', $vvv->order_number)->get();
                        // return redirect("/index/ali/".$orderinfo->order_id);
                        foreach ($orderinfo as $k => $v) {
                            session(['order_id' => ['order_id' => $v->order_id, 'user_id' => $user_id]]);
                            return ['code' => 1];
                        }
                    }
                } else {
                    // 已过期重新添加数据
                    $ordergoods = new OrderGoodsModel();
                    $ordergoods->user_id = $user_id;
                    $ordergoods->buy_number = $numbers;
                    $ordergoods->goods_id = $v->goods_id;
                    $ordergoods->goods_name = $v->goods_name;
                    $ordergoods->ordergoodstime = time();
                    $ordergoods->order_number = $order_number;
                    $ordergoods->save();

                    // 将数据存入订单商品表
                    // $ordergoods = new OrderModel();
                    $order = new OrderModel();
                    $order->user_id = $user_id;
                    $order->order_status = 0;
                    $order->order_time = time();
                    $order->order_number = $order_number;
                    $order->order_num = $numbers;
                    $order->order_url = $defmo->fef_id;
                    $order->goods_price = $price;
                    $res = $order->save();
                    $id = $order->order_id;
                    if ($res) {
                        session(['order_id' => ['order_id' => $id, 'user_id' => $user_id]]);
                        return ['code' => 1];
                    } else {
                        echo "提交失败";
                    }
                }
            } else {
                $ordergoods = new OrderGoodsModel();
                $ordergoods->user_id = $user_id;
                $ordergoods->buy_number = $numbers;
                $ordergoods->goods_name = $v->goods_name;
                $ordergoods->goods_id = $v->goods_id;
                $ordergoods->ordergoodstime = time();
                $ordergoods->order_number = $order_number;
                $ordergoods->save();

                // 将数据存入订单商品表
                // $ordergoods = new OrderModel();
                $order = new OrderModel();
                $order->user_id = $user_id;
                $order->order_status = 0;
                $order->order_time = time();
                $order->order_number = $order_number;
                $order->order_num = $numbers;
                $order->order_url = $defmo->fef_id;
                $order->goods_price = $price;
                $res = $order->save();

                $id = $order->order_id;
//                 dd($id);
                if ($res) {
                    session(['order_id' => ['order_id' => $id, 'user_id' => $user_id]]);
                    return ['code' => 1];
                } else {
                    echo "提交失败";
                }
            }
        }
    }

<<<<<<< HEAD
 }
=======

>>>>>>> 862be2ba7c6232bd537de7d8b1f59ec9e0bf4131
}
