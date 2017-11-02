<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Attributes;
use DB;
use App\Models\Sort;
class GoodsController extends Controller
{
	/*
	 * 获取子分类品牌
     * 获取分类规格
	 */
	
	
	  public function set_brand_sort()
    {
        $id = Input::get('sort_id');//获取到分id，获取品牌分类

        //$sql = "select * from column where instr(concat(',',sort_id,','),',$id,')<>0 order by brand_num DESC ";
		
	
        //$rst['SortData'] = DB::select($sql);
        //获取分类
        $Set_sort = Sort::where('id', $id)->select('id', 'name', 'content', 'pid', 'img_path')->get()->toArray();
        //获取规格
        if (!empty($Set_sort)) {
            $Set_sort[0]['desc'] = "分类";
            $Set_sort[0]['sub'] = Attributes::where(['sort_id' => $id, 'pid' => '0'])
                ->select('arr_name as name', 'id', 'pid', 'store_num', 'sort_id')->get()->toArray();
            if ($Set_sort[0]['sub']) {
                foreach ($Set_sort[0]['sub'] as $k => &$v) {
                    $v['desc'] = "属性";
                    $v['sub'] = Attributes::where('pid', $v['id'])
                        ->select('arr_name as name', 'id', 'pid', 'store_num', 'sort_id')
                        ->orderBy('store_num', 'desc')->orderBy('created_at', 'dasc')
                        ->get()->toArray();
                    if (!empty($v['sub'])) {
                        foreach ($v['sub'] as $r => &$t) {
                            $t['desc'] = '规格';
                            $t['kucun'] = '0';
                            $t['jiage'] = '0 ';
                        }
                    }
                }
            }
            $rst['attribut'] = $Set_sort;
        }
        dd($rst);
        return Response::json(['msg' => '请求成功', 'data' => $rst, 'sta' => '1']);
    }

	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
