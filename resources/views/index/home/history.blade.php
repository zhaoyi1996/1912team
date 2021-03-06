     @extends("layouts.home")
         @section("title",'个人收藏')
         <!--  -->
         @section('content')
                        
               <div class="yui3-u-5-6 goods">
                    <div class="body">                   
                            <h4>收藏的商品</h4>
                            <div class="goods-list">
                                <ul class="yui3-g"  id="goods-list">
                                    @foreach($history as $k=>$v)
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><a href="{{url('/index/item/'.$v->goods_id)}}"><img src="{{env('APP_URL')}}{{$v->goods_img}}" alt=''></a></div>
                                            <div class="price"><strong><em>¥</em> <i>{{$v->goods_price}}</i></strong></div>
                                            <div class="attr"><a href="{{url('/index/item/'.$v->goods_id)}}"><em>{{$v->goods_name}}</em></a></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="{{url('/index/cart')}}" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="{{url('/index/home/history/del/'.$v->collect_id)}}" class="sui-btn btn-bordered">删除</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
                                     @endforeach
                                </ul>
                            </div>
                      
                        
                        <!--猜你喜欢-->
                        <div class="like-title">
                            <div class="mt">
                                <span class="fl"><strong>猜你喜欢</strong></span>
                            </div>
                        </div>
                        <div class="like-list">
                            <ul class="yui3-g">
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="img/_/itemlike01.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                            <em>¥</em>
                                            <i>3699.00</i>
                                        </strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有6人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="img/_/itemlike02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                            <em>¥</em>
                                            <i>4388.00</i>
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
                                            <img src="img/_/itemlike03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
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
                                            <img src="img/_/itemlike04.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
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
        </div>
    </div>
         @endsection