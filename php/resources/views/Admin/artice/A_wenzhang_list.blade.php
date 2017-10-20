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
        <div class="IAhead"><strong style="padding-right: 10px;">内容管理</strong><a href="{{ route('artice.A_wenzhang_list') }}" class="cur">文章管理</a>|<a href="{{ route('artice.A_wenzhang') }}">添加文章</a>|</div>
        <div class="IAMAIN_list" style="margin-top:15px; margin-bottom:5px;">
        	<div class="Alist">
                <form method="post" action="">
                    <input type="hidden" name="_token" value="">
                    <table width="" cellspacing="0" cellpadding="0" style="float: right; margin-right: 30px;">
                        <tbody><tr>
                        	<td><select name="">
                              <option>文章标题</option>
                        	  <option>所属栏目</option>
                              <option>关联艺术家</option>
                              <option>关联画廊</option>
                        	</select></td>
                            <td><input type="text" name="keyword" value="" class="Iar_list" placeholder="搜索标题、栏目类型、艺术家"></td>
                            <td><input type="submit" name="dosubmit" class="button" value="搜 索"></td>
                        </tr> 
                    </tbody></table>
                </form>
            </div>
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;"><input name="" type="checkbox" value=""  style="margin: 10px 5px 0 0px;"/> <a href="">全选删除</a></th>
                            <th style="text-align:left;text-indent: 30px">文章标题</th>
                            <th>发布时间</th>
                            <th>所属栏目</th>  
                            <th>关联画廊</th> 
                            <th>关联艺术家</th>  
                            <th style="width: 180px;">管理操作</th>
                        </tr>
                        
                        <tr class="Alist_main">
                            <td class="IMar_list"/><input name="" type="checkbox" value="" /></td>
                            <td style="text-align:left;text-indent: 30px">兆宝洗护新品发布｜赋活奇迹，滋养之源。一起感受自然力量</td>
                            <td>2017-07-19</td>
                            <td>艺笔艺画</td>
                            <td>画廊名称</td>
                            <td>admin</td>
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
