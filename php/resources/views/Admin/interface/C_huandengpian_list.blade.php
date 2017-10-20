@extends('Admin.layout.main')

@section('title', '界面设置')

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
        <div class="IAhead"><strong style="padding-right: 10px;">界面设置</strong><a href="{{ route('interface.C_huandengpian_list') }}" class="cur">壁纸管理</a>|<a href="{{ route('interface.C_huandengpian') }}">添加壁纸</a>|</div>
        <div class="IAMAIN_list">
        	
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;">编号</th>
                            <th>壁纸图片</th>
                            <th style="width: 180px;">管理操作</th>
                        </tr>
                        
                        <tr class="Alist_main">
                            <td class="IMar_list"/>1</td>
                            <td><img src="{{url('images/touxiang_gg.jpg')}}" style="width:auto; height: 50px; margin: 5px 0;"></td>
                            <td><a href="">修改 </a>|<a href=""> 删除</a></td>
                        </tr>
                        
                    </table>
                </form>
            </div>
            
        </div>
    </div>
@endsection

@section('footer_related')
    

@endsection
