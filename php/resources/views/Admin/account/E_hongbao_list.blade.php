@extends('Admin.layout.main')

@section('title', '账户管理')

@section('content')
<link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css">
    <!--<div class="main-container">
        <div class="container-fluid">
            @include('Admin.layout.breadcrumb', [
                'title' => '用户管理',
                'breadcrumb' => [
                '用户中心' => '',
                    '用户管理' => ''
                ]
            ])
        </div>
    </div>-->
    
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">账户管理</strong><a href="{{ route('account.E_hongbao_list') }}" class="cur">优惠红包</a>|<a href="{{ route('account.E_hongbao') }}">发送红包</a>|</div>
        <div class="IAMAIN_list" style="margin-top:15px; margin-bottom:5px;">
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 100px;">UID</th>
                            <th>优惠名称</th>
                            <th>红包面额</th>
                            <th>最低消费金额</th>
                            <th>发放数量</th>
                            <th>使用起始日期</th>
                            <th>使用结束日期</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        <tr class="Alist_main">
                            <td class="IMar_list"/>12</td>
                            <td>优惠名称</td>
                            <td><font color="red">￥0.0</font></td>
                            <td><font color="red">￥0.0</font></td>
                            <td>120</td>
                            <td>2017-11-20</td>
                            <td>2017-12-20</td>
                            <td>启用</td>
                            <td><a href="{{ route('account.E_hongbao') }}">修改 </a>|<a href=""> 删除</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    
  <script type="text/javascript">
        $(function () {
            var _token = $('input[name="_token"]').val();
            $('.support_dele').click(function () {
                var id=$(this).attr('data_id');
                layer.confirm('确认删除此分类', {
                    btn: ['确认','取消'], //按钮
                    title:false,
                }, function(){
                    $.ajax({
                        url: "{{'sort.destroy'}}",
                        data: {
                            'id': id,
                            '_token': _token
                        },
                        type: 'post',
                        dataType: "json",
                        stopAllStart: true,
                        success: function (data) {
                            if (data.sta == '1') {
                                layer.msg(data.msg, {icon: 1});
                                setTimeout(window.location.reload(), 1000);
                            } else {
                                layer.msg(data.msg || '请求失败');
                            }
                        },
                        error: function () {
                            layer.msg(data.msg || '网络发生错误');
                            return false;
                        }
                    });
                }, function(){
                    layer.msg('取消成功',{icon: 1});
                });
            });
        });
        @if(Session::has('msg'))
        layer.msg('{{Session::get('msg')}}');
        @endif
    </script>      
@endsection

@section('footer_related')
    

@endsection
