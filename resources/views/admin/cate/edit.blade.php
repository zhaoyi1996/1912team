@extends("layouts.shop")
@section("title","商品后台分类管理")
@section("content")
 

<!-- 正文区域 -->
<section class="content">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{url('/admin/cate/update/'.$cate->cate_id)}}" method="post">
     @csrf
    <input type="hidden" name="_token" value="U0FMKr07jNP4cAggU5Dcm4Wmgg7OhixiwMTxDtAi">      
      <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">分类基本信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                       <div class="col-md-2 title">分类名称</div>
                       <div class="col-md-10 data">
                           <input type="text" class="form-control" value="{{$cate->cate_name}}" name="cate_name" id="cate_name"   placeholder="分类名称" value="">
                    </div>
                    <div class="form-group">
						<label for="firstname" class="col-sm-2 control-label">是否显示</label>
						<div>
							<input type="radio" name="cate_show" value="1" @if($cate->cate_show=="1")checked @endif>是
							<input type="radio" name="cate_show" value="2" @if($cate->cate_show=="2")checked @endif>否
						</div>
					</div>
                    <div class="form-group">
						<label for="firstname" class="col-sm-2 control-label">是否导航显示</label>
						<div>
							<input type="radio" name="cate_nav_show" value="1" @if($cate->cate_nav_show=="1")checked @endif>是
							<input type="radio" name="cate_nav_show" value="2" @if($cate->cate_nav_show=="2")checked @endif>否
						</div>
					</div>
                    <div class="row data-type">
                    <div class="col-md-2 title">无限极分类</div>
                    <div class="col-md-10 data">

                        <select class="form-control" name="pid">

                        <option value="0">--顶级分类--</option>
                        @foreach($cates as $v)
                            <option value="{{$v->cate_id}}"@if($cate->pid=="$v->pid")selected @endif>
                                {{str_repeat('|-',$v->level)}}{{$v->cate_name}}
                            </option>
                        @endforeach
                        </select>
                    
                    </div>
                    </div>    
                 </div>
                   </div>
                  <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>点我修改    分类</button>

                  </div>
                  </form>


@endsection