
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>结算页</title>

    <link rel="stylesheet" type="text/css" href="/indexshop/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-getOrderInfo.css" />
</head>

<body>
	<!--head-->
	<div class="top">
		<div class="py-container">
			<div class="shortcut">
				<ul class="fl">
					<li class="f-item">品优购欢迎您！</li>
					@if(session()->has("User_Info"))
                            欢迎<b><span style="color:red">{{session("User_Info")['user_name']}}</span></b>登录
                            @else
                            <li class="f-item">请<a href="{{url('/index/login')}}" target="_blank">登录</a>　<span><a href="{{url('/index/reg')}}" target="_blank">免费注册</a></span></li>
                            @endif
				</ul>
				<ul class="fr">
					<li class="f-item">我的订单</li>
					<li class="f-item space"></li>
					<li class="f-item"><a href="{{url('/index/home')}}" target="_blank">我的品优购</a></li>
					<li class="f-item space"></li>
					<li class="f-item">品优购会员</li>
					<li class="f-item space"></li>
					<li class="f-item">企业采购</li>
					<li class="f-item space"></li>
					<li class="f-item">关注品优购</li>
					<li class="f-item space"></li>
					<li class="f-item">客户服务</li>
					<li class="f-item space"></li>
					<li class="f-item">网站导航</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">结算页</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--主内容-->
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit">
					<h5>收件人信息<span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<li class="addr-item">
							
							 
							 @foreach($defaultinfo as $k=>$v)
							  
							  <div>

								<div class="con name" name="dizhi" value="{{$v->fef_is_more}}" ><a href="javascript:;">{{$v->user_name}}<span title="点击取消选择">&nbsp;</a></div>
								<div class="con address zbc" fef_id="{{$v->fef_id}}" >{{$v->user_name}} {{$v->province}}  {{$v->city}}  {{$v->area}} {{$v->minute}}  <span>{{$v->user_tel}}</span>
								<span class="edittext"><a data-toggle="modal" data-target=".edit"  data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="{{url('/index/order/del/'.$v->fef_id)}}">删除</a>
									@if($v->fef_is_more==2)
										<a data-toggle="modal"   data-keyboard="fuck" >使用该地址</a>
                                        <a data-toggle="modal"   data-keyboard="false" >设为默认地址</a>
									
										
									@endif
								</span>
								
								</div>
								<div class="clearfix"></div>

							  </div>

							  @endforeach
							</li>
							
							
						</ul>
						<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						      	<form action="" class="sui-form form-horizontal">
						      		 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   
									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" class="input-large">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">邮箱：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">地址别名：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									    <div class="othername">
									    	建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									    </div>
									  </div>
									  
						      	</form>
						      	
						      	
						      </div>
						      <div class="modal-footer">
						        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						      </div>
						    </div>
						  </div>
						</div>
						 <!--确认地址-->
					</div>
					<div class="hr"></div>
					
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<div class="step-tit">
						<h5>支付方式</h5>
					</div>
					<div class="step-cont">
						<ul class="payType">
							<li class="selected">支付宝付款<span title="点击取消选择"></span></li>
							<!-- <li class="selected">微信付款<span title="点击取消选择"></span></li>
							<li>货到付款<span title="点击取消选择"></span></li> -->
						</ul>
					</div>
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							@foreach($cartinfo as $k=>$v)
							<li>
								
								<div class="sendGoods">
									
									<ul class="yui3-g">
										<li class="yui3-u-1-6">
											<span>`<img src="{{env('/APP_URL')}}{{$v->goods_img}}"/></span>
										</li>
										<li class="yui3-u-7-12">
											<div class="desc">{{$v->goods_name}}</div>
											<div class="seven">7天无理由退货</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">￥{{$v->goods_price}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X{{$v->car_num}}</div>
										</li>
										<li class="yui3-u-1-12">
											@if($v->goods_store>0)
											<div class="exit">有货</div>
											@else
											<div class="exit">无货</div>
											@endif
										</li>
									</ul>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="hr"></div>
				</div>
				<div class="linkInfo">
					<div class="step-tit">
						<h5>发票信息</h5>
					</div>
					<div class="step-cont">
						<span>普通发票（电子）</span>
						<span>个人</span>
						<span>明细</span>
					</div>
				</div>
				<div class="cardInfo">
					<div class="step-tit">
						<h5>使用优惠/抵用</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">
					<span><i class="number">{{$numbers}}</i>件商品，总商品金额</span>
					<em class="allprice">¥{{$price}}</em>
				</div>
				<div class="list">
					<span>优惠券：</span>
					<em class="money">-{{$coupon}}</em>
				</div>
				<div class="list">
					<span>满减：</span>
					<em class="transport">-{{$less_price}}</em>
				</div>
				<div class="list">
					<span>积分：</span>
					<em class="transport">{{$integral}}</em>
				</div>
			</div>
		</div>
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="price">¥{{$yingfunumber}}</span></div>
			<div class="fc-receiverInfo">寄送至:{{$defmo->province}} {{$defmo->city}} {{$defmo->area}} {{$defmo->minute}} 收货人 :{{$defmo->user_name}} {{$defmo->user_tel}}</div>
		</div>
		<div class="submit">
			<button class="sui-btn btn-danger tijiaobutton  btn-xlarge" car_id="{{$car_id}}">提交订单</button>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
<div class="clearfix footer">
	<div class="py-container">
		<div class="footlink">
			<div class="Mod-service">
				<ul class="Mod-Service-list">
					<li class="grid-service-item intro  intro1">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro2">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro  intro3">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro4">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro intro5">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
				</ul>
			</div>
			<div class="clearfix Mod-list">
				<div class="yui3-g">
					<div class="yui3-u-1-6">
						<h4>购物指南</h4>
						<ul class="unstyled">
							<li>购物流程</li>
							<li>会员介绍</li>
							<li>生活旅行/团购</li>
							<li>常见问题</li>
							<li>购物指南</li>
						</ul>

					</div>
					<div class="yui3-u-1-6">
						<h4>配送方式</h4>
						<ul class="unstyled">
							<li>上门自提</li>
							<li>211限时达</li>
							<li>配送服务查询</li>
							<li>配送费收取标准</li>
							<li>海外配送</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>支付方式</h4>
						<ul class="unstyled">
							<li>货到付款</li>
							<li>在线支付</li>
							<li>分期付款</li>
							<li>邮局汇款</li>
							<li>公司转账</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>售后服务</h4>
						<ul class="unstyled">
							<li>售后政策</li>
							<li>价格保护</li>
							<li>退款说明</li>
							<li>返修/退换货</li>
							<li>取消订单</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>特色服务</h4>
						<ul class="unstyled">
							<li>夺宝岛</li>
							<li>DIY装机</li>
							<li>延保服务</li>
							<li>品优购E卡</li>
							<li>品优购通信</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>帮助中心</h4>
						<img src="/indexshop/img/wx_cz.jpg">
					</div>
				</div>
			</div>
			<div class="Mod-copyright">
				<ul class="helpLink">
					<li>关于我们<span class="space"></span></li>
					<li>联系我们<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>商家入驻<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们</li>
				</ul>
				<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
				<p>京ICP备08001421号京公网安备110108007702</p>
			</div>
		</div>
	</div>
</div>
<!--页面底部END-->

<script type="text/javascript" src="/indexshop/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/indexshop/js/widget/nav-portal-top.js"></script>
<script type="text/javascript" src="/indexshop/js/pages/getOrderInfo.js"></script>
</body>
<script>
	$(document).ready(function(){
//        let _val=$('div[class="con name"]').attr('value');
////        console.log(_val);
//        if(_val==1){
//            $('div[name="dizhi"]').attr('value="1"').prop('class="con name selected"');
//
//        }
	});
</script>
<script>
	// $(document).on("click","#zbc",function(){
	// 	var fef_id = $(this).attr("fef_id")
	// 	alert(fef_id)
	// })
	$(".tijiaobutton").click(function(){
		//点击提交订单按钮
		var car_id = $(this).attr('car_id');
		
		// $.get("/orderinfo/tijiao",{car_id:car_id},function(){
		// 	alert(res)
		// });
		$.ajax({
			url:"/orderInfo/tijiao",
			type:"post",
			data:{car_id:car_id},
			success:function(res){
                return ;
				if(res.code=1){
					location.href="/index/ali";
				}else{
					alert('提交错误，请稍后再试');
				}

			}
		});
	});
	$(".zbc").mousedown(function(){
		var fef_id = $(this).attr("fef_id")
		$.ajax({
			type:'get',
			url:"{{url('/index/orderinfo')}}",
			data:{fef_id:fef_id},
			success:function(res){
				alert(res);
			}
		})
	})
</script>
</html>