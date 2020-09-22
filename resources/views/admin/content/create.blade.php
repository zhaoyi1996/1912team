@extends("layouts.shop")
@section("title","商品后台分类管理")
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
                    <a href="#home" data-toggle="tab">公告基本信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                       <div class="col-md-2 title">公告名称</div>
                       <div class="col-md-10 data">
                           <input type="text" class="form-control" name="an_name" id="an_name"   placeholder="公告名称" value="">
                        </div>
                 </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">公告跳转地址</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="an_url" id="an_url"   placeholder="公告跳转地址" value="">
                         </div>
                     </div>
                   </div>
                   <div class="row data-type">
                    <div class="col-md-2 title">公告介绍</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="an_desc" id="an_desc"   placeholder="公告介绍" value="">
                         </div>
                     </div>
                   
                   <div class="row data-type">
                    <div class="col-md-2 title">折扣价格</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="an_st_price" id="an_st_price"   placeholder="折扣价格" value="">
                         </div>
                     </div>
                   
                   <div class="row data-type">
                    <div class="col-md-2 title">折扣销售数量</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="an_st_num" id="an_st_num"   placeholder="折扣销售数量" value="">
                         </div>
                     </div>
                </div>   </div>
                  <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" id="button" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我添加公告</button>
                  </div>
                  </div>
<script type="text/javascript">
	$(document).ready(function(){
        $("#button").click(function(){
            // 获取需要传递的值
        var an_name=$("#an_name").val();
        if(an_name==""){
            alert("公告名称不能为空");
            return;
        }
        var an_url=$("#an_url").val();
        if(an_url==""){
            alert("公告跳转地址不能为空");
            return;
        }
        var an_desc=$("#an_desc").val();  
        var an_st_price=$("#an_st_price").val(); 
        if(an_st_price==""){
            alert("折扣价格不能为空");
            return;
        }
        var an_st_num=$("#an_st_num").val();  
        if(an_st_num==""){
            alert("折扣销售数量不能为空");
            return;
        }  
        // console.log(an_st_num);
      // 通过ajax技术传给控制器
      $.ajax({
                // 传输地址
                url:"/admin/content/story",
                // 传输方式
                type:"post",
                // 传输数据
                data:{an_name:an_name,an_url:an_url,an_desc:an_desc,an_st_price:an_st_price,an_st_num:an_st_num},
                success:function(res){
                    // console.log(res);
                    if(res.code=='0000'){  
                        location.href="/admin/content"; 
                    }else{
                        alert('跳转失败');
                    }
                }
                
        });
    });
});
</script> 




@endsection