<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Sort;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
class ClassController extends Controller
{
	
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
                 
               }
		}
		
	
		
		
		
		
		
		
		
		
		
}
