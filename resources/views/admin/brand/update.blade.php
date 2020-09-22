@extends("layouts.shop")
     @section("title",'商品列表')
     @section('content')
   

<body>
<center><h3>品牌修改</h3></center>
<form class="form-horizontal" role="form" action="{{url('/admin/update/'.$res->brand_id)}}" enctype="multipart/form-data">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" 
				   placeholder="请输入品牌名称" name="brand_name" value="{{$res->brand_name}}">
		</div>
	</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label" >品牌URL</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="lastname" 
				   placeholder="请输入品牌URL" name="brand_url"  value="{{$res->brand_url}}">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label" >品牌图片</label>
		<div class="col-sm-10">
			<img src="{{env('UPLOADS_URL')}}{{$res->brand_img}}" alt="">
			<input type="file"  class="form-control" id="uploadify" 
				    name="brand_img"  value="{{$res->brand_img}}">
				    <input type="hidden" name="brand_img">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label" >首字母</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="lastname" 
				   placeholder="请输入首字母" name="brand_story"  value="{{$res->brand_story}}">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>
 @endsection
<script src="/uploadify/jquery.js"></script>
 <link rel="stylesheet" href="/uploadify/uploadify.css">
 <script src="/uploadify/jquery.uploadify.js"></script>
 <script>
	$(document).ready(function(){
		$("#uploadify").uploadify({
			uploader: "/admin/brand/img",
			swf: "/uploadify/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
				// console.log(res);
				// console.log(data);
				// console.log(msg);
				// return  false
				var imgPath  = data;
				var imgstr = "<img src='"+imgPath+"'>";
				$("input[name='brand_img']").val(imgPath);
				$(".showimg").append(imgstr);
				
				// var video_str = "<video src='"+imgPath+"' controls='controls' style='width:400px;height:200px;'>";
				// $(".showimg").append(video_str);
			}
		});
	});
</script>
 
 

 	

