/*
//编辑器
	var editor = new wangEditor('texDiv');
	// 上传图片
	editor.config.uploadImgUrl = "{{route('user.Pic_upload')}}";
	// 配置自定义参数
	editor.config.uploadParams = {
		_token: '{{csrf_token()}}',
		user: '{{Auth::id()}}'
	};
	// 设置 headers（举例）
	editor.config.uploadHeaders = {
		'Accept': 'text/x-json'
	};
	// 隐藏掉插入网络图片功能。该配置，只有在你正确配置了图片上传功能之后才可用。
	editor.config.hideLinkImg = false;
	editor.create();

	var editor2 = new wangEditor('texDiv2');
	editor2.create();

	var editor3 = new wangEditor('texDiv3');
	editor3.create();
	
	var editor4 = new wangEditor('texDiv4');
	editor4.create();
	
	var editor5 = new wangEditor('texDiv5');
	editor5.create();
*/	
	
//商品规格
	$("#lanmu_leixing").change(function(){
		var value = $(this).val();
		console.log(value);
		$("#shangpin_fenlei").empty()
			.append("<option value='x'>" + value + "1</option>")
			.append("<option value='x'>" + value + "2</option>")
			.append("<option value='x'>" + value + "3</option>");
		$("#yishujia").empty()
			.append("<option value='x'>" + value + "21</option>")
			.append("<option value='x'>" + value + "22</option>")
			.append("<option value='x'>" + value + "23</option>");
		resetGuigeList();
	});
	
	var data ={
                        data: [
                            {
                                "desc": "分类", "name": "裙子", "id": "3", "sub": [
									{
										"desc": "属性", "name": "颜色", "id": "1", "sub": [
										{"desc": "规格", "name": "白色", "id": "1", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "黑色", "id": "2", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "红色", "id": "3", "kucun": 0, "jiage": 0}
									]
									},
									{
										"desc": "属性", "name": "尺寸", "id": "2", "sub": [
										{"desc": "规格", "name": "S", "id": "4", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "M", "id": "5", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "L", "id": "6", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "XL", "id": "7", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "XLL", "id": "8", "kucun": 0, "jiage": 0}
									]
									},
									{
										"desc": "属性", "name": "布料", "id": "3", "sub": [
										{"desc": "规格", "name": "纯棉", "id": "9", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "羽绒", "id": "10", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "蝉丝", "id": "11", "kucun": 0, "jiage": 0}
									]
									},
									{
										"desc": "属性", "name": "产地", "id": "4", "sub": [
										{"desc": "规格", "name": "深圳", "id": "12", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "广州", "id": "13", "kucun": 0, "jiage": 0},
										{"desc": "规格", "name": "河南", "id": "14", "kucun": 0, "jiage": 0}
									]
									}
								]
                            },
							{
								"desc": "分类", "name": "裙子", "id": "2", "sub": [
									{
										"desc": "属性", "name": "颜色", "id": "5", "sub": [
											{"desc": "规格", "name": "白色", "id": "1", "kucun": 0, "jiage": 0},
											{"desc": "规格", "name": "黑色", "id": "2", "kucun": 0, "jiage": 0},
											{"desc": "规格", "name": "红色", "id": "3", "kucun": 0, "jiage": 0}
										]
									},
								]
							}
                        ]
	}
	var data3 = data.data;
//	console.log("data3:", JSON.stringify(data3, null, "\t"));		//格式化输出json
	
	
	//上传图片
	function GetUploadify3(k) {
                        cur_item_id = k; //当前规格图片id
//		console.log("k",k);
                        $('input#upfile_n').click();
                        option_n = {
                            url: "http://lingdang.laba.tw/Pic_upload",
                            type: "post",
                            data: {return_type: "string"},
                            enctype: 'multipart/form-data',
                            success: function (ret) {
                                console.log(ret)
//				console.log("cur_item_id", cur_item_id);
                                if (typeof(ret) == "string") {
                                    ret = JSON.parse(ret);
                                }
                                if (ret.sta == "1") {
                                    layer.msg('文件上传成功');
                                    $("#item_img_" + cur_item_id).attr("src", ret.data.url);
                                    $("#item_img_" + cur_item_id).attr("data-md5", ret.data.md5);
                                } else {
                                    layer.msg(ret.msg);
                                }
                            },
                            error: function (ret) {
                                layer.msg("网络错误");
                                console.log(ret);
                            },
                            clearForm: false,
                            timeout: 100000
                        };
                        $("input#upfile_n").change(function () {
                            $("#form_n").ajaxSubmit(option_n);
                            $('input#upfile_n').unbind("change");
                            $('input#upfile_n').remove();
                            var count_n = $("#form_n").attr("data");
                            count_n++;
                            $("#form_n").attr("data", count_n);
                            $("#form_n").append('<input type="file" name="file" id="upfile_n" data="' + count_n + '" />');
                        });
	}
	
	
	//显示规格列表
	function resetGuigeList() {
                        var str = "";
//						var fenlei = $("#select_id_1").val();
                        var fenlei = $("#lanmu_leixing").val();
//						console.log("fenlei",fenlei);
                        $.each(data3, function (i, itemi) {//
							console.log("itemi.id",itemi.id);
                            if (itemi.id == fenlei) {
                                $.each(itemi.sub, function (j, itemj) {
                                    str += "<tr>";
                                    str += "<td><span>" + itemj.name + "</span>:</td>";
                                    str += "<td>";
                                    $.each(itemj.sub, function (k, itemk) {
                                        str += '<button type="button" data-spec_id="' + itemj.id + '" data-item_id="' + itemk.id + '" class="btn btn-default">' + itemk.name + '</button>';
                                        str += '<img width="35" height="35" src="/images/add-button.jpg" id="item_img_' + itemk.id + '" onclick="GetUploadify3(\'' + itemk.id + '\');">';
                                        str += '&nbsp;&nbsp;&nbsp;';
                                    });
                                    str += "</td>";
                                    str += "</tr>";
                                });
                            }
                        });
                        if (str == "") {
                            str = "<tr><td></td><td></td></tr>";
                        }
//						console.log("str",str);
                        $("#guige_list table#goods_spec_table1 tbody").html(str);
	}

	//规格列表的 规格 点击事件
	$("#goods_spec_table1 tbody").on("click", "tr td button", function () {
		$(this).toggleClass("btn-default btn-success");
		resetGuigeList2();
	});

	//显示 价格、库存 输入列表
	function resetGuigeList2() {
                        if ($("#goods_spec_table1 button.btn-success").length > 0) {
                            ajaxGetSpecInput();
                        } else {
                            var str1 = "<tr><th>价格</th><th>库存</th></tr>";
                            var str2 = "<tr><td></td><td></td></tr>";
                            $("#spec_input_tab thead").html(str1);
                            $("#spec_input_tab tbody").html(str2);
                        }
	}


































