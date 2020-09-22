@extends('layouts.shop')
@section('title',"商品后台广告轮播图管理")
@section('content')


<!-- 编辑窗口 -->
    @csrf
    <input type="hidden" name="_token" value="U0FMKr07jNP4cAggU5Dcm4Wmgg7OhixiwMTxDtAi"> 
        <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

        <!--tab头-->
        <ul class="nav nav-tabs">
        <li class="active">
        <a href="#home" data-toggle="tab">轮播图信息</a>
        </li>
        </ul>
        <!--tab头/-->

        <!--tab内容-->
        <div class="tab-content">

        <!--表单内容-->
        <div class="tab-pane active" id="home">
        <div class="row data-type">

        <div class="row data-type">
        <div class="col-md-2 title">轮播图地址</div>
        <div class="col-md-10 data">
            <input class="form-control" placeholder="轮播图地址" id="sl_url" name="sl_url">
        </div>
        </div>

        <div class="row data-type">
        <div class="col-md-2 title">轮播图权重</div>
        <div class="col-md-10 data">
            <input type="text" class="form-control" name="sl_weight"  id="sl_weight" placeholder="轮播图权重" value="">
        </div>
        </div>
          
        <div class="row data-type">
        <div class="col-md-2 title">轮播图-图片</div>
        <div class="col-md-10 data">
            <input type="file" class="form-control" id="uploadify" id="sl_log" name="sl_log">
        <div class="showimg"></div>
		<input type="hidden" id="sl_log" name="img_path">
		</div>
        </div>
        </div>
        
        <div class="row data-type">
        <div class="col-md-2 title">是否展示</div>
        <div class="col-md-10 data">
            <input type="radio" id="is_show" value="1" name="is_show" checked>是
            <input type="radio" id="is_show" value="2" name="is_show" >否
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        <div class="btn-toolbar list-toolbar">
        <button  id="button" class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我添加轮播图</button>
        </div>
    </div>

<script type="text/javascript">
	$(document).ready(function(){
		// alert('1111');
		$("#uploadify").uploadify({
            // console.log(123);
			uploader: "/admin/category/getsun",
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
        var sl_url=$("#sl_url").val();
        var sl_weight=$("#sl_weight").val();
        var sl_log=$("#sl_log").val();  
        var is_show=$("#is_show").val();    
      // 通过ajax技术传给控制器
      $.ajax({
                // 传输地址
                url:"/admin/category/story",
                // 传输方式
                type:"post",
                // 传输数据
                data:{sl_url:sl_url,sl_weight:sl_weight,sl_log:sl_log,is_show:is_show},
                success:function(res){
                    // console.log(res);
                    if(res.code=='0000'){  
                        location.href="/admin/category"; 
                    }else{
                        alert('跳转失败');
                    }
                }
                
        })

        });
	});
</script>
@endsection

