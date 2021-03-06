     @extends("layouts.home")
         @section("title",'个人中心地址管理')
         <!--  -->
         @section('content')

 <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a data-toggle="modal" data-keyboard="false" href="{{url('/index/homeaddress/create')}}"  id="buttoncreate" class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>地址</th>
                                        <th>联系方式</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($info as $k=>$v)
                                    <tr>
                                        <td>{{$v->user_name}}</td>
                                        <td>{{$v->province}} {{$v->city}} {{$v->area}} {{$v->minute}}</td>
                                        <td>{{$v->user_tel}}</td>
                                        <td>
                                            <a class="buttonupd" href="{{url('index/homeaddress/upd/'.$v->fef_id)}}"  fef_id="{{$v->fef_id}}">编辑</a>
                                            <button class="buttondel"  fef_id="{{$v->fef_id}}">删除</button>
                                            @if($v->fef_is_more==2)
                                            <button class="moren" fef_id="{{$v->fef_id}}" style="color:blue" >设为默认收货地址</button>
                                        	@else
                                        	<button style="color:red">默认地址</button>
                                        	@endif
                                        </td>
                                    </tr>
									@endforeach
                                    
                                </tbody>
                            </table>                          
                        </div>
                   </div>
                </div>
                <script>
                		// $(document).ready(function(){
                			$(".buttondel").click(function(){
                		var fef_id = $(this).attr("fef_id");
                		// alert(fef_id);
                		// return false;
                		$.ajax({
                			url:'/index/homeaddress/del/'+fef_id,
                			type:'get',
                			dataType:'json',
                			success:function(res){
                				if(res.code==1){
                					alert(res.msg)
                				}
                				//删除成功给出提示
                				if(res.code==0){
                					alert(res.msg)
                				}
                			}
                		})
                	
                	})
                	$(".moren").click(function(){
                		var fef_id = $(this).attr("fef_id");
                		// alert(fef_id);
                		// return false;
                		$.ajax({
                			url:'/index/homeaddress/moren',
                			type:'get',
                			data:{fef_id:fef_id},
                			success:function(res){
                				if(res.code==1){
                					alert(res.msg)
                				}
                				//删除成功给出提示
                				if(res.code==0){
                					alert(res.msg)
                				}
                			}
                		})
                	})	
					$(".buttonupd").click(function(){
                		var fef_id = $(this).attr("fef_id");
                		// alert(fef_idq)
                		// return false;
                		$.ajax({
                			url:'/index/homeaddress/upd',
                			type:'get',
                			data:{fef_id:fef_id},
                			success:function(res){
                				console.log(res)
                			}
                		})
                	// })
                		})
                </script>
         @endsection