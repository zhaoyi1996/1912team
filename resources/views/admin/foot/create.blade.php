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
                       <div class="col-md-10 data">
                           <input type="text" class="form-control" name="foot_name" id="foot_name"   placeholder="友情链接名称" value="">
                        </div>
                 </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">友情链接跳转地址</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="foot_url" id="foot_url"   placeholder="友情链接跳转地址" value="">
                         </div>
                     </div>
                   </div>
                   <div class="row data-type">
                    <div class="col-md-2 title">友情链接权重</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="foot_weight" id="foot_weight"   placeholder="友情链接权重" value="">
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
        if(foot_name==""){
            alert("友情连接名称不能为空");
            return;
        } 
        var foot_url=$("#foot_url").val();
        if(foot_url==""){
            alert("友情连接跳转地址不能为空！");
            return;            
        }
        var foot_weight=$("#foot_weight").val();
        if(foot_weight==""){
            alert("友情连接权重不能为空！");
            return;            
        }    
        // console.log(foot_weight);
      // 通过ajax技术传给控制器
      $.ajax({
                // 传输地址
                url:"/admin/foot/story",
                // 传输方式
                type:"post",
                // 传输数据
                data:{foot_name:foot_name,foot_url:foot_url,foot_weight:foot_weight},
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