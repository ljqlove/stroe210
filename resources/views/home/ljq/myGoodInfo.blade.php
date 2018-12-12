@extends('layout.mymsg')
@section('title',$title)
@section('style','style=height:36px')
@section('content')
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <style>
        .le{
            margin-left:20px;
        }
        .price{
            font-size:28px;
            margin-left:30px;
        }
        .le b{
            font-size:28px;
            margin-left:30px;
        }
        .sta{
            font-size:20px;

        }
        #status{
            font-size:20px;
            width:80px;
        }
        .table{
            margin-top:20px;
        }

    </style>

    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.min.js"></script>

    <div class="containers"><div class="pc-nav-item"><a href="#" class="pc-title">首页</a> > <a href="/home/myStroe">我的店铺</a> > <a href="javascript:void(0)">商品详情</a> </div></div>

    <div class="containers">
        <form action="/home/good-up/{{$good->gid}}" method="post" enctype='multipart/form-data'>
        <div>
            <div class="pull-left"><img src="{{$good->gpic}}" width="400" height="400" alt=""></div>
                {{ csrf_field() }}
            <div class="pull-left le">
                <h3>{{$good->gname}}</h3><br>
                <span class="price">
                    <i class="fa fa-jpy" aria-hidden="true">标价:</i>
                    <input id="price" type="text" name="price" value="{{$good->price}}" style="width:80px;text-align: center;margin-left:5px">
                </span>
                <br><br>
                <b>库存 : <input type="text" name="stock" value="{{$good->stock}}" style="width:80px;text-align: center;margin-left:5px"></b><br><br>
                @php
                    $sel0 = '';
                    $sel1 = '';
                    $sel2 = '';
                    if($good->status == 0){
                        $sel0 = 'selected';
                    } else if ($good->status == 1){
                        $sel1 = 'selected';
                    } else {
                        $sel2 = 'selected';
                    }
                @endphp
                <span class="sta">商品状态:</span>
                <select name="status" id="status">
                    <option value="0" {{$sel0}}>下架</option>
                    <option value="1" {{$sel1}}>上架</option>
                    <option value="2" {{$sel2}}>新品</option>
                </select><br><br>
                <button type="submit" class="btn btn-primary">修改</button>
            </div>

            <div style="clear:both"></div>
        </div>

        <div>
            <h2>商品介绍 : </h2>
            <div><script id="editor" name='descript' type="text/plain" style="width:1145px;height:500px;">{!!$good->descript!!}</script></div>
        </div>
        </form>
        <div>
            <div class="bst" data-example-id="contextual-backgrounds-helpers">
                <p class="bg-warning" style="margin-top:50px;height:40px;border-radius:5px">&nbsp;</p>
            </div>
            <div>
                <div class="col-md-6 pull-left bg-info" style="min-height:450px">
                    颜色:
                    <form action="/home/goodcolor" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <table class="table table-hover">
                        <tr>
                            <th>颜色</th>
                            <th>尚有大小</th>
                            <th>图片</th>
                            <th>&nbsp;</th>
                        </tr>
                      @foreach($gcolor as $k=>$v)
                        <tr>
                            <td>{{$v->color}}</td>
                            <td>
                                @foreach($gsize as $vv)
                                <input type="checkbox" name="sid[{{$k}}][]" value="{{$vv->id}}" class="size">{{$vv->size}}
                                @endforeach
                            </td>
                            <td><img src="{{$v->pictrue}}" height="40" alt=""></td>
                            <td>

                                <input type="file" name="file[]" cid="{{$v->id}}">
                                <input type="hidden" name="id[]" value="{{$v->id}}">
                            </td>
                        </tr>
                      @endforeach
                    </table>
                    <input class="btn btn-default" type="submit" value="Submit">
                    </form>
                </div>
                <div class="col-md-6 pull-left bg-danger" style="min-height:450px">
                    尺寸:
                    <form action="/home/goodsize" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <table class="table table-hover">
                        <tr>
                            <th>尺寸</th>
                            <th>尚有颜色</th>
                            <th>价格</th>
                        </tr>
                        @foreach($gsize as $k=>$v)
                        <tr>
                            <td>{{$v->size}}</td>
                            <td>
                                @foreach($gcolor as $vv)
                                <input type="checkbox" name="colorid[{{$k}}][]" value="{{$vv->id}}">{{$vv->color}}
                                @endforeach
                            </td>
                            <td>
                                <input class="form-control" type="text" name="price[]" sid="{{$v->id}}" value="{{$v->price}}">
                                <input type="hidden" name="id[]" value="{{$v->id}}">
                            </td>

                        </tr>
                        @endforeach
                    </table>
                    <input class="btn btn-default" type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>



    </div>
    <script>
       var ue = UE.getEditor('editor');
    </script>

@endsection