
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>团队开发前台模板@yield('title')</title>
    <link rel="icon" href="assets//indexshop/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/indexshop/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-list.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/widget-cartPanelView.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-cart.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-zoom.css" />
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
                                    <a class="sui-btn btn-default btn-xlarge" href="/index/cart" target="_blank">
                                        <span>我的购物车</span>
                                        <i class="shopnum">1</i>
                                    </a>
                                    
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
                                <li class="f-item"><a href="{{url('/index/search?cate_id='.$v['cate_id'])}}">{{$v->cate_name}}</a></li>
                                @endforeach
                                <li class="f-item"><a href=""> 团购</li></a>
                                <li class="f-item"><a href=""> 有趣</li></a>
                                <li class="f-item"><a href="{{url('/index/seckill')}}" target="_blank">秒杀</a></li>
                            </ul>
                        </div>
                        <div class="yui3-u Right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @yield('content')



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
            <!--侧栏面板结束-->
    <script type="text/javascript" src="/indexshop/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/indexshop/js/pages/seckill-index.js"></script>
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
    <script type="text/javascript" src="/indexshop/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
    <script type="text/javascript" src="/indexshop/js/plugins/jquery.jqzoom/zoom.js"></script>

</body>


</html>