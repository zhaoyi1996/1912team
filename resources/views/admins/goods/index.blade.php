@extends("layouts.admin")
@section("title",'新增商品')
@section('content')

<body class="hold-transition skin-red sidebar-mini" >

<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">商品基本信息</a>
                </li>
                <li >
                    <a href="#pic_upload" data-toggle="tab">商品图片</a>
                </li>
                <li >
                    <a href="#customAttribute" data-toggle="tab">扩展属性</a>
                </li>
                <li >
                    <a href="#spec" data-toggle="tab" >规格</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">商品分类</div>

                        <div class="col-md-10 data">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" >
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control select-sm" ></select>
                                    </td>
                                    <td>
                                        <select class="form-control select-sm" ></select>
                                    </td>
                                    <td>
                                        模板ID:19
                                    </td>
                                </tr>
                            </table>

                        </div>


                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"    placeholder="商品名称" value="">
                        </div>

                        <div class="col-md-2 title">品牌</div>
                        <div class="col-md-10 data">
                            <select class="form-control" ></select>
                        </div>

                        <div class="col-md-2 title">副标题</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"   placeholder="副标题" value="">
                        </div>

                        <div class="col-md-2 title">价格</div>
                        <div class="col-md-10 data">
                            <div class="input-group">
                                <span class="input-group-addon">¥</span>
                                <input type="text" class="form-control"  placeholder="价格" value="">
                            </div>
                        </div>

                        <div class="col-md-2 title editer">商品介绍</div>
                        <div class="col-md-10 data editer">
                            <textarea name="content" style="width:800px;height:400px;visibility:hidden;" ></textarea>
                        </div>

                        <div class="col-md-2 title rowHeight2x">包装列表</div>
                        <div class="col-md-10 data rowHeight2x">

                            <textarea rows="4"  class="form-control"   placeholder="包装列表"></textarea>
                        </div>

                        <div class="col-md-2 title rowHeight2x">售后服务</div>
                        <div class="col-md-10 data rowHeight2x">
                            <textarea rows="4"  class="form-control"    placeholder="售后服务"></textarea>
                        </div>


                    </div>
                </div>

                <!--图片上传-->
                <div class="tab-pane" id="pic_upload">
                    <div class="row data-type">
                        <!-- 颜色图片 -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" title="新建" data-target="#uploadModal"  data-toggle="modal"  ><i class="fa fa-file-o"></i> 新建</button>
                            <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                        </div>

                        <table class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                            <tr>
                                <th class="" style="padding-right:0px">
                                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                                </th>
                                <th class="sorting">颜色</th>
                                <th class="sorting">图片</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input  type="checkbox" ></td>
                                <td>

                                </td>
                                <td>
                                    <img alt="" src="" width="100px" height="100px">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


                <!--扩展属性-->
                <div class="tab-pane" id="customAttribute">
                    <div class="row data-type">
                        <div>
                            <div class="col-md-2 title">扩展属性1</div>
                            <div class="col-md-10 data">
                                <input class="form-control" placeholder="扩展属性1">
                            </div>
                        </div>
                        <div>
                            <div class="col-md-2 title">扩展属性2</div>
                            <div class="col-md-10 data">
                                <input class="form-control" placeholder="扩展属性2">
                            </div>
                        </div>
                    </div>
                </div>

                <!--规格-->
                <div class="tab-pane" id="spec">
                    <div class="row data-type">
                        <div class="col-md-2 title">是否启用规格</div>
                        <div class="col-md-10 data">
                            <input type="checkbox" >
                            <button type="button" class="btn btn-default" title="自定义规格" data-target="#mySpecModal"  data-toggle="modal"  ><i class="fa fa-file-o"></i> 自定义规格</button>
                        </div>
                    </div>
                    <p>

                    <div>

                        <div class="row data-type">

                            <div>
                                <div class="col-md-2 title">屏幕尺寸</div>
                                <div class="col-md-10 data">

					                            <span>
					                            	<input  type="checkbox" >4.0
					                            </span>
												<span>
					                            	<input  type="checkbox" >4.5
					                            </span>
												<span>
					                            	<input  type="checkbox" >5.0
					                            </span>

                                </div>
                            </div>
                            <div>
                                <div class="col-md-2 title">网络制式</div>
                                <div class="col-md-10 data">

					                            <span>
					                            	<input  type="checkbox" >2G
					                            </span>
												<span>
					                            	<input  type="checkbox" >3G
					                            </span>
												<span>
					                            	<input  type="checkbox" >4G
					                            </span>

                                </div>
                            </div>

                        </div>


                        <div class="row data-type">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                <tr>
                                    <th class="sorting">屏幕尺寸</th>
                                    <th class="sorting">网络制式</th>
                                    <th class="sorting">价格</th>
                                    <th class="sorting">库存</th>
                                    <th class="sorting">是否启用</th>
                                    <th class="sorting">是否默认</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        4.0
                                    </td>
                                    <td>
                                        3G
                                    </td>
                                    <td>
                                        <input class="form-control"  placeholder="价格">
                                    </td>
                                    <td>
                                        <input class="form-control" placeholder="库存数量">
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4.0
                                    </td>
                                    <td>
                                        4G
                                    </td>
                                    <td>
                                        <input class="form-control"  placeholder="价格">
                                    </td>
                                    <td>
                                        <input class="form-control" placeholder="库存数量">
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5.0
                                    </td>
                                    <td>
                                        3G
                                    </td>
                                    <td>
                                        <input class="form-control"  placeholder="价格">
                                    </td>
                                    <td>
                                        <input class="form-control" placeholder="库存数量">
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5.0
                                    </td>
                                    <td>
                                        4G
                                    </td>
                                    <td>
                                        <input class="form-control"  placeholder="价格">
                                    </td>
                                    <td>
                                        <input class="form-control" placeholder="库存数量">
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                    <td>
                                        <input type="checkbox" >
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>




    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>保存</button>
        <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
    </div>

</section>


<!-- 上传窗口 -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">上传商品图片</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <td>颜色</td>
                        <td><input  class="form-control" placeholder="颜色" ng-model="image_entity.color">  </td>
                    </tr>
                    <tr>
                        <td>商品图片</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <input type="file" id="file" />
                                        <button class="btn btn-primary" type="button" ng-click="uploadFile()">
                                            上传
                                        </button>
                                    </td>
                                    <td>
                                        <img  src="" width="200px" height="200px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" ng-click="add_image_entity()" data-dismiss="modal" aria-hidden="true">保存</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>



<!-- 自定义规格窗口 -->
<div class="modal fade" id="mySpecModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">自定义规格</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <td>规格名称</td>
                        <td><input  class="form-control" placeholder="规格名称" ng-model="spec_entity.text">  </td>
                    </tr>
                    <tr>
                        <td>规格选项(用逗号分隔)</td>
                        <td>
                            <input  class="form-control" placeholder="规格选项" ng-model="spec_entity.values">
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" ng-click="add_spec_entity()" data-dismiss="modal" aria-hidden="true">保存</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>


<!-- 正文区域 /-->
<script type="text/javascript">

    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true
        });
    });

</script>

</body>

@endsection