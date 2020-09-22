
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
                    <a href="#home" data-toggle="tab">小广告基本信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                       <div class="col-md-2 title">小广告名称</div>
                       <div class="col-md-10 data">
                           <input type="text" class="form-control" name="la_name" id="la_name"   placeholder="小广告名称" value="">
                        </div>
                 </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">小广告图片</div>
                        <div class="col-md-10 data">
                             <input type="file" class="form-control" name="la_img"  id="uploadify" placeholder="小广告图片" value="">
                         </div>
                         <div class="showimg"></div>
                            <input type="hidden" id="la_img" width="50" hight="50" name="img_path">
                        </div>
                     </div>
                   </div>
                   <div class="row data-type">
                    <div class="col-md-2 title">小广告url跳转地址</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="la_url" id="la_url"   placeholder="小广告url跳转地址" value="">
                         </div>
                     </div>
                   
                     </div>
                  <div class="btn-toolbar list-toolbar">
                    <button type="button" class="btn btn-primary" id="button" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我添加小广告</button>
                  </div>
                  </div>
<script type="text/javascript">
	$(document).ready(function(){
        // 图片地址
        $("#uploadify").uploadify({
			uploader: "/admin/ladver/getsun",
			swf: "/js/uploadify/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
				var imgstr = "<img src='"+imgPath+"'>";
				$("input[name='img_path']").val(imgPath);
				$(".showimg").append(imgstr);
			}
        });
        $("#button").click(function(){
            // 获取需要传递的值
        var la_name=$("#la_name").val();
        if(la_name==""){
            alert("小广告名称不能为空");
            return;
        }
        var la_img=$("#la_img").val();
        
        var la_url=$("#la_url").val();  
        if(la_url==""){
            alert("小广告跳转地址");
            return;
        }
        // console.log(la_img);
      // 通过ajax技术传给控制器
      $.ajax({
                // 传输地址
                url:"/admin/ladver/story",
                // 传输方式
                type:"post",
                // 传输数据
                data:{la_name:la_name,la_img:la_img,la_url:la_url},
                success:function(res){
                    // console.log(res);
                    if(res.code=='0000'){  
                        location.href="/admin/ladver"; 
                    }else{
                        alert('跳转失败');
                    }
                }
                
        });
    });
});
</script> 


@endsection