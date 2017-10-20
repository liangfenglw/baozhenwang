<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Input;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      //dd(111);


        if ($this->auth->check()) {
            return redirect('/');
        }else if(Input::get('ssuser')){

            $user_id = Input::get('ssuser');

            $id = $this->dencrypt($user_id, false, "lc.shengshi.top");

            if($id){
                $wx_my_user = Wx_my_user::find($id);
                if(isset($wx_my_user->openid)){
                    $wx_user = Wx_user::where('openid',$wx_my_user -> openid)->get()->toArray();

                    if(empty($wx_user)){
                        return json_encode([
                            'sta' => 1001,
                            'msg' => '正在跳转登陆页面'
                        ]);
                    }
                }else{
                    return json_encode([
                        'sta' => 1001,
                        'msg' => '正在跳转登陆页面'
                    ]);
                }

            }else{
                return json_encode([
                    'sta' => 1001,
                    'msg' => '正在跳转登陆页面'
                ]);
            }


        }

        return $next($request);
    }


    public function dencrypt($string, $isEncrypt = true, $key = KEY_SPACE)
    {


        /*if (!isset($string{0}) || !isset($key{0})) {
            return false;
        }*/

        $dynKey = $isEncrypt ? hash('sha1', microtime(true)) : substr($string, 0, 40);
        $fixedKey = hash('sha1', $key);

        $dynKeyPart1 = substr($dynKey, 0, 20);
        $dynKeyPart2 = substr($dynKey, 20);
        $fixedKeyPart1 = substr($fixedKey, 0, 20);
        $fixedKeyPart2 = substr($fixedKey, 20);
        $key = hash('sha1', $dynKeyPart1 . $fixedKeyPart1 . $dynKeyPart2 . $fixedKeyPart2);

        $string = $isEncrypt ? $fixedKeyPart1 . $string . $dynKeyPart2 : (isset($string{339}) ? gzuncompress(base64_decode(substr($string, 40))) : base64_decode(substr($string, 40)));

        $n = 0;
        $result = '';
        $len = strlen($string);

        for ($n = 0; $n < $len; $n++) {
            $result .= chr(ord($string{$n}) ^ ord($key{$n % 40}));
        }

        return $isEncrypt ? $dynKey . str_replace('=', '', base64_encode($n > 299 ? gzcompress($result) : $result)) : substr($result, 20, -20);
    }
}
