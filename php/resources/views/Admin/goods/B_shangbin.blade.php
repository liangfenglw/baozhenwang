@extends('Admin.layout.main')

@section('title', '内容管理')

@section('content')

<link rel="stylesheet" href="{{ url('/js/wangEditor/dist/css/wangEditor.min.css') }}" type="text/css">
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
    </div>-->|
    
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_zhigou_list') }}" class="cur">商品列表</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="">
                <table width="100%" cellspacing="0" cellpadding="0">
                    
                	<tr>
                        <td align="right"><font color="red">*</font>栏目类型：</td>
                        <td><select name="lanmu_leixing" id="lanmu_leixing">
                          <option value="1">直购系列</option>
                          <option value="2">租赁系列</option>
                          <option>甄豆系列</option>
                          <option>议价系列</option>
                          <option>定制系列</option>
                          <option>拍卖系列</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品分类：</td>
                        <td><select name="shangpin_fenlei" id="shangpin_fenlei">
                          <option>一级栏目</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>艺术家：</td>
                        <td><select name="yishujia" id="yishujia">
                          <option>艺术家列表</option>
                        </select></td>
                    </tr>
                    <tr>
                    	<td align="right" width="120"><font color="red">*</font>艺术类别：</td>
                        <td width="180"><div style="float:left;">
                            <select name="">
                              <option>全部</option>
                              <option>国画</option>
                              <option>油画</option>
                              <option>版画</option>
                              <option>雕塑</option>
                              <option>水彩</option>
                              <option>其他</option>
                            </select>
                        </div>
                        <div style="margin-left:20px; float:left;"><font color="red">*</font>题材：
                           <select name="">
                              <option>全部</option>
                              <option>抽象</option>
                              <option>书法</option>
                              <option>山水</option>
                              <option>风景</option>
                              <option>工笔</option>
                              <option>写意</option>
                              <option>静物</option>
                              <option>花鸟</option>
                              <option>人物</option>
                              <option>动物</option>
                              <option>其他</option>
                            </select>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品名称：</td>
                        <td><input type="text" name="" value="" class="Iar_input"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>缩略图：</td>
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
                    	<td align="right" width="120"><font color="red">*</font>展示图：</td>
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
                    <!--直购系列-->
                    <div class="zhigou" style="">
                        <tr>
                            <td align="right">商品属性：</td>
                            <td><input name="" type="checkbox" value="" /> 画馆展厅&nbsp;&nbsp;&nbsp; </td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>创作时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>作品尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>装裱状态：</td>
                            <td><select name="">
                              <option>未装裱</option>
                              <option>已装裱</option>
                            </select></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱框：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                        	<td align="right"><font color="red">*</font>装裱尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品装裱后宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>商品规格：</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="right">商品自述：</td>
                            <td>	<!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
								<div id="texDiv" class="texDiv" style="height:400px;max-height:500px;">
									<p>请输入内容...</p>
								</div>
							</td>
                        </tr>
                    </div>

                    <!--租赁系列-->
                    <div class="zuren" style="">
                        <tr>
                            <td align="right"><font color="red">*</font>创作时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>作品尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>装裱状态：</td>
                            <td><select name="">
                              <option>未装裱</option>
                              <option>已装裱</option>
                            </select></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱框：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品装裱后宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>租赁价：</td>
                            <td>
                                <div style="margin-right:20px; float:left;"><input type="text" name="" value="" class="Iar_inpun"  placeholder=" 直购价" style="margin-right: 10px;"><font color="red">元</font></div>
                                <div style="float:left;"><input type="text" name="" value="" class="Iar_inpun"  placeholder=" 租金" style="margin-right: 10px;"></div>
                                <div style="float:left;"><select name="" style="width: 60px;">
                                  <option>1月</option>
                                  <option>2月</option>
                                  <option>3月</option>
                                  <option>4月</option>
                                  <option>5月</option>
                                  <option>6月</option>
                                  <option>7月</option>
                                  <option>8月</option>
                                  <option>9月</option>
                                  <option>11月</option>
                                  <option>12月</option>
                                </select></div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>库存量：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun"></td>
                        </tr>
                        <tr>
                            <td align="right">商品自述：</td>
                            <td>	<!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
								<div id="texDiv2" class="texDiv" style="height:400px;max-height:500px;">
									<p>请输入内容...</p>
								</div>
							</td>
                        </tr>
                    </div>

                    <!--甄豆系列-->
                    <div class="zhendou" style="">
                        <tr>
                            <td align="right"><font color="red">*</font>甄豆价：</td>
                            <td>
                                <div style="margin-right:10px; float:left;"><input type="text" name="" value="" class="Iar_inpun"  placeholder=" 甄豆" style="margin-right: 10px;">+</div>
                                <div style="float:left;"><input type="text" name="" value="" class="Iar_inpun" placeholder=" 甄豆价" style="margin-right: 10px;"><font color="red">元</font></div>
                            </td>
                            <tr>
                                <td align="right"><font color="red">*</font>库存量：</td>
                                <td><input type="text" name="" value="" class="Iar_inpun"></td>
                            </tr>
                        </tr>
                        <tr>
                            <td align="right">商品自述：</td>
                            <td>	<!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
								<div id="texDiv3" class="texDiv" style="height:400px;max-height:500px;">
									<p>请输入内容...</p>
								</div>
							</td>
                        </tr>
                    </div>
                    
                    <!--议价系列-->
                    <div class="yijia" style="">
                        <tr>
                            <td align="right"><font color="red">*</font>创作时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>作品尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>装裱状态：</td>
                            <td><select name="">
                              <option>未装裱</option>
                              <option>已装裱</option>
                            </select></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱框：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品装裱后宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>库存量：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun"></td>
                        </tr>
                        <tr>
                            <td align="right">商品自述：</td>
                            <td><textarea name="" class="describe">框架编辑器</textarea></td>
                        </tr>
                    </div>

                    <!--定制系列-->
                    <div class="dingzhi" style="">
                        <tr>
                            <td align="right"><font color="red">*</font>商品规格：</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>预计作画发货时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right">商品自述：</td>
                            <td><textarea name="" class="describe">框架编辑器</textarea></td>
                        </tr>
                    </div>

                    <!--拍卖系列-->
                    <div class="dingzhi" style="">
                        <tr>
                            <td align="right"><font color="red">*</font>创作时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>作品尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>装裱状态：</td>
                            <td><select name="">
                              <option>未装裱</option>
                              <option>已装裱</option>
                            </select></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱框：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr><!--选择已装裱显示，未装裱隐藏-->
                            <td align="right"><font color="red">*</font>装裱尺寸：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text" name="" value="" class="Iar_inpun"> <i>作品装裱后宽*高（cm）</i></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>起拍价：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;&nbsp;<font color="red">元</font></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>涨幅价：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;&nbsp;<font color="red">元</font></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>保证金：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;&nbsp;<font color="red">元</font></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>开拍时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>结束时间：</td>
                            <td><input type="text" name="" value="" class="Iar_list"></td>
                        </tr>
                        <tr>
                            <td align="right"><font color="red">*</font>库存量：</td>
                            <td><input type="text" name="" value="" class="Iar_inpun"></td>
                        </tr>
                    </div>

                     <tr>
                        <td align="right"><font color="red">*</font>商品详情：</td>
                        <td><textarea name="" class="describe">框架编辑器</textarea></td>
                     </tr>
					 
					 <tr>
						<td align="right"><font color="red">*</font>状态：</td>
						<td><label class="lb_radio"><input type="radio" name="status" value="1" />发布</label>
							<label class="lb_radio"><input type="radio" name="status" value="0" />禁用</label></td>
					 </tr>
					 
                    <tr height="60px">
                        <td align="right"></td>
                        <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

	<script type="text/javascript" src="/js/wangEditor/dist/js/wangEditor.min.js"></script>
	<script type="text/javascript" src="/js/shangbin.js"></script>
        
@endsection

@section('footer_related')
    

@endsection
