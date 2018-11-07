<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//支付宝支付
Route::group(['prefix' => 'alipay','namespace'=>'Front'], function () {
	Route::any('notify','PayController@notify');
	Route::any('return','PayController@return');
	Route::get('pay','PayController@index');
});

//微信支付
Route::group(['prefix' => 'wechat','namespace'=>'Front'], function () {
	Route::get('pay_web/{id}','PayController@weixinWeb');
	Route::any('notify','PayController@weixinNotify');
	Route::get('pay/{id}','PayController@weixinIndex');
});

//ajax请求
Route::group(['prefix'=>'ajax','namespace'=>'Front'],function(){
	#登录
	Route::post('login_user','AjaxController@loginUser');
	#安全退出
	Route::post('logout_user','AjaxController@logoutUser');
	#发送手机验证码
	Route::post('send_mobile_code','AjaxController@sendMobileCode');
	#手机号注册
	Route::post('reg_mobile','AjaxController@regMobile');
	#完整注册
	Route::post('reg_user','AjaxController@regUser');
	#上传文件
	Route::post('upload_file','AjaxController@uploadFile');
	#发送邮箱验证码
	Route::post('send_mail_code/{type?}','AjaxController@sendEmailCode');
	#给用户发通知消息
	Route::post('send_notice/{user_id}','AjaxController@sendOneUserNoticeAdmin');
	#给所有用户发通知消息
	Route::post('send_group_notice','AjaxController@sendAllUserNotice');
	#设置单条通知消息为已读
	Route::get('set_notice_readed/{id}','AjaxController@setNoticeReaded');

	/**
	 *需要用户登录后才可以操作
	 */
	Route::group(['middleware'=>['webAuth']],function(){
		##更新用户信息
		Route::post('update_user','AjaxController@updateUserApi');

		##用户发布小屋
		Route::post('auth_house_publish','AjaxController@authHousePublish');

		##用户发布gol
		Route::post('auth_gol_publish','AjaxController@authGolPublish');

		##发起实名认证
		Route::post('certs/publish','AjaxController@certsPublish');

		##用户给用户发私信
		Route::post('send_sixin/{user_id}','AjaxController@sendOneUserNoticeSiXin');

		##发起小屋关注
		Route::post('attention_house/{house_id}','AjaxController@attentionHouses');

		/**
		 * 需要用户完成实名认证后可操作
		 */
		Route::group(['middleware'=>['webCert']],function(){
				##存储小屋提交参数
				Route::post('save_house_join/{type?}','AjaxController@saveHouseJoinParam');
		});

	});
	
});


Route::group(['middleware'=>['web'],'namespace'=>'Front'],function(){
	//前端路由
	Route::get('/', 'GolController@index')->name('index');
	//很多人
	Route::get('/manyMan/{type?}','GolController@manyMan');
	//很多人详情
	Route::get('/manyDetail/{id}','GolController@manyManDetail');
	//gol系列
	Route::get('/series/{type?}','GolController@series');
	//gol详情
	Route::get('/golDetail/{id}','GolController@golDetail');

	Route::group(['middleware'=>['auth.user','webCert']],function(){
		//小屋结算参与
		Route::get('/manySettle','GolController@manySettle');
	});

	/**
	 *需要用户登录后才可以操作
	 */
	Route::group(['prefix'=>'user'],function(){
		//用户登录
		Route::get('login','GolController@authLogin');
		//用户注册
		Route::get('reg/mobile','GolController@authMobileReg');
		/**
 		 * 个人中心
 		 */
		Route::group(['middleware'=>'auth.user'],function(){
			//个人中心
			Route::get('center/index','GolController@authCenter');
			//项目中心
			Route::get('center/project','GolController@authProject');
			//我的交易单
			Route::get('center/order','GolController@authOrder');
			//我的关注
			Route::get('center/attention','GolController@authAttention');
			//消息通知
			Route::get('center/notice','GolController@authNotices');
			//我的小屋 主页
			Route::get('center/project/hourse_index','GolController@authHouseIndex');
			//我的小屋 添加页
			Route::get('center/project/hourse_create','GolController@authHouseCreate');
			//我的gol 主页
			Route::get('center/project/gol_index','GolController@authGolIndex');
			//我的gol 添加页
			Route::get('center/project/gol_create','GolController@authGolCreate');
			//实名认证管理
			Route::get('center/certs','GolController@authCerts');
			//发起实名认证
			Route::get('center/certs/publish','GolController@publishCerts');

		});
	});

	//平台协议
	Route::get('/protocol','GolController@protocol');
	Route::get('cat/{id}', 'FrontController@cat')->name('category');
	Route::get('post/{id}', 'FrontController@post')->name('post');
	Route::get('page/{id}', 'FrontController@page')->name('page');

	//搜索结果页面
	Route::get('search','FrontController@searchPage');

});

