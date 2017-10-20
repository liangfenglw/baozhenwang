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
        <div class="IAhead"><strong style="padding-right: 10px;">内容管理</strong><a href="{{ route('artice.A_fenlei_list') }}" class="cur">内容分类</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right"><font color="red">*</font>上级栏目：</td>
                        <td><select name="">
                          <option>一级栏目</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>栏目名称：</td>
                        <td><input type="text" name="sort_name" value="" class="Iar_input"></td>


                    </tr>
                    <tr>
                        <td align="right">排列顺序：</td>
                        <td><input type="text" name="sort_num" value="" class="Iar_inpun"/></td>
                    </tr>
                    <tr>
                        <td align="right">状态：</td>
                        <td><input type="radio" name="radio" id="enable" value=""> 启用&nbsp;&nbsp;&nbsp; <input type="radio" name="radio" id="ban" value=""> 禁止</td>
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
