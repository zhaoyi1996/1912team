@extends("layouts.shop")
@section("title",'rbac权限添加')
        <!--  -->
@section('content')

        <!-- 代码部分 -->
<form action="{{url('/admin/rbac/pow/update/'.$pow->pow_id)}}" method="post">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">权限修改</h3>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-striped"  width="800px">
                <tr>
                    <td>权限名称</td>
                    <td><input  class="form-control" name="pow_name" value="{{$pow->pow_name}}" >
                    </td>
                </tr>
                <tr>
                    <td>权限描述</td>
                    <td> <textarea class="form-control" name="pow_desc" rows="3">{{$pow->pow_desc}}</textarea></td>
                </tr>
                <tr>
                    <td>权限url</td>
                    <td><input  class="form-control" name="pow_url" value="{{$pow->pow_url}}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <input type="submit" value="修改" class="btn btn-success" data-dismiss="modal" aria-hidden="true">
            <!-- <a >添加</a> -->
        </div>
    </div>
</form>
<!-- 代码结尾 -->
@endsection