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
                    <a href="#home" data-toggle="tab">品牌编辑</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                       <div class="col-md-2 title">品牌名称</div>
                       <div class="col-md-10 data">
                           <input type="text" class="form-control" name="brand_name" id="brand_name"   placeholder="品牌名称" value="">
                        </div>
                 </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">品牌图片</div>
                        <div class="col-md-10 data">
                             <input type="file" class="form-control" name="brand_img"  id="uploadify" placeholder="品牌图片" value="">
                         </div>
                         <div class="showimg"></div>
                            <input type="hidden" id="brand_img" width="50" hight="50" name="brand_img">
                        </div>
                     </div>
                   </div>
                 <div class="row data-type">
                    <div class="col-md-2 title">品牌URL</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="brand_url" id="brand_url"   placeholder="品牌URL" value="">
                         </div>
                     </div>
                   </div>
                   <div class="row data-type">
                    <div class="col-md-2 title">首字母</div>
                        <div class="col-md-10 data">
                             <input type="text" class="form-control" name="brand_story" id="brand_story"   placeholder="首字母" value="">
                         </div>
                     </div>
                   
                  <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" id="button" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我添加品牌</button>
                  </div>
                  </div>
<script type="text/javascript">
	$(document).ready(function(){
        // 图片地址
            $("#uploadify").uploadify({
            uploader: "/admin/brand/img",
            swf: "/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"'>";
                $("input[name='brand_img']").val(imgPath);
                
            }
        });
        $("#button").click(function(){
            // 获取需要传递的值
        var brand_name=$("#brand_name").val();
        if(brand_name==""){
            alert("名称不能为空");
            return;
        }
        var brand_img=$("#brand_img").val();
        if(brand_img==""){
            alert("图片不能为空");
            return;
        }
        var brand_url=$("#brand_url").val();
        if(brand_url==""){
            alert("URL不能为空");
            return;
        }  
        var brand_story=$("#brand_story").val();
        if(brand_story==""){
            alert("首字母不能为空");
            return;
        }  
        // console.log(an_st_num);
      // 通过ajax技术传给控制器
    $.ajax({
            url:"/admin/brand/test",
            data:{brand_name:brand_name,brand_img:brand_img,brand_url:brand_url,brand_story:brand_story},
            type:"post",
            dataType:"json",
            success:function(res){
                if(res.code=='0'){
                    location.href="/admin/brand/brand";
                }else if(res.code=='1'){
                    alert(res.msg);
                }else{
                    alert("添加失败");
                }
            }
        })
    })
})
</script> 




@endsection