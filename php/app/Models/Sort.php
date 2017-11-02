<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Sort extends Eloquent
{

    /**
     * @var string
     * 表名称
     */
    protected $table='sort';
    /**
     * @var array
     * 数据验证，保证数据完整性
     */
    protected  $fillable=[
        'pid',
		'cid',
        'img_path',
        'content',
        'name',
        'num',
        'id_str',
		'type',
        'img_path',
		'whether'
		
    ];


    /**
     * @return array
     * 数据验证规则
     */
    public function rules()
    {
        return [
              'create' => [
                'cid'=>"required",
                'name' => "required|min:2|max:10|unique:".$this->getTable(),
                'pid'=>'required',
				'whether'=>'required',
                
             ],
            'update'=>[
                'name'=>"required|min:2|max:10",
            ]
            ];
    }


}
