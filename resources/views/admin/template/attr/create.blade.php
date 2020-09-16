@extends("layouts.shop")
@section("title","后台模板展示")
@section("content")
    <center><h3>属性添加</h3></center>
    <a href="/admin/template/attr/index"><button type="button" class="btn btn-default" title="展示" data-toggle="modal" data-target="#editModal" >去展示</button></a>
<form class="form-horizontal" method="post" action="/admin/template/attr/add"   role="form">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">属性名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="attr_name" id="firstname"
                   placeholder="请输入属性名称">
            <span style="color:red;">{{$errors->first('attr_name')}}</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>



@endsection
