

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
		
	});
	
	
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