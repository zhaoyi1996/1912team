
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<title>产品列表页</title>
		<link rel="icon" href="assets//indexshop/img/favicon.ico">

		<link rel="stylesheet" type="text/css" href="/indexshop/css/webbase.css" />
		<link rel="stylesheet" type="text/css" href="/indexshop/css/pages-list.css" />
		<link rel="stylesheet" type="text/css" href="/indexshop/css/widget-cartPanelView.css" />
	</head>

	<body>
		<!-- 头部栏位 -->
		<!--页面顶部-->
		<div id="nav-bottom">
			<!--顶部-->
			<div class="nav-top">
				<div class="top">
					<div class="py-container">
						<div class="shortcut">
							<ul class="fl">
								<li class="f-item">品优购欢迎您！</li>
								<li class="f-item">请
									<a href="/index/login" target="_blank">登录</a>　<span><a href="/index/register" target="_blank">免费注册</a></span></li>
							</ul>
							<ul class="fr">
								<li class="f-item">我的订单</li>
								<li class="f-item space"></li>
								<li class="f-item">
									<a href="home.html" target="_blank">我的品优购</a>
								</li>
								<li class="f-item space"></li>
								<li class="f-item">品优购会员</li>
								<li class="f-item space"></li>
								<li class="f-item">企业采购</li>
								<li class="f-item space"></li>
								<li class="f-item">关注品优购</li>
								<li class="f-item space"></li>
								<li class="f-item" id="service">
									<span>客户服务</span>
									<ul class="service">
										<li>
											<a href="/index/cooperation" target="_blank">合作招商</a>
										</li>
										<li>
											<a href="/index/shoplogin" target="_blank">商家后台</a>
										</li>
										<li>
											<a href="/index/cooperation" target="_blank">合作招商</a>
										</li>
										<li>
											<a href="#">商家后台</a>
										</li>
									</ul>
								</li>
								<li class="f-item space"></li>
								<li class="f-item">网站导航</li>
							</ul>
						</div>
					</div>
				</div>

				<!--头部-->
				<div class="header">
					<div class="py-container">
						<div class="yui3-g Logo">
							<div class="yui3-u Left logoArea">
								<a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
							</div>
							<div class="yui3-u Center searchArea">
								<div class="search">
									<form action="" class="sui-form form-inline">
										<!--searchAutoComplete-->
										<div class="input-append">
											<input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
											<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
										</div>
									</form>
								</div>
								<div class="hotwords">
									<ul>
										<li class="f-item">品优购首发</li>
										<li class="f-item">亿元优惠</li>
										<li class="f-item">9.9元团购</li>
										<li class="f-item">每满99减30</li>
										<li class="f-item">亿元优惠</li>
										<li class="f-item">9.9元团购</li>
										<li class="f-item">办公用品</li>

									</ul>
								</div>
							</div>
							<div class="yui3-u Right shopArea">
								<div class="fr shopcar">
									<div class="show-shopcar" id="shopcar">
										<span class="car"></span>
										<a class="sui-btn btn-default btn-xlarge" href="/index/cate" target="_blank">
											<span>我的购物车</span>
											<i class="shopnum">0</i>
										</a>
										<div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
											<p>"啊哦，你的购物车还没有商品哦！"</p>
											<p>"啊哦，你的购物车还没有商品哦！"</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="yui3-g NavList">
							<div class="yui3-u Left all-sort">
								<h4>全部商品分类</h4>
							</div>
							<div class="yui3-u Center navArea">
								<ul class="nav">
									@foreach($cate as $v)
									<li class="f-item">{{$v->cate_name}}</li>
									@endforeach
									<li class="f-item">团购</li>
									<li class="f-item">
										<a href="seckill-index.html" target="_blank">秒杀</a>
									</li>
								</ul>
							</div>
							<div class="yui3-u Right"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	<!--list-content-->
	<div class="main">
		<div class="py-container">
			<!--bread-->
			<div class="bread">
				<ul class="fl sui-breadcrumb">
					<li>
						<a href="#">全部结果</a>
					</li>					
					<li class="active">智能手机</li>					
				</ul>
				<ul class="tags-choose">
					<li class="tag">全网通<i class="sui-icon icon-tb-close"></i></li>
					<li class="tag">63G<i class="sui-icon icon-tb-close"></i></li>
				</ul>
				<form class="fl sui-form form-dark">
					<div class="input-control control-right">
						<input type="text" />
						<i class="sui-icon icon-touch-magnifier"></i>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<!--selector-->
			<div class="clearfix selector">
				
				<div class="type-wrap logo">
					<div class="fl key brand">品牌</div>
					@foreach($array as $v)
					<div class="value logos">
						<ul class="logo-list">
							<li><a href=""><img src="{{env('APP_URL')}}{{$v}}" style="{width:60px;hight:30px;}"></a> </li>
						</ul>
					
					</div>
					@endforeach
					<div class="ext">
						<a href="javascript:void(0);" class="sui-btn">多选</a>
						<a href="javascript:void(0);">更多</a>
					</div>
				</div>
				<div class="type-wrap">
					<div class="fl key">价格</div>
					@foreach($price_qujian as $vv)
					<div class="fl value">
					
						<ul class="type-list">
					    
							<li>
								<a>{{$vv}}</a>
							</li>

						</ul>
					
					</div>
					@endforeach
					<div class="fl ext"></div>
				</div>
			
			</div>
			<!--details-->
			<div class="details">
				<div class="sui-navbar">
					<div class="navbar-inner filter">
						<ul class="sui-nav">

							<li class="active">
								<a href="#">综合</a>
							</li>
				
							<li>
								<a href="#">销量</a>
							</li>

							<li>
								<a href="#">新品</a>
							</li>

							<li>
								<a href="#">评价</a>
							</li>
							<li>
								<a href="#">价格</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="goods-list">
					<ul class="yui3-g">
						
						<li class="yui3-u-1-5" id="1">
							<div class="list-wrap">
								<div class="p-img">
									<a href="item.html" target="_blank"><img src="/indexshop/img/_/mobile01.png" /></a>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i></i>
										</strong>
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
								</div>
								<div class="cu">
									<em><span>促</span>满一件可参加超值换购</em>
								</div>
								<div class="commit">
									<i class="command">已有2000人评价</i>
								</div>
								<div class="operate">
									<a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
									<a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
									<a href="javascript:void(0);" class="sui-btn btn-bordered" id="collect">收藏</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="fr page">
					<div class="sui-pagination pagination-large">
						<ul>
							<li class="prev disabled">
								<a href="#">«上一页</a>
							</li>
							<li class="active">
								<a href="#">1</a>
							</li>
							<li>
								<a href="#">2</a>
							</li>
							<li>
								<a href="#">3</a>
							</li>
							<li>
								<a href="#">4</a>
							</li>
							<li>
								<a href="#">5</a>
							</li>
							<li class="dotted"><span>...</span></li>
							<li class="next">
								<a href="#">下一页»</a>
							</li>
						</ul>
						<div><span>共10页&nbsp;</span><span>
      到第
      <input type="text" class="page-num">
      页 <button class="page-confirm" onclick="alert(1)">确定</button></span></div>
					</div>
				</div>
			</div>
			<!--hotsale-->
			<div class="clearfix hot-sale">
				<h4 class="title">热卖商品</h4>
				<div class="hot-list">
					<ul class="yui3-g">
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/indexshop/img/like_01.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/indexshop/img/like_03.png" />
								</div>
								<div class="attr">
									<em>金属A面，360°翻转，APP下单省300！</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/indexshop/img/like_04.png" />
								</div>
								<div class="attr">
									<em>256SSD商务大咖，完爆职场，APP下单立减200</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4068.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有20人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/indexshop/img/like_02.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
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
	<!--侧栏面板开始-->
	<div class="J-global-toolbar">
		<div class="toolbar-wrap J-wrap">
			<div class="toolbar">
				<div class="toolbar-panels J-panel">

					<!-- 购物车 -->
					<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
						<h3 class="tbar-panel-header J-panel-header">
						<a href="" class="title"><i></i><em class="title">购物车</em></a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');" ></span>
					</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div id="J-cart-tips" class="tbar-tipbox hide">
									<div class="tip-inner">
										<span class="tip-text">还没有登录，登录后商品将被保存</span>
										<a href="#none" class="tip-btn J-login">登录</a>
									</div>
								</div>
								<div id="J-cart-render">
									<!-- 列表 -->
									<div id="cart-list" class="tbar-cart-list">
									</div>
								</div>
							</div>
						</div>
						<!-- 小计 -->
						<div id="cart-footer" class="tbar-panel-footer J-panel-footer">
							<div class="tbar-checkout">
								<div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>
								<div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>
								<a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>
							</div>
						</div>
					</div>

					<!-- 我的关注 -->
					<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
						<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
					</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div class="tbar-tipbox2">
									<div class="tip-inner"> <i class="i-loading"></i> </div>
								</div>
							</div>
						</div>
						<div class="tbar-panel-footer J-panel-footer"></div>
					</div>

					<!-- 我的足迹 -->
					<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
						<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
					</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div class="jt-history-wrap">
									<ul>
										<!--<li class="jth-item">
										<a href="#" class="img-wrap"> <img src=".portal//indexshop/img/like_03.png" height="100" width="100" /> </a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>
									<li class="jth-item">
										<a href="#" class="img-wrap"> <img src="portal//indexshop/img/like_02.png" height="100" width="100" /></a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>-->
									</ul>
									<a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
								</div>
							</div>
						</div>
						<div class="tbar-panel-footer J-panel-footer"></div>
					</div>

				</div>

				<div class="toolbar-header"></div>

				<!-- 侧栏按钮 -->
				<div class="toolbar-tabs J-tab">
					<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
				</div>

				<div class="toolbar-footer">
					<div class="toolbar-tab tbar-tab-top">
						<a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a>
					</div>
					<div class="toolbar-tab tbar-tab-feedback">
						<a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a>
					</div>
				</div>

				<div class="toolbar-mini"></div>

			</div>

			<div id="J-toolbar-load-hook"></div>

		</div>
	</div>
	<!--购物车单元格 模板-->
	<script type="text/template" id="tbar-cart-item-template">
		<div class="tbar-cart-item">
			<div class="jtc-item-promo">
				<em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
				<div class="promo-text">已购满600元，您可领赠品</div>
			</div>
			<div class="jtc-item-goods">
				<span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
				<div class="p-name">
					<a href="#">{1}</a>
				</div>
				<div class="p-price"><strong>¥{3}</strong>×{4} </div>
				<a href="#none" class="p-del J-del">删除</a>
			</div>
		</div>
	</script>
	<!--侧栏面板结束-->
		<script type="text/javascript" src="/indexshop/js/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$("#service").hover(function() {
					$(".service").show();
				}, function() {
					$(".service").hide();
				});
				$("#shopcar").hover(function() {
					$("#shopcarlist").show();
				}, function() {
					$("#shopcarlist").hide();
				});

			})
		</script>
		<script type="text/javascript" src="/indexshop/js/model/cartModel.js"></script>
		<script type="text/javascript" src="/indexshop/js/czFunction.js"></script>
		<script type="text/javascript" src="/indexshop/js/plugins/jquery.easing/jquery.easing.min.js"></script>
		<script type="text/javascript" src="/indexshop/js/plugins/sui/sui.min.js"></script>
		<script type="text/javascript" src="/indexshop/js/widget/cartPanelView.js"></script>
	</body>

</html>
<script>
	$(document).on("click","#collect",function(){
		//获取当前祖先级li标签里的自定义属性id
		var goods_id=$(this).parents("li").attr("id");
		// console.log(goods_id);
		//ajax 跳转地址 数据类型 数据值.接值方式
		$.ajax({
			url:"{{url('/index/collect')}}",
			data:{goods_id:goods_id},
			type:"post",
			dataType:"json",
			success:function(res){
				alert(res);
				// if(res.code=='111'){
				// 	alert(res.msg);
				// 	location.href=""
				// }else{
				// 	alert(res.msg);
				// }
			}
		})

	})
</script>