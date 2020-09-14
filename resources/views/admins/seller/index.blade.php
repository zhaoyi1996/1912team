@extends("layouts.admin")
@section("title",'商品列表')
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
                    <a href="#home" data-toggle="tab">商家信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">公司名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.name"  placeholder="公司名称" value="">
                        </div>

                        <div class="col-md-2 title">公司手机</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.mobile"  placeholder="公司手机" value="">
                        </div>

                        <div class="col-md-2 title">公司电话</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.telephone"  placeholder="公司电话" value="">
                        </div>

                        <div class="col-md-2 title">公司详细地址</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.addressDetail"  placeholder="公司详细地址" value="">
                        </div>

                        <div class="col-md-2 title">联系人姓名</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.linkmanName"   placeholder="联系人姓名" value="">
                        </div>

                        <div class="col-md-2 title">联系人QQ</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.linkmanQq"   placeholder="联系人QQ" value="">
                        </div>

                        <div class="col-md-2 title">联系人手机</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.linkmanMobile"   placeholder="联系人手机" value="">
                        </div>

                        <div class="col-md-2 title">联系人EMAIL</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.linkmanEmail"  placeholder="联系人EMAIL" value="">
                        </div>

                        <div class="col-md-2 title">营业执照号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber"   placeholder="营业执照号" value="">
                        </div>

                        <div class="col-md-2 title">税务登记证号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.taxNumber"   placeholder="税务登记证号" value="">
                        </div>

                        <div class="col-md-2 title">组织机构代码证</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.orgNumber"  placeholder="组织机构代码证" value="">
                        </div>

                        <div class="col-md-2 title">法定代表人</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.legalPerson"   placeholder="法定代表人" value="">
                        </div>

                        <div class="col-md-2 title">法定代表人身份证号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.legalPersonCardId"   placeholder="法定代表人身份证号" value="">
                        </div>

                        <div class="col-md-2 title">开户行名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.bankName" placeholder="开户行名称" value="">
                        </div>

                        <div class="col-md-2 title">开户行支行</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.bankNameBranch"  placeholder="开户行支行" value="">
                        </div>

                        <div class="col-md-2 title">银行账号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.bankCode"  placeholder="银行账号" value="">
                        </div>

                    </div>
                </div>




            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>




    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save"></i>保存</button>
        <a ng-click="submit()" data-toggle="modal" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->


</body>

@endsection