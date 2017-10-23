<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Sort;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
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
				if ($data['pid'] != "0") {
				  
					$data['id_str'] =$data['pid'];
				} else {
					$data['id_str'] = '';
				}		
				$rst = $sort->create($data);//保存成功跳转到分类列表页
				if ($rst) {
					return Redirect()->route('goods.B_lanmu_list');
				}
		}
		
	
		
		
		
		
		
		
		
		
		
}
