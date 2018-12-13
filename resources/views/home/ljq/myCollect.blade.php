@extends('layout.mymsg')

@section('title',$title)

@section('bnv')
    &gt; <a href=''>我的收藏</a>
@endsection

@section('js')
  <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
  <meta content="歪秀购物，购物商城。" name="description">
  <link rel="stylesheet" type="text/css" href="/homes/theme/css/member.css">
    <script type="text/javascript" src="/homes/theme/js/jquery.js"></script>
    <script type="text/javascript">
         (function(a){
             a.fn.hoverClass=function(b){
                 var a=this;
                 a.each(function(c){
                     a.eq(c).hover(function(){
                         $(this).addClass(b)
                     },function(){
                         $(this).removeClass(b)
                     })
                 });
                 return a
             };
         })(jQuery);

         $(function(){
             $("#pc-nav").hoverClass("current");
         });
     </script>

     <script>
         $(function(){

             $("#H-table li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over").hide();
                         $(".H-over:eq(" + _index + ")").show();
                     }
                 })(i));
             });
             $("#H-table1 li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over1").hide();
                         $(".H-over1:eq(" + _index + ")").show();
                     }
                 })(i));
             });
         });
     </script>
    <style>
      .info{
            /*border:1px solid blue;*/
            width:50%;
            margin-left: 25%;
            margin-left:300px;
            font-size: 30px;
        }
        .info #success{
            display: none;
            margin-top:30px;
            height:60px;
            line-height: 60px;
            text-align:center;
            border:5px solid #EA4949FF;
            border-radius:20px;
            background:#37ADEFFF;
        }
        .info #error{
            display: none;
            margin-top:30px;
            height:60px;
            line-height: 60px;
            text-align:center;
            border:5px solid #37ADEFFF;
            border-radius:20px;
            background:#EA4949FF;
        }
        .cart-empty{
            /*border:1px solid red;*/
            width:80%;
            height:300px;
            margin-top:80px;
            margin-left:10%;
        }
        .txt{
            font-size:40px;
            font-family:'楷体';
            font-weight:bold;
            /*border:1px solid red;*/
            text-align:center;
            margin-top:60px;
        }
        .ftx-05{
            /*border:1px solid red;*/
            display: block;
            margin-top:100px;
            font-size:24px;
            text-align:center;
        }
    </style>
@endsection

