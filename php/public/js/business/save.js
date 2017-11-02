$('.subbutton').click(function () {

    //获取栏目
    var genre = $("#lanmu_leixing").val();
    var classify = $("#shangpin_fenlei").val();
    var artists = $("#yishujia").val();//艺术家
    var artclass = $("#artclass").val();//艺术类别
    var theme = $("#theme").val();//题材
    var CommodityName = $("input[name='CommodityName']").val();//商品名称
    var ExhibitionHall = '';//画廊
    if ($('.ExhibitionHall').is(':checked')) {
        ExhibitionHall = 1;
    } else {
        ExhibitionHall = 0;
    }
    var Iar_list=$('.Iar_list').val();//装裱框
    var FramedBox=$('.IarListTy').val();//
    debugger
});