/**
 *后台
 */
//刷新缓存
Route::post('/clearCache','CommonApiController@clearCache');
Route::get('/getRootSlug/{cat_id}','FrontController@getCatRootSlug');
//在页面中的URL尽量试用ACTION来避免前缀的干扰
Route::group([ 'prefix' => 'zcjy', 'namespace' => 'Admin'], function () {
	//登录
	Route::get('login', 'LoginController@showLoginForm');
	Route::post('login', 'LoginController@login');
	Route::get('logout', 'LoginController@logout');
});

/**
 * ajax接口
 */
Route::group(['prefix' => 'ajax'], function () {
	 //直接根据id返回市区县地区列表
	Route::post('cities/getAjaxSelect/{id}','CitiesController@CitiesAjaxSelect');
	//根据地域返回对应的城市列表
	Route::post('diyu/getAjaxSelect/{diyu}','CitiesController@DiyuCitiesAjaxSelect');
});


//后台管理系统
Route::group(['middleware' => ['auth.admin:admin'], 'prefix' => 'zcjy'], function () {
	//后台首页
	Route::get('/', 'SettingController@setting');
	//通知消息
	Route::resource('notices', 'NoticesController');
	//贷款管理
	// Route::resource('loans', 'LoansController');
	//留言板
	Route::resource('messageBoards', 'MessageBoardController');
    //系统设置
    Route::get('settings/setting', 'SettingController@setting')->name('settings.setting');
    Route::post('settings/setting', 'SettingController@update')->name('settings.setting.update');
    //地图选择
    Route::get('settings/map','SettingController@map');
    //修改密码
	Route::get('setting/edit_pwd','SettingController@edit_pwd')->name('settings.edit_pwd');
    Route::post('setting/edit_pwd/{id}','SettingController@edit_pwd_api')->name('settings.pwd_update');
 
	//部署操作
	Route::get('helper', 'SettingController@helper')->name('settings.helper');

	//文章分类
	Route::resource('categories', 'CategoryController');
	//文章
	Route::resource('posts', 'PostController');

    //自定义文章类型
    Route::resource('customPostTypes', 'CustomPostTypeController');
    //获取所有自定义文章类型
    Route::post('getCustomType','PostController@getCustomType');
    //自定义文章详细字段
    Route::resource('{customposttype_id}/customPostTypeItems', 'CustomPostTypeItemsController');

    //自定义页面类型
    Route::resource('customPageTypes', 'CustomPageTypeController');
    //自定义页面详细字段
    Route::resource('{page_id}/pageItems', 'PageItemsController');
	//页面
	Route::resource('pages', 'PageController');
	//首页横幅
	Route::resource('banners', 'BannerController');

	Route::resource('{banner_id}/bannerItems', 'BannerItemController');
	
	//菜单
	Route::resource('menus', 'MenuController');
	//合作伙伴
	Route::resource('coorperators', 'CoorperatorController');
	//友情链接
	Route::resource('links', 'LinkController');
	//菜单
	Route::post('menu_items', 'MenuItemController@setMenus');
	Route::get('menu_items/add', 'MenuItemController@addItem');
	Route::get('menu_items/{menu_id}', 'MenuItemController@items');
	//留言消息
	Route::resource('messages', 'MessageController');
    //我们的客户
    Route::resource('clients', 'ClientController');
    
    Route::post('reportMany', 'MessageController@reportMany')->name('messages.report');
    Route::post('allDel','MessageController@allDel')->name('messages.alldel');

    //地区设置
    Route::resource('cities','CitiesController');

    //根据pid查看到地区列表
    Route::get('cities/pid/{pid}','CitiesController@ChildList')->name('cities.child.index');
    //为指定父级城市添加地区页面
    Route::get('cities/pid/{pid}/add','CitiesController@ChildCreate')->name('cities.child.create');
    //省市区三级选择
    Route::get('cities/frame/select','CitiesController@CitiesSelectFrame')->name('cities.select.frame');


	//会员管理
	Route::resource('users', 'UserController'); 
    //小屋管理
    Route::resource('houses', 'HouseController');
    //小屋支持人管理
    Route::resource('houseJoins', 'HouseJoinController');

    //GOL系列管理
    Route::resource('gols', 'GolController');

    //实名认证管理
	Route::resource('certs', 'CertsController');

	//商户认证管理
	Route::resource('shanghuCerts', 'ShanghuCertsController');
});




// Route::resource('houseBoards', 'HouseBoardController');

// Route::resource('attachHouseBoards', 'AttachHouseBoardController');