@section('con')
            <div class="member-right fr">

                <div class="member-head">
                    <form action="/home/myCollect" method="post" name="form1">
                      <div class="member-heels fl"><h2>我的收藏</h2></div>
                      <div class="member-backs member-icons fr"><a type="submit" href="javascript:document.form1.submit();">搜索</a></button></div>
                      {{csrf_field()}}
                      <div class="member-about fr"><input type="text" placeholder="商品名称" name="gname"></div>
                    </form>
                </div>

                <div class="member-switch clearfix">
                    <ul id="H-table" class="H-table">
                        <li><a href="javascript:void(0)">我的收藏的商品</a></li>
                        <li class="cur"><a href="javascript:void(0)">我收藏的店铺</a></li>
                    </ul>
                </div>

                <div class="member-border">
                  <form action="/home/coldel" method="post" name="form2">

                   <div class="member-return H-over"  style="display:none;">
                        <div class="cart-empty " style='display:none'>
                            <div class="message">
                                <ul>
                                    <li class="txt">
                                        <i class="fa fa-envelope-open-o" aria-hidden="true"></i>收藏夹空空的哦~，去看看心仪的商品吧~
                                    </li>
                                    <li class="mt10">
                                        <a href="/" class="ftx-05">
                                            看看就看看😊 &gt;&gt;&gt;
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="alls">
                           <div class="member-troll clearfix">
                               <div class="member-all fl"><input type="checkbox" class="gall"> 全选</div>
                               {{csrf_field()}}
                               <div class="member-check clearfix fl"> <a href="javascript:document.form2.submit();" class="member-delete" >删除商品</a> </div>
                           </div>
                           <div class="time-border-list pc-search-list member-all1 clearfix">
                               <ul class="clearfix">
                                  @foreach($goods as $v)
                                   <li class="li-g">
                                       <a href="/home/goods/{{$v['gid']}}"> <img width="233" height="240" src="{{$v['gpic']}}"></a>
                                       <p class="head-name"><input class="chgood" type="checkbox" name="good[]" value="{{$v['gid']}}"><a href="/home/goods/{{$v['gid']}}"> {{$v['gname']}} </a> <a class="fr" href="#">进入店铺</a></p>
                                       <p><span class="price"><i class="fa fa-jpy" aria-hidden="true"></i> {{$v['price']}}</span></p>
                                   </li>
                                   @endforeach

                               </ul>
                               <div class="clearfix" style="padding:30px 20px;">
                                  <div class="fr pc-search-g pc-search-gs">
                                      <span class="pc-search-di">当前是第{{$goods->currentPage()}}页</span>
                                      <a  class="fl " href="{{$goods->previousPageUrl()}}">上一页</a>
                                      <a class="" href="{{$goods->nextPageUrl()}}">下一页</a>
                                  </div>
                              </div>
                           </div>
                       </div>
                   </div>
                  </form>
                  <script>
                    $('.gall').click(function(){
                      //console.log(this.checked);
                        if (this.checked) {

                            console.log($('.chgood').prop('checked',true));

                        } else {
                            $('.chgood').prop('checked',false);
                        }
                    })
                    function nums(){
                        //获取tr 的数量
                        var rs = $('.li-g').length;
                        if(rs == 0){
                            $('.cart-empty').show();
                            $('.alls').hide();
                        }

                    }
                    nums();
                  </script>
                   <div class="member-return H-over stroe">
                    @if(count($stroe)>0)
                       <div class="member-troll clearfix">
                           <div class="member-all fl"><b class="on"></b>全选</div>
                           <div class="member-check clearfix fl"> <a href="javascript:void(0)" class="member-delete sdel">删除店铺</a> </div>
                       </div>
                       <div class="member-vessel">
                           <ul>
                            @foreach($stroe as $v)
                               <li class="clearfix">
                                   <div class="member-tenant fl clearfix">
                                       <div class="fl member-all1 member-all2"><b class="on" sid="{{$v->id}}"></b></div>
                                       <div class="fr">
                                           <a href="#"><img src="{{$v->image}}" width="150" height="114" title=""></a>
                                           <p>{{$v->company}}</p>
                                           <p><a href="/home/stroe/{{$v->id}}" class="member-shops">进入店铺</a> </p>
                                           <p>店铺掌柜：{{$v->uname}}</p>
                                           <p>{{ceil((time()-strtotime($v->create_at))/(3360*24*30*12))}}年老店</p>
                                       </div>
                                   </div>
                                  @php
                                    $res = DB::table('goods')->where('company',$v->id)->where('status','1')->take(4)->get();
                                  @endphp
                                   <div class="member-volume fl">
                                       <a href="javascript:void(0)" class="fl member-btn-fl"></a>
                                       <div class="member-cakes fl">
                                           <ul>
                                            @foreach($res as $vv)
                                               <li>
                                                   <a href="/home/goods/{{$vv->gid}}"><img src="{{$vv->gpic}}" width="125" height="125" title=""></a>
                                                   <p>￥{{$vv->price}}.00</p>
                                               </li>
                                            @endforeach
                                           </ul>
                                       </div>
                                       <a href="javascript:void(0)" class="fr member-btn-fr"></a>
                                   </div>
                               </li>
                            @endforeach
                           </ul>
                       </div>
                    @else
                      <div class="cart-empty ">
                        <div class="message">
                            <ul>
                                <li class="txt">
                                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>收藏夹空空的哦~，去看看心仪的店铺吧~
                                </li>
                                <li class="mt10">
                                    <a href="/" class="ftx-05">
                                        看看就看看😊 &gt;&gt;&gt;
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                   </div>
                  <script type="text/javascript">
                    $('.stroe b').click(function(){
                      var a = $(this).attr('class');
                      if (a == 'on') {
                        $(this).attr('class','off');
                      } else {
                        $(this).attr('class','on');
                      }
                    })
                    $('.stroe b').eq(0).click(function(){
                       var a = $(this).attr('class');
                       $('.stroe b').attr('class',a);
                    })
                    $('.stroe .sdel').click(function(){
                      var id = [];
                      $('.stroe b').each(function(){
                        id.push($(this).attr('sid'));
                      })
                      ids = id.join(',');
                      // console.log(id);
                      location.href='/home/stroedel/'+ids;
                    })

                  </script>
                </div>
            </div>
        </div>
    </section>
    <!-- 商城快讯 End -->

@endsection