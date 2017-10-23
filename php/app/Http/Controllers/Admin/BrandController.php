<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Sort;
use App\Models\Column;
use Input;
use Redirect;
use Auth;
use Response;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use DB;
use phpDocumentor\Reflection\Types\Object_;
class BrandController extends Controller
{


    /*
     * 栏目类型 系列
     */
      public function column(){

	  dd("123");
          $column=Column::where("type","=","1")->get()->toArray();


         return view("Admin.goods.B_lanmu",['column'=>$column]);

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
