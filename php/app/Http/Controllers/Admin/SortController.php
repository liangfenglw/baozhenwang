<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Sort;

class BrandController extends Controller
{

   public function sort()
   {
	   $sortname=Sort::where("type",=,"1")->where("whether","=","1")->get()->toArray();
	   return view("Admin.goods.B_lanmu",["sortname"=>$sortname]);
   }
}
