
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>品优购，优质！优质！</title>
	 <link rel="icon" href="/indexshop/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/indexshop/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/widget-jquery.autocomplete.css" />
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
						<li class="f-item">请<a href="login.html" target="_blank">登录</a>　<span><a href="register.html" target="_blank">免费注册</a></span></li>
					</ul>
					<ul class="fr">
						<li class="f-item">我的订单</li>
						<li class="f-item space"></li>
						<li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
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
								<li><a href="cooperation.html" target="_blank">合作招商</a></li>
								<li><a href="shoplogin.html" target="_blank">商家后台</a></li>
								<li><a href="cooperation.html" target="_blank">合作招商</a></li>
								<li><a href="#">商家后台</a></li>
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
					 
					@foreach($cate as $v)
						<ul class="nav">
							<li class="f-item">

								<a href="{{url('/index/search'.'?'.$v->cate_id)}}">{{$v->cate_name}}</a>
							
							</li>	
							
						</ul>
					@endforeach
						<ul class="nav">
							 <a href=""><li class="f-item">团购</li></a>
						</ul> 
						
					</div>
					<div class="yui3-u Right"></div>
				</div>
			</div>
		</div>
	</div>
</div>


	<!--列表-->
	<div class="sort">
		<div class="py-container">
			<div class="yui3-g SortList ">
				<div class="yui3-u Left all-sort-list">
					<div class="all-sort-list2">
						<div class="item bo">
							<h3><a href="">图书、音像、数字商品</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书</a></dt>
										<dd><a href="">免费</a><a href="">小说</a></em><a href="">励志与成功</a><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">家用电器</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书1</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
									<dl class="fore8">
										<dt>科技</dt>
										<dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
									</dl>
									<dl class="fore9">
										<dt>少儿</dt>
										<dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">手机、数码</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书2</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">电脑、办公</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书3</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
									<dl class="fore8">
										<dt>科技</dt>
										<dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
									</dl>
									<dl class="fore9">
										<dt>少儿</dt>
										<dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
									</dl>
									<dl class="fore10">
										<dt>教育</dt>
										<dd><em><a href="">教材教辅</a></em><em><a href="">考试</a></em><em><a href="">外语学习</a></em></dd>
									</dl>
									<dl class="fore11">
										<dt>其它</dt>
										<dd><em><a href="">英文原版书</a></em><em><a href="">港台图书</a></em><em><a href="">工具书</a></em><em><a href="">套装书</a></em><em><a href="">杂志/期刊</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">家居、家具、家装、厨具</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书4</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
									<dl class="fore8">
										<dt>科技</dt>
										<dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
									</dl>
									<dl class="fore9">
										<dt>少儿</dt>
										<dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">服饰内衣</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书5</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
									<dl class="fore8">
										<dt>科技</dt>
										<dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">个护化妆</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书6</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
									<dl class="fore8">
										<dt>科技</dt>
										<dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
									</dl>
									<dl class="fore9">
										<dt>少儿</dt>
										<dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
									</dl>
									<dl class="fore10">
										<dt>教育</dt>
										<dd><em><a href="">教材教辅</a></em><em><a href="">考试</a></em><em><a href="">外语学习</a></em></dd>
									</dl>
									<dl class="fore11">
										<dt>其它</dt>
										<dd><em><a href="">英文原版书</a></em><em><a href="">港台图书</a></em><em><a href="">工具书</a></em><em><a href="">套装书</a></em><em><a href="">杂志/期刊</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">运动健康</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书7</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
								</div>
								<div class="cat-right">
									<dl class="categorys-brands" clstag="homepage|keycount|home2013|0601d">
										<dt>推荐品牌出版商</dt>
										<dd>
											<ul>
												<li>
													<a href="">中华书局</a>
												</li>
												<li>
													<a href="">人民邮电出版社</a>
												</li>
											</ul>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">汽车用品</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									<dl class="fore1">
										<dt><a href="">电子书8</a></dt>
										<dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
									</dl>
									<dl class="fore2">
										<dt><a href="">数字音乐</a></dt>
										<dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
									</dl>
									<dl class="fore3">
										<dt><a href="">音像</a></dt>
										<dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
									</dl>
									<dl class="fore4">
										<dt>文艺</dt>
										<dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
									</dl>
									<dl class="fore5">
										<dt>人文社科</dt>
										<dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
									</dl>
									<dl class="fore6">
										<dt>经管励志</dt>
										<dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
									</dl>
									<dl class="fore7">
										<dt>生活</dt>
										<dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
									</dl>
									<dl class="fore8">
										<dt>科技</dt>
										<dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="item">
							<h3><a href="">彩票、旅行</a></h3>
						</div>
						<div class="item">
							<h3><a href="">理财、众筹</a></h3>
						</div>
						<div class="item">
							<h3><a href="">母婴、玩具</a></h3>
						</div>
						<div class="item">
							<h3><a href="">箱包</a></h3>
						</div>
						<div class="item">
							<h3><a href="">运动户外</a></h3>
						</div>
						<div class="item">
							<h3><a href="">箱包</a></h3>
						</div>
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
					  <div class="carousel-inner"  style="width:720px;hight:800px"  >
						  @foreach($slide as $k=>$v)
							  @if($k==0)
					    <div class="active item"  style="width:720px;hight:800px"  >
					    <a href="{{$v->sl_url}}">
					    	<img src="{{env('UPLOADS_URL')}}{{$v->sl_log}}" style="width:720px;hight:800px" />
					      </a>
					    </div>
					    @else
						<div class="item"  style="width:720px;hight:800px"  >
						 <a href="{{$v->sl_url}}">
						<img src="{{env('UPLOADS_URL')}}{{$v->sl_log}}" style="width:720px;hight:800px"   />
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
						<div class="clearix"></div>
						<ul class="news-list unstyled">
							<li>
								<span class="bold">[特惠]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[公告]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[特惠]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[公告]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[特惠]</span>备战开学季 全民半价购数码
							</li>
						</ul>
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
					<li class="yui3-u-1-6">
						<dl class="picDl huozhe">
							@foreach($goods as $v)
							<dd>
								<a href="{{url('/index/item/'.$v->goods_id)}}" class="pic"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="200" height="200" alt="" /></a>
								<div class="like-text">
									<p>{{$v->goods_name}}</p>
									<h3>¥{{$v->goods_price}}</h3>
								</div>
							</dd>
							@endforeach
						</dl>
					</li>

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
	<div id="floor-1" class="floor">
		<div class="py-container">
            @foreach($cate as $v)
			<div class="title floors">
				<h3 class="fl">{{$v->cate_name}}</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab">热门</a>
						</li>
                        @foreach($tao_2ji[$v->cate_id] as $vv)
						<li>
							<a href="#tab2" data-toggle="tab">{{$vv->cate_name}}</a>
						</li>
                        @endforeach
					</ul>
				</div>
			</div>
            @endforeach

		</div>
	</div>
	{{--<div id="floor-2" class="floor">--}}
		{{--<div class="py-container">--}}
			{{--<div class="title floors">--}}
				{{--<h3 class="fl">手机通讯</h3>--}}
				{{--<div class="fr">--}}
					{{--<ul class="sui-nav nav-tabs">--}}
						{{--<li class="active">--}}
							{{--<a href="#tab8" data-toggle="tab">热门</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#tab9" data-toggle="tab">品质优选</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#tab10" data-toggle="tab">新机尝鲜</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#tab11" data-toggle="tab">高性价比</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#tab12" data-toggle="tab">合约机</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#tab13" data-toggle="tab">手机卡</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#tab14" data-toggle="tab">手机配件</a>--}}
						{{--</li>--}}
					{{--</ul>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="clearfix  tab-content floor-content">--}}
				{{--<div id="tab8" class="tab-pane active">--}}
					{{--<div class="yui3-g Floor-1">--}}
						{{--<div class="yui3-u Left blockgary">--}}
							{{--<ul class="jd-list">--}}
								{{--<li>节能补贴</li>--}}
								{{--<li>4K电视</li>--}}
								{{--<li>空气净化器</li>--}}
								{{--<li>IH电饭煲</li>--}}
								{{--<li>滚筒洗衣机</li>--}}
								{{--<li>电热水器</li>--}}
							{{--</ul>--}}
							{{--<img src="/indexshop/img/floor-1-1.png" />--}}
						{{--</div>--}}
						{{--<div class="yui3-u row-330 floorBanner">--}}
							{{--<div id="floorCarousell" data-ride="carousel" data-interval="4000" class="sui-carousel slide">--}}
								{{--<ol class="carousel-indicators">--}}
									{{--<li data-target="#floorCarousell" data-slide-to="0" class="active"></li>--}}
									{{--<li data-target="#floorCarousell" data-slide-to="1"></li>--}}
									{{--<li data-target="#floorCarousell" data-slide-to="2"></li>--}}
								{{--</ol>--}}
								{{--<div class="carousel-inner">--}}
									{{--<div class="active item">--}}
										{{--<img src="/indexshop/img/floor-1-b01.png">--}}
									{{--</div>--}}
									{{--<div class="item">--}}
										{{--<img src="/indexshop/img/floor-1-b02.png">--}}
									{{--</div>--}}
									{{--<div class="item">--}}
										{{--<img src="/indexshop/img/floor-1-b03.png">--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<a href="#floorCarousell" data-slide="prev" class="carousel-control left">‹</a>--}}
								{{--<a href="#floorCarousell" data-slide="next" class="carousel-control right">›</a>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="yui3-u row-220 split">--}}
							{{--<span class="floor-x-line"></span>--}}
							{{--<div class="floor-conver-pit">--}}
								{{--<img src="/indexshop/img/floor-1-2.png" />--}}
							{{--</div>--}}
							{{--<div class="floor-conver-pit">--}}
								{{--<img src="/indexshop/img/floor-1-3.png" />--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="yui3-u row-218 split">--}}
							{{--<img src="/indexshop/img/floor-1-4.png" />--}}
						{{--</div>--}}
						{{--<div class="yui3-u row-220 split">--}}
							{{--<span class="floor-x-line"></span>--}}
							{{--<div class="floor-conver-pit">--}}
								{{--<img src="/indexshop/img/floor-1-5.png" />--}}
							{{--</div>--}}
							{{--<div class="floor-conver-pit">--}}
								{{--<img src="/indexshop/img/floor-1-6.png" />--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div id="tab2" class="tab-pane">--}}
					{{--<p>第二个</p>--}}
				{{--</div>--}}
				{{--<div id="tab9" class="tab-pane">--}}
					{{--<p>第三个</p>--}}
				{{--</div>--}}
				{{--<div id="tab10" class="tab-pane">--}}
					{{--<p>第4个</p>--}}
				{{--</div>--}}
				{{--<div id="tab11" class="tab-pane">--}}
					{{--<p>第5个</p>--}}
				{{--</div>--}}
				{{--<div id="tab12" class="tab-pane">--}}
					{{--<p>第6个</p>--}}
				{{--</div>--}}
				{{--<div id="tab13" class="tab-pane">--}}
					{{--<p>第7个</p>--}}
				{{--</div>--}}
				{{--<div id="tab14" class="tab-pane">--}}
					{{--<p>第8个</p>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
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
							<a class="jtc-btn J-btn" href="/index/cate" target="_blank">去购物车结算</a>
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
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
	<div class="tbar-cart-item" >
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
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="/indexshop/js/model/cartModel.js"></script>
<script type="text/javascript" src="/indexshop/js/czFunction.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/indexshop/js/pages/index.js"></script>
<script type="text/javascript" src="/indexshop/js/widget/cartPanelView.js"></script>
<script type="text/javascript" src="/indexshop/js/widget/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/indexshop/js/widget/nav.js"></script>
</body>


</html>