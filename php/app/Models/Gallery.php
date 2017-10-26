<?php

namespace App\Models;
use App\Models\Sort;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected  $table="gallery";

    protected  $fillable=[
        'g_name',//画廊名称
        'g_homeimg',
        'g_people',
        'g_phone',
		'g_mailbox',
		'g_address',
		'bg_img',
		'g_synopsis',
		'type',
    ];
    public function rules(){
        return [
            "create"=>[
                'g_name'=>"required",
				'g_people'=>"required",
                'g_name'=>"required|min:2|max:10|unique:".$this->getTable(),
				'type'=>"required",
				
            ]
        ];
    }


}
