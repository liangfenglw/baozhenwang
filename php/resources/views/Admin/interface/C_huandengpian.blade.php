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
        <div class="IAhead"><strong style="padding-right: 10px;">界面设置</strong><a href="{{ route('interface.C_huandengpian_list') }}" class="cur">壁纸管理</a>|</div>
        <div class="IAMAIN">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="right"><font color="red">*</font>壁纸名称：</td>
                    <td><input type="text" name="file_name" value="" class="Iar_input"></td>
                </tr>
                <tr>
                    <td align="right">缩略图：</td>
                    <td>
						<div class="" style="position:relative;">
							<form method="get" action="xznetwork" name="textfile"> <input type="file" name="file" id="doc" multiple="multiple" style="width:450px;" onchange="javascript:setImagePreview();"></form>
						</div>
					</td>
                </tr>
				<tr>
					<td align="right"></td>
					<td>							
						<img id="preview" src="{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}" width="100" height="100" style="display: block;" />
					</td>
				</tr>
					
					<script type="text/javascript">
            //下面用于图片上传预览功能
            function setImagePreview(avalue) {
            //input
                var docObj = document.getElementById("doc");
//img
                var imgObjPreview = document.getElementById("preview");
                //div
                var divs = document.getElementById("localImag");
                if (docObj.files && docObj.files[0]) {
                    //火狐下，直接设img属性
                    imgObjPreview.style.display = 'block';
                    imgObjPreview.style.width = '100px';
                    imgObjPreview.style.height = '100px';
                    //imgObjPreview.src = docObj.files[0].getAsDataURL();
                    //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                   imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                } else {
                    //IE下，使用滤镜
                    docObj.select();
                    var imgSrc = document.selection.createRange().text;
                    var localImagId = document.getElementById("localImag");
                    //必须设置初始大小
                    localImagId.style.width = "100px";
                    localImagId.style.height = "100px";
                    //图片异常的捕捉，防止用户修改后缀来伪造图片
                    try {
                        localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                        localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                    } catch(e) {
                        alert("您上传的图片格式不正确，请重新选择!");
                        return false;
                    }
                    imgObjPreview.style.display = 'none';
                    document.selection.empty();
                }
                return true;
            }
        </script>
                <tr>
                    <td align="right"><font color="red">*</font>图片链接：</td>
                    <td><input type="text" name="file_name" value="" class="Iar_input"></td>
                </tr>
                <tr>
                    <td align="right">排列顺序：</td>
                    <td><input type="text" name="number" value="" class="Iar_inpun"/>
                    </td>
                </tr>

                <tr height="60px">
                    <td align="right"></td>
                    <td><input type="button" class="dosubmit" value="提 交"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('footer_related')
    

@endsection
