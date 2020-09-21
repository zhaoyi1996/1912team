@extends("layouts.shop")
@section("title","后台模板展示")
@section("content")
    <body>
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
            @foreach($attr_data as $k=>$v)
            <div>

                <div class="col-md-2 title">{{$v->attr_name}}</div>
                <div class="col-md-10 data">
                    @foreach($attrval_data as $key=>$val)
                    <span>
                        @if($val->attr_id==$v->attr_id) <input class="checkout"  name="checkout[]" type="checkbox" value="{{$val->attrval_id}}" > {{$val->attrval_name}} @else  @endif
                    </span>
                    @endforeach
                </div>

            </div>
                @endforeach
                <tr>
                    <td><button class="bin btn-success" id="add">保存</button></td>
                    <td><input type="reset" name="button" id="button" value="重置" /></td>
                </tr>

        </div>



        <div class="row data-type">
            <table class="table table-bordered table-striped table-hover dataTable">
                <thead id='attr'>
                </thead>
                <thead id="attrval">
                </thead>
            </table>

        </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>保存</button>
            <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
        </div>

    </div>
</div>
</body>
    <script>
        $('.btn-success').click(function(){
            //获取所有选中的checkout
            let attrval_id=$("input[name='checkout[]']:checked");
//            console.log(attrval_id);
            let id='';
            //当选中时，拿到它的value值，并拼起来
            //需要注意的是，这样拼出来的id字符串，是以 ","结尾的，所以在使用的时候，应先将 ","去掉，也可在if中做判断
            // 当为最后一个时，拼的时候不加 ","
            for(var i = 0; i < attrval_id.length; i++) {
                if (attrval_id[i].checked) {
                    id = id + attrval_id[i].value + ",";
                }
            }
            $.ajax({
                url:'/admin/template/repertory/specification',
                type:'post',
                data:{id:id},
                success:function(res){
                    //属性处理
                    var attr_htmls="";
                    for (let i = 0; i <res.attr_data.length; i++) {
//                        console.log(res.attr_data[i]['attr_name']);
                        attr_htmls += '<th class="sorting">'+res.attr_data[i]['attr_name']+'</th>';
                    }
                    attr_htmls+="<th class='sorting'>库存数量</th>"+"<th class='sorting'>价格</th>";
                    $('#attr').html(attr_htmls);
                    //属性值处理
                    var attrval_htmls="";
                    var attrval_td="";
                    var attrval_ids="";
                    var pinjie_id='';
                    //多个规格保存使用
                    var pinjie_ids='';

                    for( let i = 0; i <res.data.length; i++ ){
                        for( let is = 0; is < res.data[i].length; is++ ){
                            attrval_ids=res.data[i][is]['attrval_id'];
                            pinjie_id+=res.data[i][is]['attrval_id']+',';

//                            console.log(attrval_ids);
                            attrval_td+="<td name='attr' value='"+attrval_ids+"'>"+res.data[i][is]['attrval_name']+"</td>";
//                            pinjie_id='';
                            attrval_ids='';
                        }
                        pinjie_ids+=pinjie_id+'/';

                        pinjie_id = pinjie_id.substring(0,pinjie_id.length-1)
                        attrval_td+="<td class='yao'><input class='form-control' name='num' placeholder='库存数量'></td>"+"<td><input class='form-control' name='price'  placeholder='价格'></td>"+"<td><button class='quedin' pinjie_ids='"+pinjie_ids+"' pinjie_id='"+pinjie_id+"'>确定</button></td>";
//                        console.log(attrval_td);
                        attrval_htmls+="<tr class='attrvalid'>" + attrval_td +"</tr>";
                        attrval_td='';
                        pinjie_id='';
                    }
                    window._id=pinjie_ids;
                    $('#attrval').html(attrval_htmls);
                    $('.list-toolbar').show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.list-toolbar').hide();
        });
    </script>
    <script>
        $(document).on('click','.quedin',function(){
            //获取属性值
            var pinjie_id=$(this).attr('pinjie_id');
            //获取库存数量
            var num = $('input[name="num"]').val();
            //获取价格
            var price= $('input[name="price"]').val();
            //用ajax传到控制器
            $.ajax({
                url:'/admin/template/repertory/add' ,
                type:'post',
                data:{pinjie_id:pinjie_id,num:num,price:price},
                success:function(res){
                    alert(res.msg);
                }
            });
        })
    </script>
    {{--多个库存一起上传--}}
    <script>
        $(document).on('click','.btn-primary',function(){
            //获取属性值
            var pinjie_id=_id;
            //获取购买数量
            var num='';
            var name=document.getElementsByName('num');
            for(var i = 0, j = name.length;i<j;i++){
                if(name[i].value==''){
                    alert('请填写购买数量');
                    return ;
                }else{
                    num+=name[i].value+',';
                }
            }
            num = num.substring(0,num.length-1);
            //获取价格
            var price='';
            var price_name=document.getElementsByName('price');
            for(var is = 0, jk = price_name.length;is<jk;is++){
                if(price_name[is].value==''){
                    alert('请填写价格');
                    return ;
                }else{
                    price+=price_name[is].value+',';
                }

            }
            price = price.substring(0,price.length-1);
            //通过ajax将数据传入控制器
            $.ajax({
               url:"/admin/template/repertory/adds",
                type:'post',
                data:{pinjie_id:pinjie_id,num:num,price:price},
                success:function(res){
                    alert(res.msg);

                }
            });

        })
    </script>
@endsection




