     @extends("layouts.home")
         @section("title",'rbac管理员添加')
         <!--  -->
         @section('content')
                        
                      <div class="yui3-u-5-6">
                    <div class="body userInfo">
                        <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                        </div>
                        <div class="tab-content ">
                            <div id="one" class="tab-pane active">
                                <form id="form-msg" class="sui-form form-horizontal" onsubmit="jsvascript:return check()">
                                     <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" name="user_name" id="user_name" class="input-medium">
                                            </div>
                                    </div>
                                     <div class="control-group">
                                        <label for="inputPassword" class="control-label">所在地：</label>
                                        <div class="controls">
                                            <div data-toggle="distpicker">
                                                <div class="form-group area">

                                                    <select class="form-control" id="province1">
                                                        <option value="0" selected>请选择</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="city1">
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="district1">
                                                        
                                                    </select>
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
                                    

                                   <div class="control-group">
                                       <input type="checkbox" id="is_default" name="is_default"  value="1">设为默认收货地址
                                   </div>
                                    
                                    <div class="control-group">
                                        <label for="sanwei" class="control-label"></label>
                                        <div class="controls">
                                            <button type="submit" id="button" class="sui-btn btn-primary">立即注册</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="two" class="tab-pane">

                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function check(){
        return false;
    }
        $("#button").click(function(){
            var user_name = $("#user_name").val();
            var user_tel = $("#user_tel").val();
            var minute = $("#minute").val();
            // var is_default = $("#is_default").val();
            var is_default = $("input[name='is_default']:checked").val();
            var province = $("#province1").find(" option:selected").attr("data-code");
            // alert(province);
            // return false;
            var city = $("#city1").find(" option:selected").attr("data-code");
            var district = $("#district1").find(" option:selected").attr("data-code");
            $.ajax({
                type:"post",
                url:"/index/homeaddress/store",
                data:{user_name:user_name,user_tel:user_tel,minute:minute,is_default:is_default,province:province,city:city,district:district},
                success:function(res){
                    alert(res)
                }
            })
        })
    </script>
         @endsection