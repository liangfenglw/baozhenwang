@extends('Admin.layout.main')

@section('title', '内容管理')

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
        <div class="IAhead"><strong style="padding-right: 10px;">内容管理</strong><a href="{{ route('artice.A_fenlei_list') }}" class="cur">内容分类</a>|<a href="{{ route('artice.A_fenlei') }}">添加内容分类</a>|</div>
        <div class="IAMAIN_list">
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;">排序</th>
                            <th style="text-align:left;text-indent: 50px">栏目名称</th>
                            <th>状态</th>
                            <th style="width: 250px;">管理操作</th>
                        </tr>
                        
                        <tr class="Alist_main">
                            <td class="IMar_list"/>1</td>
                            <td style="text-align:left;text-indent: 50px">艺笔艺画</td>
                            <td>启用</td>
                            <td><a href="">添加子栏目 </a> | <a href="">修改 </a>|<a href=""> 删除</a></td>
                        </tr>
                        <tr class="Alist_main">
                            <td class="IMar_list"/>2</td>
                            <td style="text-align:left;text-indent: 50px">├─艺笔艺画二级导航</td>
                            <td>禁止</td>
                            <td><a href="">修改 </a>|<a href=""> 删除</a></td>
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
