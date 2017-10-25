<?php

/*
|--------------------------------------------------------------------------
| 应用路由
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['namespace' => 'Home'], function () {
    //前台页面路由开始
   Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);


});

//验证码
//route::get('yanzheng/test',['as'=>'captcha.test','uses'=>'Admin\CaptchaController@index']);
//生成
///route::get('yanzheng/mews',['as'=>'captcha.mews','uses'=>'Admin\CaptchaController@mews']);
//验证验证码
//route::any('yanzheng/cpt',['as'=>'captcha.cpt','uses'=>'Admin\CaptchaController@cpt']);



// 游客状态下的路由
Route::group(['middleware' => 'guest'], function () {
    Route::group(['namespace' => 'Admin'], function () {
        // 登录注册
        Route::get('Admin/user/login', ['as' => 'user.login', 'uses' => 'UserController@getLogin']);
        Route::post('Admin/user/login', 'UserController@postLogin');
        Route::get('/user/register', ['as' => 'user.register', 'uses' => 'UserController@getRegister']);
        Route::post('/user/register', 'UserController@postRegister');
        Route::get('/user/register/step2', ['as' => 'user.register.step2', 'uses' => 'UserController@getRegisterStep2']);
        Route::post('/user/register/step2', 'UserController@postRegisterStep2');
        Route::get('/user/register/step3', ['as' => 'user.register.step3', 'uses' => 'UserController@getRegisterStep3']);
        Route::post('/user/register/step3', 'UserController@postRegisterStep3');
        // 找回密码
        Route::get('password/email', ['as' => 'password.email', 'uses' => 'Auth\PasswordController@getEmail']);
        Route::post('password/email', 'Auth\PasswordController@postEmail');
        Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\PasswordController@getReset']);
        Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\PasswordController@postReset']);
       //手机.邮箱用户登录
	   Route::get('user/Get_Token', 'UserController@GEt_token');
	   Route::get('user/send_sms', ['as' => 'user.send_sms', 'uses' => 'Bell_userController@Send_sms']);
       Route::post('user/sign_up', ['as' => 'user.sign_up', 'uses' => 'Bell_userController@sign_up']);
		  Route::get('brand/column', ['as' => 'brand.column', 'uses' => 'BrandController@column']);//栏目分类
		Route::post('user/user_login', ['as' => 'user.user_login', 'uses' => 'Bell_userController@user_login']);
		Route::get('check_user_login',"Bell_userController@check_user_login");//验证登录状态
		 Route::get('user/set_password',"Bell_userController@check_user_login");//修改密码
		Route::get('user/logout',"Bell_userController@logout");//退出登录
      Route::get('user/findPass',"Bell_userController@findPass");//修改密码
      });
});

// 需要登录状态的路由
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Admin'], function () {





  //新添加的路由
    //Route::get('/admin',['as'=>'admin.dashboard','uses'=>'DashboardController@index']);

  

       
        
         /*
         *分类管理
         */
 Route::post('class/add', ['as' => 'class.add', 'uses' => 'ClassController@add']);//添加商品分类
 Route::post('new/sort_del', ['as' => 'new.sort_del', 'uses' => 'NewController@sort_del']);//内容分类
  Route::get('new/sort_up', ['as' => 'new.sort_up', 'uses' => 'NewController@sort_up']);//修改分类

                 /*
                 * 商品属性管理
                 */
  Route::get('brand/column', ['as' => 'brand.column', 'uses' => 'BrandController@column']);//栏目分类


  //新添加的路由
        Route::get('Admin/artice/A_fenlei_list', ['as' => 'artice.A_fenlei_list', 'uses' => 'NewController@A_fenlei_list']);//内容分类
        Route::get('Admin/artice/A_fenlei', ['as' => 'artice.A_fenlei', 'uses' => 'NewController@A_fenlei']);//添加内容分类
        Route::get('Admin/artice/A_wenzhang_list', ['as' => 'artice.A_wenzhang_list', 'uses' => 'NewController@A_wenzhang_list']);//文章管理
        Route::get('Admin/artice/A_wenzhang', ['as' => 'artice.A_wenzhang', 'uses' => 'NewController@A_wenzhang']);//添加文章
        
        Route::get('Admin/goods/B_lanmu_list', ['as' => 'goods.B_lanmu_list', 'uses' => 'NewController@B_lanmu_list']);//商品分类
        Route::get('Admin/goods/B_shangbin', ['as' => 'goods.B_shangbin', 'uses' => 'NewController@B_shangbin']);//添加商品
        Route::get('Admin/goods/B_zhigou_list', ['as' => 'goods.B_zhigou_list', 'uses' => 'NewController@B_zhigou_list']);//直购商品列表
        Route::get('Admin/goods/B_zuren_list', ['as' => 'goods.B_zuren_list', 'uses' => 'NewController@B_zuren_list']);//租赁商品列表
        Route::get('Admin/goods/B_zhendou_list', ['as' => 'goods.B_zhendou_list', 'uses' => 'NewController@B_zhendou_list']);//甄豆商品列表
        Route::get('Admin/goods/B_yijia_list', ['as' => 'goods.B_yijia_list', 'uses' => 'NewController@B_yijia_list']);//议价商品列表
        Route::get('Admin/goods/B_dingzhi_list', ['as' => 'goods.B_dingzhi_list', 'uses' => 'NewController@B_dingzhi_list']);//定制商品列表
        Route::get('Admin/goods/B_paimai_list', ['as' => 'goods.B_paimai_list', 'uses' => 'NewController@B_paimai_list']);//拍卖商品列表
        Route::get('Admin/goods/B_feimai_list', ['as' => 'goods.B_feimai_list', 'uses' => 'NewController@B_feimai_list']);//非卖商品列表
        Route::get('Admin/goods/B_zhuanshou_list', ['as' => 'goods.B_zhuanshou_list', 'uses' => 'NewController@B_zhuanshou_list']);//转售商品列表
        Route::get('Admin/goods/B_xianxia_list', ['as' => 'goods.B_xianxia_list', 'uses' => 'NewController@B_xianxia_list']);//线下商品列表
        Route::get('Admin/goods/B_dingdan_list', ['as' => 'goods.B_dingdan_list', 'uses' => 'NewController@B_dingdan_list']);//直购议价定制商品订单列表
        Route::get('Admin/goods/B_dingdana1_list', ['as' => 'goods.B_dingdana1_list', 'uses' => 'NewController@B_dingdana1_list']);//甄豆商品订单列表
        Route::get('Admin/goods/B_dingdana2_list', ['as' => 'goods.B_dingdana2_list', 'uses' => 'NewController@B_dingdana2_list']);//租赁商品订单列表
        Route::get('Admin/goods/B_dingdana3_list', ['as' => 'goods.B_dingdana3_list', 'uses' => 'NewController@B_dingdana3_list']);//拍卖商品订单列表
        Route::get('Admin/goods/B_dingdana4_list', ['as' => 'goods.B_dingdana4_list', 'uses' => 'NewController@B_dingdana4_list']);//定制商品订单列表
        Route::get('Admin/goods/B_yimai_list', ['as' => 'goods.B_yimai_list', 'uses' => 'NewController@B_yimai_list']);//已售商品列表
        Route::get('Admin/goods/B_lanmu', ['as' => 'goods.B_lanmu', 'uses' => 'NewController@B_lanmu']);//添加商品分类
        Route::get('Admin/goods/B_dingdan_completelist', ['as' => 'goods.B_dingdan_completelist', 'uses' => 'NewController@B_dingdan_completelist']);//已完成订单
        Route::get('Admin/goods/B_dingdan_deliverylist', ['as' => 'goods.B_dingdan_deliverylist', 'uses' => 'NewController@B_dingdan_deliverylist']);//已发货订单
        Route::get('Admin/goods/B_dingdan_Nodeliverylist', ['as' => 'goods.B_dingdan_Nodeliverylist', 'uses' => 'NewController@B_dingdan_Nodeliverylist']);//未发货订单

        Route::get('Admin/goods/B_dingdana2_completelist', ['as' => 'goods.B_dingdana2_completelist', 'uses' => 'NewController@B_dingdana2_completelist']);//租赁已完成订单
        Route::get('Admin/goods/B_dingdana2_deliverylist', ['as' => 'goods.B_dingdana2_deliverylist', 'uses' => 'NewController@B_dingdana2_deliverylist']);//租赁已发货订单
        Route::get('Admin/goods/B_dingdana2_Nodeliverylist', ['as' => 'goods.B_dingdana2_Nodeliverylist', 'uses' => 'NewController@B_dingdana2_Nodeliverylist']);//租赁未发货订单

        Route::get('Admin/goods/B_dingdana4_completelist', ['as' => 'goods.B_dingdana4_completelist', 'uses' => 'NewController@B_dingdana4_completelist']);//定制已完成订单
        Route::get('Admin/goods/B_dingdana4_deliverylist', ['as' => 'goods.B_dingdana4_deliverylist', 'uses' => 'NewController@B_dingdana4_deliverylist']);//定制已发货订单
        Route::get('Admin/goods/B_dingdana4_Nodeliverylist', ['as' => 'goods.B_dingdana4_Nodeliverylist', 'uses' => 'NewController@B_dingdana4_Nodeliverylist']);//定制未发货订单

        Route::get('Admin/goods/B_dingdan_backlist', ['as' => 'goods.B_dingdan_backlist', 'uses' => 'NewController@B_dingdan_backlist']);//退款订单
        Route::get('Admin/goods/B_dingdan_read', ['as' => 'goods.B_dingdan_read', 'uses' => 'NewController@B_dingdan_read']);//订单详情
        Route::get('Admin/goods/B_backlist_read', ['as' => 'goods.B_backlist_read', 'uses' => 'NewController@B_backlist_read']);//退款订单详情
        Route::get('Admin/goods/B_dingdan_rented', ['as' => 'goods.B_dingdan_rented', 'uses' => 'NewController@B_dingdan_rented']);//订单详情
        Route::get('Admin/goods/B_shuxing_list', ['as' => 'goods.B_shuxing_list', 'uses' => 'NewController@B_shuxing_list']);//商品属性
			
		Route::post('Admin/goods/add_attr', ['as' => 'goods.add_attr', 'uses' => 'NewController@add_attr']);//添加属性 功能
        Route::get('Admin/goods/B_shuxing', ['as' => 'goods.B_shuxing', 'uses' => 'NewController@B_shuxing']);//添加属性
	    Route::post('Admin/goods/attr_del', ['as' => 'goods.attr_del', 'uses' => 'NewController@attr_del']);//删除属性
        Route::get('Admin/goods/B_specification', ['as' => 'goods.B_specification', 'uses' => 'NewController@B_specification']);//添加属性规格
        Route::post('Admin/goods/add_specif', ['as' => 'goods.add_specif', 'uses' => 'NewController@add_specif']);//添加属性规格内容
        Route::get('Admin/interface/C_huandengpian_list', ['as' => 'interface.C_huandengpian_list', 'uses' => 'NewController@C_huandengpian_list']);//壁纸管理
        Route::get('Admin/interface/C_huandengpian', ['as' => 'interface.C_huandengpian', 'uses' => 'NewController@C_huandengpian']);//添加壁纸

        Route::get('Admin/manage/D_huiyuan_list', ['as' => 'manage.D_huiyuan_list', 'uses' => 'NewController@D_huiyuan_list']);//会员列表
        Route::get('Admin/manage/D_yisujia_list', ['as' => 'manage.D_yisujia_list', 'uses' => 'NewController@D_yisujia_list']);//艺术家列表
        Route::get('Admin/manage/D_yisujia', ['as' => 'manage.D_yisujia', 'uses' => 'NewController@D_yisujia']);//添加艺术家
        Route::get('Admin/manage/D_huiyuan', ['as' => 'manage.D_huiyuan', 'uses' => 'NewController@D_huiyuan']);//添加会员
        Route::get('Admin/manage/D_gallery_list', ['as' => 'manage.D_gallery_list', 'uses' => 'NewController@D_gallery_list']);//画廊列表
        Route::get('Admin/manage/D_gallery', ['as' => 'manage.D_gallery', 'uses' => 'NewController@D_gallery']);//添加画廊
        
        Route::get('Admin/account/E_chongzhi', ['as' => 'account.E_chongzhi', 'uses' => 'NewController@E_chongzhi']);//充值记录
        Route::get('Admin/account/E_consumption', ['as' => 'account.E_consumption', 'uses' => 'NewController@E_consumption']);//消费记录
        Route::get('Admin/account/E_hongbao_list', ['as' => 'account.E_hongbao_list', 'uses' => 'NewController@E_hongbao_list']);//优惠红包
        Route::get('Admin/account/E_hongbao', ['as' => 'account.E_hongbao', 'uses' => 'NewController@E_hongbao']);//发送红包


        


















        Route::get('/admin',['as'=>'admin.dashboard','uses'=>'DashboardController@index'] );
        // 需要登录状态和权限控制的路由
        Route::group(['middleware' => ['auth', 'acl']], function () {
            Route::get('admin/system/logs', ['as' => 'system.logs', 'uses' => 'SystemController@logs']);
            Route::get('admin/system/action', ['as' => 'system.action', 'uses' => 'SystemController@action']);
            Route::get('admin/system/login-history', ['as' => 'system.login-history', 'uses' => 'SystemController@loginHistory']);
            // 权限配置
            Route::any('/admin/acl/resource', ['as' => 'admin.acl.resource.index', 'uses' => 'AclResourceController@index']);
            Route::any('/admin/acl/role', ['as' => 'admin.role.index', 'uses' => 'AclRoleController@index']);
            Route::get('/acl/role/user_edit/{id}', ['as' => 'acl.role.user_edit', 'uses' => 'AclRoleController@user_edit']);
            Route::any('/acl/role/user_role_update/{id}', ['as' => 'acl.role.user_role_update', 'uses' => 'AclRoleController@user_role_update']);

            Route::resource('/acl/resource', 'AclResourceController');
            Route::resource('/acl/role', 'AclRoleController');
            Route::resource('/acl/user', 'AclUserController');
            Route::any('user_role', 'AclUserController@user_role');
            // 用户中心
            Route::get('/Admin/user/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
            Route::get('/user/logouts', ['as' => 'user.logouts', 'uses' => 'UserController@getLogouts']);
            Route::any('Admin/user/my', ['as' => 'user.my', 'uses' => 'UserController@my']);
            Route::get('/Admin/user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
            Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
            Route::get('Admin/user', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
            Route::get('Admin/user/trash/{id}', ['as' => 'user.trash', 'uses' => 'UserController@trash']);
            Route::get('Admin/user/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
            Route::get('user/{id}/restore', ['as' => 'user.restore', 'uses' => 'UserController@restore']);
            Route::post('/user/{id}/lock', ['as' => 'user.lock', 'uses' => 'UserController@lock']);
            Route::post('/user/{id}/unlock', ['as' => 'user.unlock', 'uses' => 'UserController@unlock']);
            Route::post('admin/user/store', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
            Route::resource('user', 'UserController');
            //项目管理
            Route::get('/project/store', ['as' => 'project.store', 'uses' => 'Management_ProController@store']);
            Route::get('/project/list', ['as' => 'project.list', 'uses' => 'Management_ProController@Project_list']);
            Route::get('/project/Set', ['as' => 'project.set', 'uses' => 'Management_ProController@Project_Set']);
            //财务管理
            Route::get('/financial/accounts', ['as' => 'public.accounts', 'uses' => 'FinancialController@Public_accounts']);
            Route::get('/financial/Charging', ['as' => 'charging.projects', 'uses' => 'FinancialController@Charging_projects']);
            Route::get('/financial/social', ['as' => 'social.security', 'uses' => 'FinancialController@social_security']);
            //团队管理
            Route::get('/team/store', ['as' => 'team.store', 'uses' => 'TeamController@store']);
            Route::get('/team/list', ['as' => 'team.team_list', 'uses' => 'TeamController@team_list']);
            Route::get('/team/all_members', ['as' => 'team.all_members', 'uses' => 'TeamController@all_members']);
            //报表中心
            Route::get('/report/project', ['as' => 'report.project', 'uses' => 'ReportController@project_report']);
            Route::get('/report/financial', ['as' => 'report.financial', 'uses' => 'ReportController@report_financial']);

        });
        // 文件上传, 图片处理
        Route::post('upload', 'UploadController@index');
        Route::post('upload/encode', 'UploadController@encode');
        Route::post('upload/Cut_out', 'UploadController@Cut_out');//剪切图片
        Route::get('f/files/{s1}/{s2}/{s3}/{file}', 'ImageController@index');
        Route::get('upload/config', 'UploadController@config');
        // Api

    });
    Route::group(['prefix' => 'api', 'as' => 'api', 'namespace' => 'Api'], function () {
        Route::controller('helper', 'HelperController');

    });

});
