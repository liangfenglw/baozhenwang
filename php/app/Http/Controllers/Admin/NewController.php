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
use App\Models\Art;
use App\Models\Artist;
use App\Models\Gallery;
class NewController extends Controller
{
	/*
	* 修改分类
	*/
	

	
/*
* 删除分类
*/
 public function destroy()
    {
        $id = Input::get('id');
        $rst = Sort::where('id', $id)->delete();
        return Response::json(['msg' => '删除成功', 'sta' => '1', 'data' => ""]);
    }
	/*
	* 分类列表
	*/
 public function A_fenlei_list(){
 
      $sort=Sort::where(["type"=>"0","pid"=>"0"])->select("pid","name","id","whether")->get()->toArray();
	    if (!empty($sort)) {
            foreach ($sort as $key => &$vel) {
                $sort[$key]['child'] = Sort::where('pid', $vel['id'])->select('id', 'pid', 'name',"whether")->get()->toArray();
            }
        }
  	return view('Admin.artice.A_fenlei_list',['sort'=>$sort]);
  }
  /*
  * 查询添加分类 
  */
 public function A_fenlei(){
	 $id=Input::get("id");
	 if(!empty($id))
	 {
		 $sorts=Sort::where('id',"=",$id)->select("id","pid","name")->first();
		
	 $sort=Sort::where(["type"=>"0","pid"=>"0"])->select("cid","pid","name","id")->get()->toArray();
	 if(!empty($sort))
	 {
		 foreach($sort as $k=>$v)
		 {
			 $sort[$k]['child']=Sort::where('pid',$v['id'])->select("cid","pid","name","id")->get()->toArray();
		 }
	 }
  	return view('Admin.artice.A_fenlei',['sort'=>$sort,'sorts'=>$sorts]);
	 }
	 else
	 {
			 $sort=Sort::where(["type"=>"0","pid"=>"0"])->select("cid","pid","name","id")->get()->toArray();
	 if(!empty($sort))
	 {
		 foreach($sort as $k=>$v)
		 {
			 $sort[$k]['child']=Sort::where('pid',$v['id'])->select("cid","pid","name","id")->get()->toArray();
		 }
	 }
  	return view('Admin.artice.A_fenlei',['sort'=>$sort,'sorts'=>""]); 
	 }
  }
 public function A_wenzhang_list(){
	 
 	return view('Admin.artice.A_wenzhang_list');
  }
 public function A_wenzhang(){
	 
	  $sort=Sort::where("type","=","0")->where("pid","=","0")->select("pid","name","id")->get()->toArray();
	 if(!empty($sort))
	 {
		  foreach($sort as $k=>$v)
		  {
			 $sort[$k]["child"]=Sort::where("pid","=",$sort[$k]["id"])->select("pid","name","id")->get()->toArray(); 
		  }
      }
	  $gallery=Gallery::select("id","g_name")->get()->toArray();
	  
	  $artist=Artist::select("id","art_name")->get()->toArray();
	 
  	return view('Admin.artice.A_wenzhang',['sort'=>$sort,'gallery'=>$gallery,'artist'=>$artist]);
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
	  $attr_del=Attributes::where("sort_id","=",$sid)->delete();
	    return json_decode(['msg' => '删除成功', 'sta' => '1', 'data' =>'']);
  }
  /*
  * 修改分类
  */
  public function sort_up()
  {
			$id=Input::get("id");
			$column=Column::where("type","=","1")->get()->toArray();
			$sort_up=Sort::where("id","=",$id)
						->first();
	
       return view('Admin.goods.B_lanmu', ['sort_up' =>$sort_up,'column'=>$column]);
  }
  
   public function Businessort(){
      $cid=Input::get('cid');
      if($cid){
          $sort=Sort::where("cid",$cid)->where("pid","=","0")->select("cid","pid","name","id")->get()->toArray();
      }else{
          $sort=Sort::where("type","=","1")->where("pid","=","0")->select("cid","pid","name","id")->get()->toArray();
      }
      foreach($sort as $k=>$v)
      {
          $sort[$k]["child"]=Sort::where("pid","=",$sort[$k]["id"])->select("cid","pid","name","id")->get()->toArray();
      }
      return json_encode(['sta'=>'1','msg'=>'请求成功','data'=>$sort]);

  }
  
  
  
