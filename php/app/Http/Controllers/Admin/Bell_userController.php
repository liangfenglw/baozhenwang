<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Response;
use App\Models\Userattention;
use App\Models\User;
use DB, App\Models\Integration, Input;
use Validator, Auth, App\Models\Bell_user;
use App\Http\Requests;
use Hash;
use App\Models\SendSMS;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message_record;

class Bell_userController extends Controller
{



   

    /**
     * @return mixed
     *
     */
    public function check_login()
    {
        return json_encode(['msg' => '', 'sta' => '1', 'data' => Auth::id()]);
    }

    /**
     * @return mixed
     *
     */
    public function Send_sms()
    {
	
        $mobile = Input::get('mobile');
        $type = Input::get('type');
        $sendsms = new SendSMS();
        if (!empty($type)) {
            $rst = $sendsms->send_sms($mobile, $type);
        } else {
            $rst = $sendsms->send_sms($mobile, 'sign_up');
        }
        if ($rst['sta'] == 1) {
            return json_encode(['sta' => '1', 'msg' => '请求成功', 'data' => $rst], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(['sta' => $rst['sta'], 'msg' => $rst['msg'], 'data' => ''], JSON_UNESCAPED_UNICODE);
        }
    }

   

    private function GetThisMonth($dataMonth, $user_id)
    {
        $MonthData = Integration::where('sign_time', 'like', "%$dataMonth%")
            ->where('user_id', $user_id)->select("sign_time")->get()->toArray();
        if ($MonthData) {
            $time = [];
            foreach ($MonthData as $key => $vel) {
                $time[$key] = $vel['sign_time'];
            }
            return $time;
        }

    }
/*
* 自动登陆
*/
        public function check_user_login()
    {
        if (Auth::check() == true) {
            Auth::logout();
        }
        $username = Input::get('name');
        if (Redis::exists($username . '_token')) {
            $rst = json_decode(Redis::get($username . '_token'), true);
            if (!empty($rst)) {
                if ($rst['token'] == Input::get('_token')) {
                    //计算时间
                    $thistime = time();
                    if (strtotime("+1week", strtotime(date('Y-m-d', $rst['time']))) > $thistime) {
                        $sele_user = User::where('name', $username)->first();
                        Auth::login($sele_user);
                        //$new_token = csrf_token();
                       // $arr = ['token' => $new_token, 'time' => time()];
                        Redis::set($username . '_token', json_encode($arr));
                        return json_encode(['sta' => "1", 'msg' => '自动登陆成功', 'data' =>$rst['token']]);
                    }
                }
            }
        }
        return json_encode(['sta' => "0", 'msg' => '自动登陆失败', 'data' => ""]);

    }

    /**
     * Show the form for creating a new resource.
     * 用户注册（仅限手机用户），接收手机号码，短信验证码
     * 验证用户手机号合法性，验证该手机用户是否已注册，验证该手机用户验证码正确性与实时性。
     * 验证用户密码，最后Bell_user->save();
     *
     * @return \Illuminate\Http\Response
     */
    public function sign_up()
    {
        $data = Input::all();
		//dd($data);
        $data['type'] = '1';
        $data['name'] = Input::get('name');
		$data['password'] = Input::get('password');
        $data['password_confirmation'] = Input::get('password');
		$data['role'] = "3";
		if(preg_match('/\w+@\w+\.\w+/',$data['name']))
		{
				$user_mail=User::where("name","=",$data['name'])->first();
				if($user_mail)
				{
					  return json_encode(['msg' => "邮箱已经注册", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
				}
				else
				{
								$user = new User();
								$validate = Validator::make($data, $user->rules()['create']);
								$messages = $validate->messages();
								if ($validate->fails()) {
									$msg = $messages->toArray();
									foreach ($msg as $k => $v) {
										return json_encode(['sta' => "0", 'msg' => $v[0], 'data' => ''], JSON_UNESCAPED_UNICODE);
									}
								}
					$use_data = $user->create($data);
						if($use_data)
						{
							 Auth::login($use_data);
								return json_encode(['sta' => "1", 'msg' => '邮箱注册成功', 'data' => $use_data], JSON_UNESCAPED_UNICODE);
						}
					
				}
		}
			else if(preg_match("/^1[345678]{1}\d{9}$/",$data['name']))
			{
				
				
				  $data['user_code'] = Input::get('user_code');
     
				$user_SMS = Redis::exists('user_SMS_' . $data['name']);	
				//dd($data);
				if ($user_SMS == 1 && $data) {
					$send_num_data = Redis::get('user_SMS_' . $data['name']);
					$send_num = json_decode($send_num_data, true);
							if ($data['user_code'] == $send_num['code']) {
								//验证码5分钟内有效
								$endtime = date('Y-m-d H:i:s', $send_num['Send_time'] + 600);
								$this_time = date('Y-m-d H:i:s', time());
								//当前时间是否大于发送时间+时间限制 在限制时间内，当前时间小于发送时间+限制
								$second = intval((strtotime($this_time) - strtotime($endtime)) % 86400);
								if ($second <> 0 && $second > 0) {
									Redis::del('user_SMS_' . $data['name']);
									return json_encode(['sta' => "0", 'msg' => '验证码已过期，请重新申请', 'data' => ""], JSON_UNESCAPED_UNICODE);
								}
								if ($data['name'] != $send_num['user_mobile']) {
									return json_encode(['msg' => "验证用户不一致！", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
								}
								//if (empty(Input::get('nickname'))) {
								  //  return json_encode(['msg' => "昵称不能为空", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
							  //  }
								//$set_nickname = User::where('nickname', Input::get('nickname'))->count();
							   // if ($set_nickname) {
								   // return json_encode(['msg' => "该昵称已被占用", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
								//}
								$user = new User();
								$validate = Validator::make($data, $user->rules()['create']);
								$messages = $validate->messages();
								if ($validate->fails()) {
									$msg = $messages->toArray();
									foreach ($msg as $k => $v) {
										return json_encode(['sta' => "0", 'msg' => $v[0], 'data' => ''], JSON_UNESCAPED_UNICODE);
									}
								}
								//dd($data);
								$use_data = $user->create($data);
								//dd($use_data);
								if ($data) {
									Redis::del('user_SMS_' . $data['name']);
									Redis::del('user_Send_num_' . $data['name']);
									Auth::login($use_data);
									return json_encode(['sta' => "1", 'msg' => '手机注册成功', 'data' => $use_data], JSON_UNESCAPED_UNICODE);
								}
							} 
							else {
								return json_encode(['msg' => "验证码错误", 'sta' => "0", 'data' => '']);
								}
				}//$data
			}//else      
}


    /**
     * @return mixed
     *
     */
    public function user_login()
    {
		Session::token();
		
		// return json_encode(['msg' => '登录成功', 'sta' => '1', 'data' => "123123"],JSON_UNESCAPED_UNICODE);
		
        $username = Input::get('name');
		//dd($username);
        $password = Input::get('password');
        $remember = Input::get('remember', true);
        $data['id'] = User::where('name','=',$username)->where('type','=','1')->get();
	
        if (count($data['id']->toArray()) > 0) {
            $id_data = $data['id']->toArray();
            $data['id'] = $id_data['0']['id'];
			$avatar=$id_data["0"]["avatar"];
			if($avatar)
			{
				$avatar=md52url($avatar);
			}
			else
			{
				$avatar="";
			}
			if($id_data[0]['nickname'])
			{
				$id_data[0]['nickname']=$id_data[0]['nickname'];
			}
			else
			{
				$id_data[0]['nickname']="";
			}
            $rst = Auth::attempt(['name' => $username, 'password' => $password], $remember);

            if ($rst == false) {
                return json_encode(['msg' => "用户名或者密码错误", 'sta' => 0, 'data' => '']);
            }
           
		   if($rst==true)
		   {
			   $user_state=User::where("id","=",$data['id'])->update(["state"=>1]);
		   }
            //记录登陆状态
            $arr = ['token' => Input::get('_token'), 'time' => time()];

            Redis::set($username . '_token', json_encode($arr));
            $data = ([
                'id' => $data['id'],
                'rst' => $rst,
                'username' => $username,
                'password' => $password,
                //'redirect' => $redirect,                
                'nickname' => $id_data[0]['nickname'],
				'avatar'=>$avatar,
				'state'=>$user_state,
				
            ]);
			
			$myfile=fopen("user_log.txt","w");
			fwrite($myfile,var_export($data,true));
			fclose($myfile);
			
			
			//dd($data);
            return json_encode(['msg' => '登录成功', 'sta' => '1', 'data' =>$data],JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(['msg' => "用户名不存在", 'sta' => 0, 'data' => ''],JSON_UNESCAPED_UNICODE);
        }
    }
/*
*  退出登录
*/
  public function logout()
  {
	 if (Auth::check() == true) {
		 	
           Auth::logout();
		   
       }
	 return json_encode(["sta" => '1', 'msg' => '退出成功', 'data' => ""],JSON_UNESCAPED_UNICODE);
  }
    /**
     *
     * 第三方登陆集合
     * QQ wechat,weibo
     * 获取账号类型，与对应openid
     *
     */
    protected function ThirdParty()
    {
        $type = Input::get('type');//账号类型QQ，wechat,weibo
        $Account_type = $type;


    }
	/*
	* 修改密码
	*/
	
	 public function set_password()
    {
		if (Auth::check() == true) {
				$user_id=Input::get("user_id");
			
				$oldpassword = Input::get('oldpassword');
				$newpassword = Input::get('newpassword');
				$res=User::where("id","=",$user_id)->select("password")->first();
				if(!Hash::check($oldpassword,$res->password))
				{
					 return json_encode(['sta' => "0", 'msg' => '原密码不正确', 'data' => ""], JSON_UNESCAPED_UNICODE);
				}
				
				$update=array(
				'password'=>bcrypt($newpassword),
				);
				
				$result=User::where("id","=",$user_id)->update($update);
		
					$myfile=fopen("user_log.txt","w");
					fwrite($myfile,var_export($result,true));
					fclose($myfile);
				if($result)
				{
							 return json_encode(['sta' => "1", 'msg' => '修改成功', 'data' => ""], JSON_UNESCAPED_UNICODE);
				}
				else
				{
							 return json_encode(['sta' => "0", 'msg' => '修改失败', 'data' => ""], JSON_UNESCAPED_UNICODE);
				}
		}
		else{
			 return json_encode(['sta' => "0", 'msg' => '请登录', 'data' => ""], JSON_UNESCAPED_UNICODE);
		}
        
    }
	/*
	public function reset()
	{
		$user_id=Input::get("user_id");
		$password=Input::get("reset_password");
		$password_confirm=Input::get("password_confirm");
		if($password==$password_confirm)
		{
				$update=array('password'=>bcrypt($password),);
					$result=User::where("id","=",$user_id)->update($update);
	
				if($result)
				{
							 return json_encode(['sta' => "1", 'msg' => '修改成功', 'data' => ""], JSON_UNESCAPED_UNICODE);
				}
				else
				{
							 return json_encode(['sta' => "0", 'msg' => '修改失败', 'data' => ""], JSON_UNESCAPED_UNICODE);
				}
        
		}
		else
		{
			return json_encode(['sta' => "0", 'msg' => '二次密码不一致', 'data' => ""], JSON_UNESCAPED_UNICODE);
		}
	}
	*/
	
   /*
   *   用户找回密码
    */
	/*
   public function findPass()
   { 
   $name = Input::get('name');
   	    $password = Input::get('new_pass');
       if(preg_match('/\w+@\w+\.\w+/',$name))
		{
				$user_mail=User::where("name","=",$name)->first();
				if(!$user_mail)
				{
					  return json_encode(['msg' => "邮箱已经注册", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
				}
					else
					{
					$update=array('password'=>bcrypt($password),);
					$result=User::where("id","=",$user_id)->update($update);
							if($result)
							{
										 return json_encode(['sta' => "1", 'msg' => '修改成功', 'data' => ""], JSON_UNESCAPED_UNICODE);
							}
							else
							{
										 return json_encode(['sta' => "0", 'msg' => '修改失败', 'data' => ""], JSON_UNESCAPED_UNICODE);
							}
        
				     }
		}//邮箱找会密码
		else if
		{
			 $code = Input::get('user_code');
			 $data = User::where('name', $name)->first();
			if (empty($data->name)) {
				return json_encode(['sta' => "0", 'msg' => '用户不存在，请注册', 'data' => ""], JSON_UNESCAPED_UNICODE);
			}	
		   else{
			   
			    $user_SMS = Redis::exists('user_SMS_' . $name);
				if ($user_SMS == 1 && $data) {
					$send_num_data = Redis::get('user_SMS_' . $name);
					$send_num = json_decode($send_num_data, true);
					if (trim($code) == $send_num['code']) {
						//验证码5分钟内有效
						$endtime = date('Y-m-d H:i:s', $send_num['Send_time'] + 600);
						$this_time = date('Y-m-d H:i:s', time());
						//当前时间是否大于发送时间+时间限制 在限制时间内，当前时间小于发送时间+限制
						$second = intval((strtotime($this_time) - strtotime($endtime)) % 86400);
						if ($second <> 0 && $second > 0) {
							Redis::del('user_SMS_' . $name);
							return json_encode(['sta' => "0", 'msg' => '验证码已过期，请重新申请', 'data' => ""], JSON_UNESCAPED_UNICODE);
						}
						  if ($data->name != $send_num['user_mobile']) {
								return json_encode(['msg' => "验证用户不一致！", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
							}
							if (Hash::check($password, $data->password)) {
								return json_encode(['sta' => "0", 'msg' => '密码与原密码太过于相似', 'data' => ""], JSON_UNESCAPED_UNICODE);
							}
							$data->password = bcrypt($password);
							$use_data = User::where('name', $name)->update(['password' => bcrypt($password)]);
							if ($use_data) {
								Redis::del('user_SMS_' . $name);
								Redis::del('user_Send_num_' . $name);
								return json_encode(['sta' => "1", 'msg' => '密码修改成功', 'data' => $use_data], JSON_UNESCAPED_UNICODE);
							}
						} else {
							return json_encode(['msg' => "验证码错误", 'sta' => "0", 'data' => '']);
						}
		      }
		}//手机号找回密码
       
	   
   }
   */
    /**
     * 用户找回密码
     * bcrypt($password)
     */
	 /*
    public function findPass(Request $request)
    {
        $name = Input::get('name');
        $code = Input::get('user_code');
        $password = Input::get('new_pass');
        $data = User::where('name', $name)->first();
        if (empty($data->name)) {
            return json_encode(['sta' => "0", 'msg' => '用户不存在，请注册', 'data' => ""], JSON_UNESCAPED_UNICODE);
        }
        $user_SMS = Redis::exists('user_SMS_' . $name);
        if ($user_SMS == 1 && $data) {
            $send_num_data = Redis::get('user_SMS_' . $name);
            $send_num = json_decode($send_num_data, true);
            if (trim($code) == $send_num['code']) {
                //验证码5分钟内有效
                $endtime = date('Y-m-d H:i:s', $send_num['Send_time'] + 600);
                $this_time = date('Y-m-d H:i:s', time());
                //当前时间是否大于发送时间+时间限制 在限制时间内，当前时间小于发送时间+限制
                $second = intval((strtotime($this_time) - strtotime($endtime)) % 86400);
                if ($second <> 0 && $second > 0) {
                    Redis::del('user_SMS_' . $name);
                    return json_encode(['sta' => "0", 'msg' => '验证码已过期，请重新申请', 'data' => ""], JSON_UNESCAPED_UNICODE);
                }
                if ($data->name != $send_num['user_mobile']) {
                    return json_encode(['msg' => "验证用户不一致！", 'sta' => "0", 'data' => ''], JSON_UNESCAPED_UNICODE);
                }
                if (Hash::check($password, $data->password)) {
                    return json_encode(['sta' => "0", 'msg' => '密码与原密码太过于相似', 'data' => ""], JSON_UNESCAPED_UNICODE);
                }
                $data->password = bcrypt($password);
                $use_data = User::where('name', $name)->update(['password' => bcrypt($password)]);
                if ($use_data) {
                    Redis::del('user_SMS_' . $name);
                    Redis::del('user_Send_num_' . $name);
                    return json_encode(['sta' => "1", 'msg' => '密码修改成功', 'data' => $use_data], JSON_UNESCAPED_UNICODE);
                }
            } else {
                return json_encode(['msg' => "验证码错误", 'sta' => "0", 'data' => '']);
            }
        }
    }
*/
	/*
	*  修改密码
 	*/


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
