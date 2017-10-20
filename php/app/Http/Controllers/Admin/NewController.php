<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
class NewController extends Controller
{

 public function A_fenlei_list(){
 
  	return view('Admin.artice.A_fenlei_list');
  }
 public function A_fenlei(){
  	return view('Admin.artice.A_fenlei');
  }
 public function A_wenzhang_list(){
 	return view('Admin.artice.A_wenzhang_list');
  }
 public function A_wenzhang(){
  	return view('Admin.artice.A_wenzhang');
  }

 public function B_lanmu_list(){
  	return view('Admin.goods.B_lanmu_list');
  }
 public function B_shangbin(){
  	return view('Admin.goods.B_shangbin');
  }
 public function B_zhigou_list(){
  	return view('Admin.goods.B_zhigou_list');
  }
 public function B_zuren_list(){
  	return view('Admin.goods.B_zuren_list');
  }
 public function B_zhendou_list(){
  	return view('Admin.goods.B_zhendou_list');
  }
 public function B_yijia_list(){
  	return view('Admin.goods.B_yijia_list');
  }
 public function B_feimai_list(){
  	return view('Admin.goods.B_feimai_list');
  }
 public function B_zhuanshou_list(){
  	return view('Admin.goods.B_zhuanshou_list');
  }
 public function B_xianxia_list(){
  	return view('Admin.goods.B_xianxia_list');
  }
 public function B_dingdan_list(){
  	return view('Admin.goods.B_dingdan_list');
  }
  public function B_yimai_list(){
  	return view('Admin.goods.B_yimai_list');
  }
   public function B_lanmu(){
    return view('Admin.goods.B_lanmu');
  }
 public function B_dingdan_completelist(){
    return view('Admin.goods.B_dingdan_completelist');
  }
 public function B_dingdan_deliverylist(){
    return view('Admin.goods.B_dingdan_deliverylist');
  }
 public function B_dingdan_Nodeliverylist(){
    return view('Admin.goods.B_dingdan_Nodeliverylist');
  }
 public function B_dingdan_backlist(){
    return view('Admin.goods.B_dingdan_backlist');
  }
 public function B_dingdan_read(){
    return view('Admin.goods.B_dingdan_read');
  }
 public function B_backlist_read(){
    return view('Admin.goods.B_backlist_read');
  }
 public function B_dingdan_rented(){
    return view('Admin.goods.B_dingdan_rented');
  }
 public function B_shuxing_list(){
    return view('Admin.goods.B_shuxing_list');
  }
 public function B_shuxing(){
    return view('Admin.goods.B_shuxing');
  }
 public function B_specification(){
    return view('Admin.goods.B_specification');
  }
 public function B_dingzhi_list(){
    return view('Admin.goods.B_dingzhi_list');
  }
 public function B_paimai_list(){
    return view('Admin.goods.B_paimai_list');
  }
 public function B_dingdana1_list(){
    return view('Admin.goods.B_dingdana1_list');
  }
 public function B_dingdana2_list(){
    return view('Admin.goods.B_dingdana2_list');
  }
 public function B_dingdana3_list(){
    return view('Admin.goods.B_dingdana3_list');
  }
 public function B_dingdana4_list(){
    return view('Admin.goods.B_dingdana4_list');
  }
 public function B_dingdana2_completelist(){
    return view('Admin.goods.B_dingdana2_completelist');
  }
 public function B_dingdana2_deliverylist(){
    return view('Admin.goods.B_dingdana2_deliverylist');
  }
 public function B_dingdana2_Nodeliverylist(){
    return view('Admin.goods.B_dingdana2_Nodeliverylist');
  }
 public function B_dingdana4_completelist(){
    return view('Admin.goods.B_dingdana4_completelist');
  }
 public function B_dingdana4_deliverylist(){
    return view('Admin.goods.B_dingdana4_deliverylist');
  }
 public function B_dingdana4_Nodeliverylist(){
    return view('Admin.goods.B_dingdana4_Nodeliverylist');
  }

 public function C_huandengpian_list(){
  	return view('Admin.interface.C_huandengpian_list');
  }
 public function C_huandengpian(){
  	return view('Admin.interface.C_huandengpian');
  }

 public function D_huiyuan_list(){
  	return view('Admin.manage.D_huiyuan_list');
  }
 public function D_yisujia_list(){
  	return view('Admin.manage.D_yisujia_list');
  }
 public function D_yisujia(){
  	return view('Admin.manage.D_yisujia');
  }
 public function D_huiyuan(){
  	return view('Admin.manage.D_huiyuan');
  }
 public function D_gallery_list(){
    return view('Admin.manage.D_gallery_list');
  }
   public function D_gallery(){
    return view('Admin.manage.D_gallery');
  }

 public function E_chongzhi(){
    return view('Admin.account.E_chongzhi');
  }
 public function E_consumption(){
    return view('Admin.account.E_consumption');
  }
 public function E_hongbao_list(){
    return view('Admin.account.E_hongbao_list');
  }
   public function E_hongbao(){
    return view('Admin.account.E_hongbao');
  }

}