 public function B_shangbin(){
	 
	 $column=Column::where("type","=",1)->select("id","name","type")->get()->toArray();
	 $sort=Sort::where("type","=","1")->where("pid","=","0")->select("cid","pid","name","id")->get()->toArray();
	 if(!empty($sort))
	 {
		  foreach($sort as $k=>$v)
		  {
			 $sort[$k]["child"]=Sort::where("pid","=",$sort[$k]["id"])->select("cid","pid","name","id")->get()->toArray(); 
		  }
      }
	  
	$artist=Artist::select("art_name","id")->get()->toArray();
	 
	 
  	return view('Admin.goods.B_shangbin',['column'=>$column,'sort'=>$sort,'artist'=>$artist]);
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
			  //dd($attr_list);
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
	 
	 $artist_list=Artist::get()->toArray();

	 
  	return view('Admin.manage.D_yisujia_list',['artist_list'=>$artist_list]);
  }
  /*
  *添加艺术家内容
  */
  public function add_artist()
  {
	   
     
	  $artist=new Artist();
	  $data=array();
	  $data['art_type']=Input::get("art_type");
	  $data['finish']=Input::get("finish");
	  $data['art_factions']=Input::get("art_factions");
	  $data['art']=Input::get("art");
	  $data['art_name']=Input::get("art_name");
	$data['art_avatar']=Input::get("img_path");
	$data['gender']=Input::get("gender");
	$data['phone']=Input::get("phone");
	$data['mailbox']=Input::get("mailbox");
	$data['address']=Input::get("address");
	$data['g_school']=Input::get("g_school");
	$data['art_img']=Input::get("img_paths");
	$data['synopsis']=Input::get("synopsis");
	$data['type']=Input::get("type");
	 $msg = [
            'art_type.required'=>"艺术类型不能不选择",
            'finish.required' => "所在院系不能不选择",
			'art_factions.required' => "艺术画派不能不选择",
			'art.required' => "所在画馆不能不能选择",
			'art_name.required' => "艺术家的名称不能为空",
            'art_name.min' => "艺术家不能少于两个字符",
            'art_name.max' => "艺术家最大长度为10个字符",
            'art_name.unique' => "艺术家名称已被占用",
			'type.required' => "状态不能不选择不能为空",
        ];
    
        $validator = Validator::make($data,$artist->rules()['create'],$msg);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
		
	  $attrs = $artist->create($data);
	   if($attrs)
		 {
			  return Redirect('Admin/manage/D_yisujia_list');
			  
		 }
		 else
		 {
			  return back();
		 }
	
	
  }
  /*
  *  添加艺术家 
   */
 public function D_yisujia(){
	 $id=Input::get("id");
	 if(isset($id)&&!empty($id))
	 {
		 $artist=Artist::where("id","=",$id)->first();
		 return view('Admin.manage.D_yisujia',['artist'=>$artist]);
		 
	 }
	 else
	 {
		return view('Admin.manage.D_yisujia'); 
	 }
  	
  }
 public function D_huiyuan(){
  	return view('Admin.manage.D_huiyuan');
  }
/* public function D_gallery_list(){
    return view('Admin.manage.D_gallery_list');
  }*/
  /*
    get 请求 
Admin/manage/gallery_list 
返回参数 
g_name画廊名称
g_homeimg画廊首页展示图
g_people画廊联系人
g_phone画廊的手机号
g_mailbox画廊的邮箱
g_address画廊的地址
bg_img画廊的背景图
g_synopsis画廊的简介
还少了 画廊的商品 一个数组
  */
  public function gallery_list()
  {
	  
	  $gallery_list=Gallery::where("type","=",1)->get()->toArray();
	for($i=0;$i<count($gallery_list);$i++)
	{
		if($gallery_list[$i]['g_homeimg'])
		{
			$gallery_list[$i]['g_homeimg']=md52url($gallery_list[$i]['g_homeimg']);
		}
		else
		{
			$gallery_list[$i]['g_homeimg']="";
		}
		if($gallery_list[$i]['bg_img'])
		{
			$gallery_list[$i]['bg_img']=md52url($gallery_list[$i]['bg_img']);
		}
		else
		{
			$gallery_list[$i]['bg_img']="";
		}
	}
	  if($gallery_list)
	  {
		  return json_encode(['msg' => '请求成功', 'sta' => '1', 'data' => $gallery_list]);
	  }
	  else
	  {
		  return json_decode(["data"=>"",'sta'=>'0',"msg"=>"请求失败"]);
	  }
  }
  /*
  get请求
Admin/manage/gallery_details 
需要的参数 id //画廊的id
返回参数 
g_name画廊名称
g_homeimg画廊首页展示图
g_people画廊联系人
g_phone画廊的手机号
g_mailbox画廊的邮箱
g_address画廊的地址
bg_img画廊的背景图
g_synopsis画廊的简介
还少了 画廊的商品 一个数组

  */
  public function gallery_details()
  {
	  $id=Input::get('id');
	  //dd($id);
	  $gallery_details=Gallery::where("id","=",$id)->first();
	  if($gallery_details)
	  {
		if($gallery_details['g_homeimg'])
		{
			$gallery_details['g_homeimg']=md52url($gallery_details['g_homeimg']);
		}
		else
		{
			$gallery_details['g_homeimg']="";
		}  
		if($gallery_details['bg_img'])
		{
			$gallery_details['bg_img']=md52url($gallery_details['bg_img']);
		}
		else
		{
			$gallery_details['bg_img']="";
		}
		
		return json_encode(['msg' => '请求成功', 'sta' => '1', 'data' => $gallery_details]);
	  }
	  return json_encode(['msg' => '请求失败', 'sta' => '0', 'data' =>""]);
  }
   public function D_gallery_list(){
	   

	   $gallery_lists=Gallery::where("type","=",1)->get()->toArray();
	   //dd($gallery_lists);
    return view('Admin.manage.D_gallery_list',['gallery_lists'=>$gallery_lists]);
  }
  /*
  *添加画廊 内容
  */
  public function add_gallery()
  {
	  //dd(Input::all());
	  $gallery=new Gallery();
	  $data['g_name']=Input::get("g_name");
	  $data['g_homeimg']=Input::get("img_paths");
	  $data['g_people']=Input::get("g_people");
	  $data['g_phone']=Input::get("g_phone");
	  $data['g_mailbox']=Input::get("g_mailbox");
	  $data['g_address']=Input::get('g_address');
	  $data['bg_img']=Input::get('img_path');
	  $data['g_synopsis']=Input::get('g_synopsis');
	  $data['type']=Input::get('type');
	   $msg = [
            'g_name.required'=>"画廊不能不填写",
            'g_people.required' => "联系人不能为空",
			'g_phone.required' => "手机号不能为空",
            'g_name.min' => "画廊名称不能少于两个字符",
            'g_name.max' => "画廊名称最大长度为10个字符",
            'g_name.unique' => "画廊名称已被占用",
			'type.required' => "状态不能不选择不能为空",
        ];
    
        $validator = Validator::make($data,$gallery->rules()['create'],$msg);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
		
	  $gallery = $gallery->create($data);
	   if($gallery)
		 {
			  return Redirect('Admin/manage/D_gallery_list');
			  
		 }
		 else
		 {
			  return back();
		 }
  }
  /*
  *添加画廊
  */
   public function D_gallery(){
	   
	   	 $id=Input::get("id");
	 if(isset($id)&&!empty($id))
	 {
		 $gallery=Gallery::where("id","=",$id)->first();
		 return view('Admin.manage.D_gallery',['gallery'=>$gallery]);
		 
	 }
	 else
	 {
		   return view('Admin.manage.D_gallery');
	 }
 
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

