<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Sort;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Auth;
use App\Models\Site;
class ClassController extends Controller
{
	
	
	public function at()
	{
			  return json_encode(["sta" => '1', 'msg' => '请求成功', 'data' =>"1111"]);
	}
	
	
	/*
	 *  分类的添加
	*/
      
	  
	  
	  
	  
		public function add()
		{
	
				$sort = new Sort();
				$data['cid']=Input::get('c_id');
				$data['pid'] = Input::get('sort_id');
				$data['name'] = Input::get('sort_name');
				$data['num'] = trim(Input::get('num'));//排序
				$data['img_path'] = trim(Input::get('img_path'));
				$data['content']=Input::get('content');
				$data['type'] = "1";
				$data['whether']=Input::get('whether');	
			
        $msg = [
            'cid'=>"栏目名称不能为空",
            'pid'=>"分类不能不选择",
            'name.required' => "分类名称不能为空",
            'name.min' => "分类名称不能少于两个字符",
            'name.max' => "分类名称最大长度为10个字符",
            'name.unique' => "改分类名称已被占用",
			'whether.required'=>"状态必须选择",
        ];
    
        $validator = Validator::make($data,$sort->rules()['create'],$msg);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		
				if ($data['pid'] != "0") {
				  
					$data['id_str'] =$data['pid'];
				} else {
					$data['id_str'] = '';
				}		
				$rst = $sort->create($data);//保存成功跳转到分类列表页
				if ($rst) {
					return Redirect()->route('goods.B_lanmu_list');
				}else
                {
                return back()->with("error",'添加失败');
               }
		}
		
	/*
	* 添加内容分类
	*/
	
	public function content_add()
	{
		//dd(Input::All());
		$sort=new Sort();
		$data['cid']=0;
		$data['pid']=Input::get('sort_id');
		$data['name']=Input::get('name');
	    $data['img_path'] = trim(Input::get('img_path'));
		$data['content']=Input::get('content');
		$data['whether'] = "0";
		$data['whether']=Input::get('whether');	
		
		 $msg = [
            'cid.required'=>"栏目名称不能为空",
            'pid.required'=>"分类不能不选择",
            'name.required' => "分类名称不能为空",
            'name.min' => "分类名称不能少于两个字符",
            'name.max' => "分类名称最大长度为10个字符",
            'name.unique' => "改分类名称已被占用",
			'whether.required'=>"状态必须选择",
        ];
		
		 $validator = Validator::make($data,$sort->rules()['create'],$msg);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		
				if ($data['pid'] != "0") {
				  
					$data['id_str'] =$data['pid'];
				} else {
					$data['id_str'] = '';
				}		
				$rst = $sort->create($data);//保存成功跳转到分类列表页
				if ($rst) {
					return Redirect()->route('artice.A_fenlei_list');
				}else
                {
                return back()->with("error",'添加失败');
               }
		
	}
		
		
		
		 /*添加收货地址
     * gclass/address
     * get的请求
     * 返回参数格式json如下
     *{"msg":"请求成功","sta":"1","data":""}
     */
public  function  address()
{
	 // return json_encode(["sta" => '1', 'msg' => '请求成功', 'data' =>"1111"]);
 
        $data['user_id']=Input::get("user_id")?:Auth::id();
        $data["consignee"]=Input::get("consignee");//收货人
        $data["phone"]=Input::get("phone");//电话
        $data["area"]=Input::get("area");//所在省
        $data["street"]=Input::get("street");//市
		$data['district']=Input::get("district");//区或县   
		$data["scene"]=Input::get("scene");//街道
        $data["scontent"]=Input::get("scontent");//详细地址
       $data["sdefault"]=Input::get("sdefault");//是否默认

	 
	         if($data["sdefault"]=="1")
               {
               $supdate=Site::where("user_id","=",$data['user_id'])
                   ->update(['sdefault' =>"0"]);
                 }
	///$myfile = fopen("user_log111.txt","w");
    //fwrite($myfile,var_export($supdate,true));
     //fclose($myfile);
	   
        $site = new Site();
        $messages = [
            'consignee.required' => '收货人的地址请填写',
            'phone.required' => '电话请填写',
			'phone.numeric' => '电话号必须是数字',
			 'area.required' => '省请填写',
            'street.required' => '市请填写',
          'scontent.required' => '详细地址请填写',
		    'district.required' => '区或县请填写',
			 //'scene.required' => '街道请填写',
        ];
        $validator = Validator::make($request->all(),$site->rules()['create'], $messages);
        $messages = $validator->messages();
        if ($validator->fails()) {
            $msg = $messages->toArray();
            foreach ($msg as $k => $v) {
                return json_encode(['sta' => '0', 'msg' => $v[0], 'data' => '']);
            }
        }
        $rst = $site->create($data);//保存成功跳转到分类列表页	
			$myfile = fopen("user_log111.txt","w");
    fwrite($myfile,var_export($data,true));
     fclose($myfile);
        if ($rst) {
            return json_encode(["sta" => '1', 'msg' => '请求成功', 'data' => $rst]);
        }
        else
        {
         return json_encode(["sta" => '0', 'msg' => '请求失败', 'data' =>'']);
		}


}


