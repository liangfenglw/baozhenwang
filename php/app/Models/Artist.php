<?php

namespace App\Models;
use App\Models\Sort;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected  $table="artist";

    protected  $fillable=[
        'art_type',
        'finish',
        'art_factions',
        'art',
		'art_name',
		'art_avatar',
		'gender',
		'phone',
		'mailbox',
		'address',
		'g_school',
		'art_img',
		'synopsis',
		'type',
    ];
    public function rules(){
        return [
            "create"=>[
                'art_type'=>"required",
				'finish'=>"required",
				'art_factions'=>"required",
				'art'=>"required",
                'art_name'=>"required|min:2|max:10|unique:".$this->getTable(),
				'type'=>"required",
				
            ]
        ];
    }


}
