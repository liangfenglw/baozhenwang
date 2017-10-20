

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