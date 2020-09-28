     @extends("layouts.home")
         @section("title",'个人中心地址管理')
         <!--  -->
         @section('content')

 <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>地址</th>
                                        <th>联系电话</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($info as $k=>$v)
                                    <tr>
                                        <td>{{$v->user_name}}</td>
                                        <td> {{$v->province}}  {{$v->city}}  {{$v->area}}  {{$v->minute }}</td>
                                        <td>{{$v->user_tel}}</td>
                                        <td>
                                            <a href="{{url('/index/home/dizhi/upd/'.$v->fef_id)}}">编辑</a>
                                            <a href="{{url('/index/home/dizhi/del/'.$v->fef_id)}}">删除</a>
                                            @if($v->fef_is_more==1)
                                            <a href="">默认收货地址</a>
                                            @else
                                            <a href="{{url('/index/home/dizhi/shezhi/'.$v->fef_id)}}">设为默认</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                          
                        </div>
                        <!--新增地址弹出层-->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" class="sui-form form-horizontal">
                                            <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" name="user_name" id="user_name" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control"  id="province1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="city1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="district1"></select>
                                                </div>
                                            </div>
                                            </div>                                   
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" name="minute" id="minute" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" name="user_tel" id="user_tel" class="input-medium">
                                            </div>
                                        </div>
                                     
                                        </form>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="createbutton" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
                                        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
   
        $("#createbutton").click(function(){
            var user_name = $("#user_name").val();
            var user_tel = $("#user_tel").val();
            var province = $("#province1").val();
            var city = $("#city1").val();
            var area = $("#district1").val();
            var minute = $("#minute").val();
            $.ajax({
                type:'post',
                dataType:'json',
                url:"{{url('/index/home/dizhi/create')}}",
                data:{user_name:user_name,user_tel:user_tel,province:province,city:city,area:area,minute:minute},
                success:function(res){
                    if(res.code==0){
                        alert(res.msg)
                    }
                    if(res.code==1){
                        alert(res.msh)
                    }
                }
            })
        })
    </script>

         @endsection