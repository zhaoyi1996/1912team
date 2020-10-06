@extends("layouts.index")
@section("title",'购物车')
@section('content')
	<div class="cart py-container">
		
		<div class="allgoods">
			<h4>全部商品<span>{{$count}}</span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><!-- <input type="checkbox" name="" id="" value="" /> 全部 --></div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					<div class="cart-body">
							<div class="cart-list">
							@if(!empty($cart_data))
							@foreach($cart_data as $k=>$v)

							<!-- <template> -->
								<ul class="goods-list yui3-g" car_id="{{$v->car_id}}">
									<li class="yui3-u-1-24">
										<input type="checkbox" name=""  class="box" value="" ids="{{$v->car_id}}" />
									</li>
									<li class="yui3-u-11-24">
										<div class="good-item">
											<div class="item-img"><img  style="width:79px;" src="{{env('APP_URL')}}{{$v->goods_img}}" /></div>
											<div class="item-msg">{{$v->goods_name}}</div>
										</div>
									</li>
									<li class="yui3-u-1-8"><span class="price" id="{{$v->goods_price}}">{{$v->goods_price}}</span><font color='red'>.00</font></li>
									<li class="yui3-u-1-8" id="{{$v->car_id}}" ids="{{$v->goods_store}}">
										<a href="javascript:void(0)" class="increment mins">-</a>
										<input autocomplete="off" type="text" id="num" value="{{$v->car_num}}" minnum="1" class="itxt" />
										<a href="javascript:void(0)" class="increment plus">+</a>
									</li>
									<li class="yui3-u-1-8"><span class="sum" id="">{{$v->car_price}}</span></li>
									<li class="yui3-u-1-8">
										<a href="javascript:void[0]" id="id" class="del" goods_id="{{$v->goods_id}}">删除</a><br />
										<a href="#none">移到我的关注</a>
									</li>
								</ul>
							<!-- </template> -->
							@endforeach
							@endif

							</div>
					</div>
				</div>

			</div>
			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox" name="" id="boxs" value="" />
					<span>全选</span>
				</div>

				<div class="option">
					{{--<a href="javascript:void[0]" id="tao" goods_id="{{$v->goods_id}}">删除选中的商品</a>--}}

					{{--<a href="javascript:void[0]"  goods_id="{{$v->goods_id}}">删除选中的商品</a>--}}

					<a href="#none">移到我的关注</a>
					<a href="#none">清除下柜商品</a>
				</div>


				<div class="toolbar">
					<div class="chosed">已选择<span>0</span>件商品</div>

			</div>


			<div class="sumbtn">
				<a class="sum-btn" id="orders" target="_blank">结算</a>
			</div>

			<div class="clearfix"></div>
			<div class="deled">
				<span>已删除商品，您可以重新购买或加关注：</span>

				<div class="cart-list del">
				@foreach($del_data as $v)
					<ul class="goods-list yui3-g">
						<li class="yui3-u-1-2">
							<div class="good-item">
								<div class="item-msg">{{$v->goods_name}}</div>
							</div>
						</li>
						<li class="yui3-u-1-6"><span class="price">{{$v->goods_price}}</span></li>
						<li class="yui3-u-1-6">
							<span class="number">{{$v->car_num}}</span>
						</li>
						<li class="yui3-u-1-8">
							<a href="#none">重新购买</a>
							<a href="#none">移到我的关注</a>
						</li>
					</ul>
					@endforeach
				</div>

			</div>
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
					<li>
						<a href="#profile" data-toggle="tab">特惠换购</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
										<li>
											<img src="/indexshop/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/indexshop/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/indexshop/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/indexshop/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
								<div class="item">
									<ul>
										<li>
											<img src="/indexshop/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/indexshop/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/indexshop/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/indexshop/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
					<div id="profile" class="tab-pane">
						<p>特惠选购</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 底部栏位 -->
	<script src="/js/jquery.js"></script>
	<script>
		{{--删除--}}
         $(document).on("click",".del",function(){
			var goods_id=$(this).attr('goods_id');
			var _this = $(this);
			if(confirm("你确认要删除吗")){
				$.get("/cart/deletes/"+goods_id,function(res){
					if(res.code==0){
						alert(res.msg);
						$('.del').parents('ul').hide();
					}
				},'json')
			}
		});
	</script>

	{{--加减号  全选  --}}
	<script>
		$(document).ready(function(){

			$(document).on("click",".mins",function(){	//减号
				var _this=$(this);
				var wenben=parseInt(_this.next().val());//文本框的值
				var goods_price=parseInt(_this.parent().prev().find("span").prop("id"));//单价
				var car_id=_this.parent().prop("id");

//				 alert(car_id);return false;

				if((wenben-1)<1)
				{
					alert("不能再减了..."); return false;
				}else{
					_this.next().val(wenben-1);
					_this.parent().next().find("span").text(goods_price*(wenben-1));

					var car_num  =	wenben-1;
					var goods_totall= goods_price*(wenben-1);
					//alert(goods_totall);return false;

//					ajax(car_id,car_num,goods_totall);
				}


				$.ajax({
					url:"/index/jian",
					type:'post',
					data:{wenben:wenben,car_id:car_id},
					success:function(res){
						console.log(res);
					}
				})

			})
			$(document).on("click",".plus",function(){	//加
				var _this=$(this);
				var wenben=parseInt(_this.prev().val());//文本框的值
				var goods_price=parseInt(_this.parent().prev().find("span").prop("id"));//单价
				var car_id=_this.parent().prop("id");
				var goods_store=_this.parent().attr("ids");
				if((wenben+1)>goods_store)
				{
					alert("库存不多了..."); return false;
				}else{
					var car_num  =  wenben+1;
					//			alert(buy_number);return false;

					var goods_totall= goods_price*car_num;
					_this.prev().val(car_num);
					_this.parent().next().find("span").text(goods_price*car_num);


					//alert(goods_totall);return false;

//					ajax(car_id,car_num,goods_totall);
				}

				$.ajax({
					url:"/index/nuns",
					type:'post',
					data:{wenben:wenben,car_id:car_id},
					success:function(res){
						console.log(res);
					}
				})
			})
			$(document).on("blur",".itxt",function(){  //文本框
				var _this=$(this);
				var car_num= _this.val();
				var re=/^\d+$/;
				var goods_store=_this.parent().attr("ids");

				//console.log(_this);
				if(car_num==''){
					alert('不可为空');
					_this.val(1);return false;
				}
				if(!re.test(goods_store)){
					alert("必须是纯数字");
					_this.val(1);return false;
				}
				if(car_num<1){
					alert("最少购买一件");
					_this.val(1);return false;
				}
				if(car_num>goods_store){
					alert("只有这么多了...");
					_this.val(goods_store);return false;
				}
				//return false;
				var goods_price=parseInt(_this.parent().prev().find("span").prop("id"));//单价
				var car_id=_this.parent().prop("id");
				var goods_totall=goods_price*car_num;
				_this.parent().next().find("span").text(goods_price*car_num);
				ajax(car_id,car_num,goods_totall)




			});
///————————————————————————— 全选反选  —————————————————————————————————————————————
			$("#boxs").click(function(){
				var _this=$(this);
				// 获取当前 复选框的状态  是否选中
				var boxs =_this.prop("checked");//返回值是 true 或 false
				$(".box").prop("checked",boxs);
				// if(boxs==true){
				//     //表示全部被选中
				//   $(".list-tr").addClass("car_tr");
				// }else{
				//     //表示全部没有被选中
				//   $(".list-tr").removeClass("car_tr");
				// }
				//alert(boxs);


			})


			$(document).on("click","#orders",function(){
				var   box=  $(".box:checked");
				if(box.length==0){
					alert("请至少选择一样商品进行结算");
					return false;
				}
				//购物车id
				var car_id='';
				//获取商品id
				var str="";
				box.each(function(index){
					str+=$(this).parents('ul').attr('car_id')+',';
				});
				var car_id=str.substring(0,str.length-1);
				location.href="/index/orderinfo/"+car_id;


			});

			{{--function  ajax(car_id,car_num,goods_totall){--}}
				{{--$.ajax({--}}
					{{--url:"{{url('/indexs/carts')}}",--}}
					{{--data:{car_id:car_id,car_num:car_num,goods_totall:goods_totall},--}}
					{{--type:"post",--}}
					{{--success:function(res){--}}
						{{--console.log(res);--}}
					{{--}--}}

				{{--});--}}
			{{--}--}}




		})





	</script>
@endsection