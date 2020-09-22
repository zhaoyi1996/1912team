@extends("layouts.shop")
@section("title","商品后台导航管理")
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
                    <a href="#home" data-toggle="tab">导航管理</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                       <div class="col-md-2 title">导航名称</div>
                       <div class="col-md-10 data">
                           <input type="text" class="form-control" name="nav_name" id="nav_name"   placeholder="导航名称" value="">
                        </div>
                 </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">导航跳转地址</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="nav_url" id="nav_url"   placeholder="导航跳转地址" value="">
                         </div>
                     </div>
                   </div>
                   <div class="row data-type">
                    <div class="col-md-2 title">导航权重</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="nav_weight" id="nav_weight"   placeholder="导航权重" value="">
                         </div>
                     </div>
                   
                      </div>
                      <div class="row data-type">
                    <div class="col-md-2 title">导航是否展示</div>
                        <div class="col-md-10 data">
                        <input type="radio" id="nav_show" value="1" name="nav_show" checked>是
                        <input type="radio" id="nav_show" value="2" name="nav_show">否
                        
                         </div>
                     </div>
                   
                      </div>
                  <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" id="button" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我添加导航</button>
                  </div>
                  </div>

<script type="text/javascript">
	$(document).ready(function(){
        $("#button").click(function(){
            // 获取需要传递的值
        var nav_name=$("#nav_name").val();
        var nav_url=$("#nav_url").val();
        var nav_weight=$("#nav_weight").val();    
        var nav_show=$("#nav_show").val();
        // console.log(nav_weight);
      // 通过ajax技术传给控制器
      $.ajax({
                // 传输地址
                url:"/admin/nav/story",
                // 传输方式
                type:"post",
                // 传输数据
                data:{nav_name:nav_name,nav_url:nav_url,nav_weight:nav_weight,nav_show:nav_show},
                success:function(res){
                    // console.log(res);
                    if(res.code=='0000'){  
                        location.href="/admin/nav"; 
                    }else{
                        alert('跳转失败');
                    }
                }
                
        });
    });
});
</script> 


@endsection