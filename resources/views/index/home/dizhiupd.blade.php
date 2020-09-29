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
                                <form id="form-msg" class="sui-form form-horizontal" method="post" action="{{url('/index/home/dizhi/update/'.$info->fef_id)}}">
                                     <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" value="{{$info->user_name}}" name="user_name" id="user_name" class="input-medium">
                                            </div>
                                    </div>
                                      <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control" name="province" id="province1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" name="city" id="city1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" name="area" id="district1"></select>
                                                </div>
                                            </div>
                                            </div>                                   
                                    </div>
                                     <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" name="minute" value="{{$info->minute}}" id="minute" class="input-large">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" name="user_tel" value="{{$info->user_tel}}" id="user_tel" class="input-medium">
                                            </div>
                                    </div>
                                    

                                   <div class="control-group">
                                       <input type="checkbox" id="is_default" name="is_default" name="fef_is_more"  value="1">设为默认收货地址
                                   </div>
                                    
                                    <div class="control-group">
                                        <label for="sanwei" class="control-label"></label>
                                        <div class="controls">
                                            <button type="submit" id="button" class="sui-btn btn-primary">编辑</button>
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

         @endsection