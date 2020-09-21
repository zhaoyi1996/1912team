@extends("layouts.shop")
@section("title","商品后台友情链接管理")
@section("content")
 

<!-- 正文区域 -->
<section class="content">

     @csrf
    <input type="hidden" name="_token" value="U0FMKr07jNP4cAggU5Dcm4Wmgg7OhixiwMTxDtAi">      
      <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">底部友情链接</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                       <div class="col-md-2 title">友情链接名称</div>
                       <div class="col-md-10 data" foot_id="{{$foot->foot_id}}">
                           <input type="text" class="form-control" name="foot_name" id="foot_name"   placeholder="友情链接名称" value="{{$foot->foot_name}}">
                        </div>
                 </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">友情链接跳转地址</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="foot_url" id="foot_url"   placeholder="友情链接跳转地址" value="{{$foot->foot_url}}">
                         </div>
                     </div>
                   </div>
                   <div class="row data-type">
                    <div class="col-md-2 title">友情链接权重</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="foot_weight" id="foot_weight"   placeholder="友情链接权重" value="{{$foot->foot_weight}}">
                         </div>
                     </div>
                   
                      </div>
                  <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" id="button" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我添加友情链接</button>
                  </div>
                  </div>

<script type="text/javascript">
	$(document).ready(function(){
        $("#button").click(function(){
            // 获取需要传递的值
        var foot_name=$("#foot_name").val();
        var foot_url=$("#foot_url").val();
        var foot_weight=$("#foot_weight").val();  
        var foot_id = $("#foot_name").parent().attr('foot_id');  
        // console.log(foot_id);
      // 通过ajax技术传给控制器
      $.ajax({
                // 传输地址
                url:"/admin/foot/update",
                // 传输方式
                type:"post",
                // 传输数据
                data:{foot_name:foot_name,foot_url:foot_url,foot_weight:foot_weight,foot_id:foot_id},
                success:function(res){
                    // console.log(res);
                    if(res.code=='0000'){  
                        location.href="/admin/foot"; 
                    }else{
                        alert('跳转失败');
                    }
                }
                
        });
    });
});
</script> 


@endsection