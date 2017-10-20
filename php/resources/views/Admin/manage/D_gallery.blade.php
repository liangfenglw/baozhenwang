@extends('Admin.layout.main')

@section('title', '用户管理')

@section('content')
	<script src="{{ url('/css/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('/css/distpicker.data.js') }}"></script>
	<script src="{{ url('/css/distpicker.js') }}"></script>

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
        <div class="IAhead"><strong style="padding-right: 10px;">用户管理</strong><a href="{{ route('manage.D_gallery_list') }}" class="cur">画廊</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="">
                <table width="100%"  cellspacing="0" cellpadding="0">
                	
                    <tr>
                        <td align="right" width="120"><font color="red">*</font>画廊名称：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>画廊主页展示图：</td>
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
                        <td align="right"><font color="red">*</font>联系人：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>手机：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>邮箱：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>画廊地址：</td>
                        <td><input  type="text"  value="" class="Iar_input"></td>
                    </tr> 
                    <tr>  
                        <td align="right" width="120"><font color="red">*</font>展厅背景图：</td>
                        <td align="center" style="padding-top:10px; float:left;">  
                        <form method="get" action="xznetwork" name="textfile">  <input type="file" name="file" id="Show" multiple="multiple" style="width:450px;" onchange="javascript:setImageShow();">   </form>  
                        </td>  
                     <tr>
                        <td align="right" width="120">&nbsp;</td>
                        <td id="localShow"></td>
                     </tr>  
                    </tr>  
<script language="javascript" type="text/javascript">  
var i=1;  
//下面用于图片上传预览功能  
function setImageShow(avalue) {  
    html = "<td width='100px;'><img id='preview"+i+"'  src='{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}' style='margin:0 5px;border: 1px solid #eee; '/></td>"  
    $("#localShow").append(html);  
    //input  
    var docObj = document.getElementById("Show");  
    //img  
    var imgObjPreview = document.getElementById("preview"+i);  
    //div  
    var divs = document.getElementById("localShow");  
    if (docObj.files && docObj.files[0]) {  
        //火狐下，直接设img属性  
        imgObjPreview.style.display = 'block';  
        imgObjPreview.style.width = '100px';  
        imgObjPreview.style.height = '100px';  
        //imgObjPreview.src = docObj.files[0].getAsDataURL();  
        //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式  
       imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);  
        i++;  
    } else {  
        //IE下，使用滤镜  
        docObj.select();  
        var imgSrc = document.selection.createRange().text;  
        var localImagId = document.getElementById("localShow");  
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
       i++;  
    }  
    return true;  
}  
</script> 
                    <tr>
                        <td align="right"><font color="red">*</font>画廊介绍：</td>
                       <td><textarea name="" class="describe">画廊介绍编辑器</textarea></td>
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