 /*
     * 删除地址管理
     * gclass/ressdel
     * 传入参数 地址管理的sid 用户的id （user_id）
     *
     */
    public function ressdel(){
        $user_id=Input::get("user_id")?:Auth::id();
        $sid=Input::get("sid");
		
    
            $resdel=Site::where("sid","=",$sid)->where("user_id","=",$user_id)->delete();
            if($resdel)
            {
                return json_encode(["sta" => '1', 'msg' => '请求成功', 'data' =>$resdel]);
            }
            else
            {
                return json_encode(["sta" => '0', 'msg' => '请求失败', 'data' =>'']);
            }

   

    }

	 
	 /*
     * 地址修改
     * gclass/ressupdate
     * 传入参数 地址管理的sid
      *  {"msg":"请求成功","sta":"1","data":""}
     */
   
   public  function  ressupdate(Request $request)
    {
	
        $actice = Site::find(Input::get("sid"));

		$user_id=$actice["user_id"];
		$sid=Input::get("sid");
		
			$myfile = fopen("user_log111.txt","w");
      fwrite($myfile,var_export($request->all(),true));
      fclose($myfile);
		 if(!$actice)
		 {
			  return json_encode(['msg' => '暂无该地址', 'data' => '', 'sta' => 0]);
		 }
        $messages = [
            'consignee.required' => '收货人的地址请填写',
            'phone.required' => '电话请填写',
			'phone.numeric' => '电话号必须是数字',
            'area.required' => '省请填写',
            'street.required' => '市请填写',
            'scontent.required' => '详细地址请填写',
            'district.required' => '区或县请填写',	
        ];

	
        $validator = Validator::make($request->all(), $actice->rules()['update'],$messages);
        $messages = $validator->messages();
        if ($validator->fails()) {
            $msg = $messages->toArray();
            foreach ($msg as $k => $v) {
                return json_encode(['sta' => 0, 'msg' => $v[0], 'data' => '']);
            }
        }
		 
        $rst_data=$actice->update($request->only($actice->getFillable()));
    if($rst_data)
	{
		$up_site=Site::where("user_id","=",$user_id)
			    ->where("sid","<>",$sid)
			   ->update(['sdefault' =>"0"]);
	}

  
		  	//$myfile = fopen("user_log111.txt","w");
     // fwrite($myfile,var_export($request->all(),true));
      //fclose($myfile);
  
        if($rst_data){
            return json_encode(['msg'=>'更新成功','data'=>'1','sta'=>'1']);
        }else {
            return json_encode(['msg' => '更新失败', 'data' => '', 'sta' => 0,]);
        }

    }

	 
	     /*
    * 地址列表管理
    * gclass/resslist
    * 传入参数 地址管理的sid 用户的id （user_id）
    *
    */
    public  function  resslist(){
        $user_id=Input::get("user_id")?:Auth::id();
		   // return json_encode(["sta" => '1', 'msg' => '请求成功', 'data' =>"123"]);
		//dd($user_id);
        if($user_id)
        {

            $reslist=Site::where("user_id","=",$user_id)->orderBy("sdefault","desc")->get()->toArray();
            if($reslist)
            {
                return json_encode(["sta" => '1', 'msg' => '请求成功', 'data' =>$reslist]);
            }
            else
            {
				$obj=(object)array();
                return json_encode(["sta" => '1', 'msg' => '没有列表', 'data' =>$obj]);
            }
        }
        else
        {
            return json_encode(["sta" => '0', 'msg' => '请求失败', 'data' =>'']);
        }
    }
	
    /*
     * 默认地址
     * 传入参数 用户的id(用户id)
     * gclass/ressdefault
     * {"msg":"请求成功","sta":"1","data":""}
     */

    public  function ressdefault()
    {
        $user_id=Input::get("user_id")?:Auth::id();
        $rdefault=Site::where("user_id","=",$user_id)->where("sdefault","=","1")->first();
       if($rdefault)
       {
           return json_encode(['msg'=>'请求成功','data'=>$rdefault,'sta'=>'1']);
       }
        else
        {
			$obj=(object)array();
            return json_encode(['msg'=>'暂无默认地址','data'=>$obj,'sta'=>'1']);
        }
    }


		
		
		
		
		
}
