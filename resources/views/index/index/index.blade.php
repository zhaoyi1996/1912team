
@extends("layouts.index")
@section("title",'首页')
@section('content')


	<!--列表-->
	<div class="sort">
		<div class="py-container">
			<div class="yui3-g SortList ">
				<div class="yui3-u Left all-sort-list">
					<div class="all-sort-list2">
					@foreach($res as $v)
						<div class="item bo">
							<h3><a href="{{url('/index/search?cate_id='.$v['cate_id'])}}">{{$v['cate_name']}}</a></h3>
							<div class="item-list clearfix">
							
								<div class="subitem">
									@foreach($v['son'] as $vv)
									<dl class="fore1">
										<dt><a href="{{url('/index/search?cate_id='.$v['cate_id'])}}">{{$vv['cate_name']}}</a></dt>
										@foreach($vv['son'] as $vvv)
										<dd><a href="{{url('/index/search?cate_id='.$v['cate_id'])}}">{{$vvv['cate_name']}}</a></em></dd>
										@endforeach
									</dl>
								    @endforeach
								</div>
								
							</div>
						</div>
					@endforeach
					</div>
				</div>
				<div class="yui3-u Center banerArea">
					<!--banner轮播-->
					<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
						  <li data-target="#myCarousel" data-slide-to="3"></li>
						  <li data-target="#myCarousel" data-slide-to="4"></li>
					  </ol>
					  <div class="carousel-inner"  style="position:relative;height:450px;width:600px" >
						  @foreach($slide as $k=>$v)
							  @if($k==0)
					    <div class="active item"  style="position:relative;height:450px;width:600px">
					    <a href="{{url('/index/item/1/')}}">
					    	<img src="{{env('UPLOADS_URL')}}{{$v->sl_log}}" style="width:600px;hight:500px" />
					      </a>
					    </div>
					    @else
						<div class="item"  style="width:720px;hight:800px">
						 <a href="{{url('index/item/16/')}}">
						<img src="{{env('UPLOADS_URL')}}{{$v->sl_log}}" style="width:600px;hight:500px"   />
					     </a>
					    </div>
							  @endif
						@endforeach
					  </div><a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a><a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
					</div>
				</div>
				<div class="yui3-u Right">
					<div class="news">
						<h4><em class="fl">品优购快报</em><span class="fr tip">更多 ></span></h4>
						<div class="clearix">
								<ul class="news-list unstyled">
									@foreach($res2 as $v)


										<li>
									<span class="bold">[{{$v->an_name}}]</span><a href="#">{{$v->an_desc}}</a>
										</li>

									@endforeach
								</ul>
						</div>
					</div>
					<ul class="yui3-g Lifeservice">
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-1"></i>
							<span class="service-intro">话费</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-2"></i>
							<span class="service-intro">机票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-3"></i>
							<span class="service-intro">电影票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-4"></i>
							<span class="service-intro">游戏</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-5"></i>
							<span class="service-intro">彩票</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-6"></i>
							<span class="service-intro">加油站</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-7"></i>
							<span class="service-intro">酒店</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-8"></i>
							<span class="service-intro">火车票</span>
						</li>
						<li class="yui3-u-1-4 life-item  notab-item">
							<i class="list-item list-item-9"></i>
							<span class="service-intro">众筹</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-10"></i>
							<span class="service-intro">理财</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-11"></i>
							<span class="service-intro">礼品卡</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-12"></i>
							<span class="service-intro">白条</span>
						</li>
					</ul>
					<div class="life-item-content">
						<div class="life-detail">
							<i class="close">关闭</i>
							<p>话费充值</p>
							<form action="" class="sui-form form-horizontal">
								号码：<input type="text" id="inputphoneNumber" placeholder="输入你的号码" />
							</form>
							<button class="sui-btn btn-danger">快速充值</button>
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 机票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 电影票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 游戏
						</div>
					</div>
					<div class="ads">
						<a href="{{$ladver_data->la_url}}"><img src="{{env('APP_URL')}}{{$ladver_data->la_img}}" width="160px"  /></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--推荐-->
	<div class="show">
		<div class="py-container">
			<ul class="yui3-g Recommend">
				<li class="yui3-u-1-6  clock">
					<div class="time">
						<img src="/indexshop/img/clock.png" />
						<h3>今日推荐</h3>
					</div>
				</li>
				@foreach($recom_data as $v)
				<li class="yui3-u-5-24">
					<a href="{{url('/index/item/'.$v->goods_id)}}" target="_blank"><img src="{{env('APP_URL')}}{{$v->goods_img}}"  width="160" height="163"/></a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!--喜欢-->
	<div class="like">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">猜你喜欢</h3>
				<b class="border"></b>
				<a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
			</div>
			<div class="bd">
				<ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
					@foreach($goods as $k=>$v)
					<li class="yui3-u-1-6">
						<dl class="picDl huozhe">
							<dd>
								<a href="{{url('/index/item/'.$v->goods_id)}}" class="pic"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="200" height="200" alt="" /></a>
								<div class="like-text">
									<p>{{$v->goods_name}}</p>
									<h3>¥{{$v->goods_price}}</h3>
								</div>
							</dd>
						</dl>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<!--有趣-->
	<div class="fun">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">传智播客.有趣区</h3>
			</div>
			<div class="clearfix yui3-g Interest">
				<span class="x-line"></span>
				<div class="yui3-u row-405 Interest-conver">
					<img src="/indexshop/img/interest01.png" />
				</div>
				<div class="yui3-u row-225 Interest-conver-split">
					<h5>好东西</h5>
					<img src="/indexshop/img/interest02.png" />
					<img src="/indexshop/img/interest03.png" />
				</div>
				<div class="yui3-u row-405 Interest-conver-split blockgary">
					<h5>品牌街</h5>
					<div class="split-bt">
						<img src="/indexshop/img/interest04.png" />
					</div>
					<div class="x-img fl">
						<img src="/indexshop/img/interest05.png" />
					</div>
					<div class="x-img fr">
						<img src="/indexshop/img/interest06.png" />
					</div>
				</div>
				<div class="yui3-u row-165 brandArea">
					<span class="brand-yline"></span>
					<ul class="yui3-g brand-list">
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand01.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand02.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand03.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand04.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand05.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand06.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand07.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand08.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand09.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand10.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand11.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand12.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand13.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/indexshop/img/brand03.png" /></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--楼层-->

	<div id="floor-2" class="floor">
		@foreach($cate as $v)
		<div class="py-container">
				<div class="title floors">
					<h3 class="fl">{{$v->cate_name}}</h3>
					<div class="fr">
						<ul class="sui-nav nav-tabs">
							<li class="active">
								<a href="#tab1" data-toggle="tab">热门</a>
							</li>
							@foreach($tao_2ji[$v->cate_id] as $vv)
								<li>
									<a href="{{url('/index/search/'.$v['cate_id'])}}">{{$vv['cate_name']}}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

			<div class="clearfix  tab-content floor-content">
				<div id="tab8" class="tab-pane active">
					<div class="yui3-g Floor-1">
						
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousell" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousell" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousell" data-slide-to="1"></li>
									<li data-target="#floorCarousell" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/indexshop/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/indexshop/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/indexshop/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousell" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousell" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/indexshop/img/floor-1-2.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/indexshop/img/floor-1-3.png" />
							</div>
						</div>
						<div class="yui3-u row-218 split">
							<img src="/indexshop/img/floor-1-4.png" />
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/indexshop/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/indexshop/img/floor-1-6.png" />
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab9" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab10" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab11" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab12" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab13" class="tab-pane">
					<p>第7个</p>
				</div>
				<div id="tab14" class="tab-pane">
					<p>第8个</p>
				</div>
			</div>

		</div>
		@endforeach
	</div>
	<!--商标-->
	<div class="brand">
		<div class="py-container">
			<ul class="Brand-list blockgary">
				@foreach($brand_data as $v)
				<li class="Brand-item">
					<a href="{{$v->brand_url}}"><img src="{{env('APP_URL')}}{{$v->brand_img}}" width="220" /></a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- 底部栏位 -->
	
	<!-- 楼层位置 -->
	{{--<div id="floor-index" class="floor-index">--}}
		{{--<ul>--}}
			{{--<li>--}}
				{{--<a class="num" href="javascript:;" style="display: none;">1F</a>--}}
				{{--<a class="word" href="javascript;;" style="display: block;">家用电器</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a class="num" href="javascript:;" style="display: none;">2F</a>--}}
				{{--<a class="word" href="javascript;;" style="display: block;">手机通讯</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a class="num" href="javascript:;" style="display: none;">3F</a>--}}
				{{--<a class="word" href="javascript;;" style="display: block;">电脑办公</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a class="num" href="javascript:;" style="display: none;">4F</a>--}}
				{{--<a class="word" href="javascript;;" style="display: block;">家居家具</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a class="num" href="javascript:;" style="display: none;">5F</a>--}}
				{{--<a class="word" href="javascript;;" style="display: block;">运动户外</a>--}}
			{{--</li>--}}
		{{--</ul>--}}
	{{--</div>--}}
	<!--侧栏面板开始-->
<div class="J-global-toolbar">
	<div class="toolbar-wrap J-wrap">
		<div class="toolbar">
			<div class="toolbar-panels J-panel">

				<!-- 购物车 -->
				<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="/index/cate" class="title"><i></i><em class="title">购物车</em></a>
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
							<a class="jtc-btn J-btn" href="/index/cart" target="_blank">去购物车结算</a>
						</div>
					</div>
				</div>

				<!-- 我的关注 -->
				<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="/index/homePersonCollect" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
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
						<a href="/index/homePersonFootmark" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
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
				<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
			</div>

			<div class="toolbar-footer">
				<div class="toolbar-tab tbar-tab-top" > <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
				<div class="toolbar-tab tbar-tab-feedback" > <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
			</div>

			<div class="toolbar-mini"></div>

		</div>

		<div id="J-toolbar-load-hook"></div>

	</div>
</div>

@endsection