@foreach($res as $k=>$v)
    <tr>
        <td>{{$v->goods_id}}</td>
        <td>{{$v->cate_id}}</td>
        <td>{{$v->goods_name}}</td>
        <td>{{$v->goods_price}}</td>
        <td>{{$v->goods_title}}</td>
        <td>{{$v->goods_desc}}</td>
        <td>{{$v->goods_packing}}</td>
        <td>{{$v->goods_sales}}</td>
        <td>{{$v->goods_sn}}</td>
        <td>{{$v->goods_store}}</td>
        <td><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="60" hight="60" alt=""></td>
        {{--<td>{{$v->goods_imgs}}</td>--}}
        <td>{{$v->goods_show?'√':'×'}}</td>
        <td>{{$v->goods_hot?'√':'×'}}</td>
        <td class="text-center">
            <a href="javascript:void[0]" id="id" goods_id="{{$v->goods_id}}" class="btn bg-olive btn-xs">删除</a>
            <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn bg-olive btn-xs">编辑</a>
        </td>
    </tr>
@endforeach
<tr><td colspan="6">{{$res->appends($query)->links()}}</td></tr>