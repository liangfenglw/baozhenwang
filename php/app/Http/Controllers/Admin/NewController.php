<?php

namespace App\Http\Controllers\Admin;

use App\Models\Column;
use Illuminate\Http\Request;
use App\Models\Sort;
use App\Models\Attributes;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use DB;
use Redirect;
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
/*
* 分类查询
*/
 public function B_lanmu_list(){
	 
	     $sort = Sort::join("column","column.id","=","sort.cid")->where(['sort.type' => '1', 'pid' => "0"])
                ->select('sort.id', 'pid', 'sort.name as name','column.name as cname',"whether")
                ->orderBy('id', 'asc')
                ->orderBy('num', 'asc')
               ->get()
               ->toArray();
	    if (!empty($sort)) {
            foreach ($sort as $key => &$vel) {
                $sort[$key]['child'] = Sort::join("column","column.id","=","sort.cid")->where('pid', $vel['id'])->where(['sort.type' => '1'])->select('sort.id', 'pid', 'sort.name as name','column.name as cname',"whether")->get()->toArray();
            }
        }
		//dd($sort);
        return view('Admin.goods.B_lanmu_list', ['sort' => $sort]);
	 
  
  }
  /*
  * 删除分类
  */
  public function sort_del(){
	  $sid=Input::get("id");
	  $sort_del=Sort::where("id","=",$sid)->orwhere("pid","=",$sid)->delete();
	    return json_decode(['msg' => '删除成功', 'sta' => '1', 'data' => ""]);
  }
  public function sort_up()
  {
			$id=Input::get("id");
			$column=Column::where("type","=","1")->get()->toArray();
			$sort_up=Sort::where("id","=",$id)
						->first();
	
       return view('Admin.goods.B_lanmu', ['sort_up' =>$sort_up,'column'=>$column]);
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
	   
    $id=Input::get('id');
    if(!empty($id))
   {
      $sorts= Sort::where(['type' => '1', 'pid' => "0"])->where("id","=",$id)->select('id','cid')->orderBy('id', 'asc')->first(); 
		$column=Column::where("type","=","1")->get()->toArray();
	   $sort = Sort::where(['type' => '1', 'pid' => "0"])->select('id', 'pid', 'name')->orderBy('id', 'asc')->get()->toArray();
	   
        //查询二级分类
        if (!empty($sort)) {
            foreach ($sort as $key => &$vel) {
                $sort[$key]['child'] = Sort::where('pid', $vel['id'])->select('id', 'name', 'img_path', 'content')->get()->toArray();
            }
        }

 return view('Admin.goods.B_lanmu', ['sort' => $sort,'column'=>$column,'sorts'=>$sorts]);    
   }
  else
  {
       $column=Column::where("type","=","1")->get()->toArray();
	   $sort = Sort::where(['type' => '1', 'pid' => "0"])->select('id', 'pid', 'name')->orderBy('id','asc')->get()->toArray();
	   
        //查询二级分类
        if (!empty($sort)) {
            foreach ($sort as $key => &$vel) {
                $sort[$key]['child'] = Sort::where('pid', $vel['id'])->select('id', 'name', 'img_path', 'content')->get()->toArray();
            }
        }
       return view('Admin.goods.B_lanmu', ['sort' => $sort,'column'=>$column,'sorts'=>""]);   
  }
   
	   
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
/*
* 查询属性的 规格
*/
 public function B_shuxing_list(){
	 
	 $attr_list=Attributes::join('sort',"sort.id","=","attributes.sort_id")->where("attributes.pid","=","0")
              ->select("arr_name","name","attributes.pid","attributes.id")->get()->toArray();
	 if($attr_list)
	 {
		 foreach ($attr_list as $key => &$vel) {
           $attr_list[$key]['childs'] = Attributes::where('pid', $vel['id'])->select('arr_name')->get()->toArray();   
			$attr_list[$key]['child']="";    
		foreach($attr_list[$key]['childs'] as $k=>$v)
					{
						$attr_list[$key]['child'].=$v["arr_name"].",";
				 
					}
		$attr_list[$key]['child']= substr($attr_list[$key]['child'],0,strlen($attr_list[$key]['child'])-1);
         } 
	 }
    return view('Admin.goods.B_shuxing_list',['attr_list'=>$attr_list]);
  }
  /*
  * 添加属性 
  */
public function add_attr()
{
	  $attr=new Attributes();
	  $data['sort_id']=Input::get("sort_id");
	  $data['arr_name']=Input::get("sort_name");
	  $data['store_num']=0;
	  $data['pid']=0;
        $msg = [
            'sort_id'=>"分类不能不选择",
            'arr_name.required' => "分类名称不能为空",
            'arr_name.min' => "分类名称不能少于两个字符",
            'arr_name.max' => "分类名称最大长度为10个字符",
            'arr_name.unique' => "改分类名称已被占用",
        ];
    
        $validator = Validator::make($data,$attr->rules()['create'],$msg);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		  $attrs = $attr->create($data);
		 if($attrs)
		 {
			  return Redirect('Admin/goods/B_shuxing_list');
			  
		 }
		 else
		 {
			  return back();
		 }
	  
		
}
/*
*  添加规格
*/
	public function add_specif()
	{  

			  $attr_list=Attributes::join('sort',"sort.id","=","attributes.sort_id")->where("attributes.pid","=","0")->where("sort_id","=",Input::get("id"))
						->where("attributes.id","=",Input::get('attrs_id'))
						->select("arr_name","name","attributes.pid","attributes.id")->first();
				 if($attr_list)
				 {
					
					   $attr_list['childs'] = Attributes::where('pid',Input::get('attrs_id'))->select('arr_name')->get()->toArray();   
						$attr_list['child']="";    
					foreach($attr_list['childs'] as $k=>$v)
								{
									$attr_list['child'].=$v["arr_name"].",";
							 
								}
					$attr_list['child']= substr($attr_list['child'],0,strlen($attr_list['child'])-1);

				 }

			if(empty($attr_list['child']))
			{
					$attr_name=explode(",",Input::get('format'));
					$attr_name=array_unique($attr_name);
					$attr=new Attributes();
					$data['sort_id']=Input::get("id");
					  $data['store_num']=0;
					  $data['pid']=Input::get('attrs_id');
					foreach($attr_name as $k=>$v){
							 $data['arr_name']=$v;
							  $attrs = $attr->create($data);
					}
			}
		else
		{
			$attr_del=Attributes::where("pid","=",Input::get('attrs_id'))->delete();
			if($attr_del)
			{

			 $attr_name=explode(",",Input::get('format'));
			 $attr_name=array_unique($attr_name);
				$attr=new Attributes();
				$data['sort_id']=Input::get("id");
				  $data['store_num']=0;
				  $data['pid']=Input::get('attrs_id');
				foreach($attr_name as $k=>$v){
						 $data['arr_name']=$v;
						  $attrs = $attr->create($data);
				}
			}
		 
		}
	return Redirect('Admin/goods/B_shuxing_list');
	}
public function attr_del()
{
$aid=Input::get('id');
$attr_del=Attributes::where('id',"=",$aid)->orwhere('pid',"=",$aid)->delete();
 return json_decode(['msg' => '删除成功', 'sta' => '1', 'data' => ""]);
}
 public function B_shuxing(){
	 $sort = Sort::where(['type' => '1', 'pid' => "0"])->select('id', 'pid', 'name')->orderBy('id', 'asc')->get()->toArray();
	   
        //查询二级分类
        if (!empty($sort)) {
            foreach ($sort as $key => &$vel) {
                $sort[$key]['child'] = Sort::where('pid', $vel['id'])->select('id', 'name', 'img_path', 'content')->get()->toArray();
            }
        }
	
		 return view('Admin.goods.B_shuxing', ['sort' => $sort]);
  }
 public function B_specification(){

		$id=Input::get("id");	
		$child=Input::get('child');
		$attr=Attributes::where("id","=",$id)->select("id","arr_name","pid","sort_id")->first();

		if($attr['pid']==0)
		{
		$sort=Sort::where("id","=",$attr['sort_id'])->select("name","id")->first();

		return view('Admin.goods.B_specification',['sort'=>$sort,'attr'=>$attr,'child'=>$child]);
		}
		else
		{
		return back();
		}	
    
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

