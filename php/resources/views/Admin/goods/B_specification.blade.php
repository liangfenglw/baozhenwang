@extends('Admin.layout.main')

@section('title', '商品管理')

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
    <style type="text/css">
.specifications {
    width: 45%;
    height: 100px;
}
    </style>
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_shuxing_list') }}" class="cur">商品属性</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="">
                <table width="100%" cellspacing="0" cellpadding="0">
                	<tr>
                        <td align="right"><font color="red">*</font>商品分类：</td>
                        <td><select name="">
                          <option>买艺术</option>
                          <option>租艺术</option>
                          <option>拍艺术</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品属性：</td>
                        <td><select name="">
                          <option>装裱框</option>
                          <option>留白</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>规格项：</td>
                        <td><textarea name="format" value="" class="specifications"></textarea><i>多项可以"豆号"分隔</i></td>
                    </tr>
                    <tr height="60px">
                        <td align="right"></td>
                        <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
        
@endsection

@section('footer_related')
    

@endsection
