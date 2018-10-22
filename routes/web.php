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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware'=>['web', 'auth.user']],function(){
	//前端路由
	Route::get('/', 'FrontController@index')->name('index');

	//很多人
	Route::get('/manyMan/{type?}','GolController@manyMan');
	//很多人详情
	Route::get('/manyDetail/{id}','GolController@manyManDetail');

	//gol系列
	Route::get('/series/{type?}','GolController@series');
	//gol详情
	Route::get('/golDetail/{id}','GolController@golDetail');

	Route::get('cat/{id}', 'FrontController@cat')->name('category');
	Route::get('post/{id}', 'FrontController@post')->name('post');
	Route::get('page/{id}', 'FrontController@page')->name('page');

	//留言板
	Route::get('message_board','FrontController@messageBoard');
	//搜索页面
	Route::get('search','FrontController@searchPage');
	/**
	 * 账户
	 */
	Route::group(['prefix'=>'auth'],function(){
		#注册用户
		Route::get('reg','FrontController@regUser');
		#用户登陆
		Route::get('login','FrontController@loginUser');
		#退出登陆
		Route::get('logout','FrontController@logoutUser');
		#通知消息
		Route::get('notices','FrontController@userNotices');
		#账号设置
		Route::get('setting','FrontController@userAccountSet');
	});
});


//api接口

//刷新缓存
Route::post('/clearCache','CommonApiController@clearCache');

//ajax请求
Route::group(['prefix'=>'ajax'],function(){
	#提交表单数据
	Route::post('submit_data', 'FrontController@submitInfo');
	#上传文件
	Route::post('upload_file','FrontController@uploadFile');
	#发送邮箱验证码
	Route::get('send_mail_code/{type?}','FrontController@sendEmailCode');
	#修改用户账号设置
	Route::get('change_account','FrontController@changeUserData');
	#留言板/文章详情页 发布留言/回复留言  
	Route::get('publish_reply','FrontController@publishReply');
	#获取更多留言
	Route::get('get_more_messages/{type?}','FrontController@getMoreMessages');
	#发起留言点赞
	Route::get('publish_zan','FrontController@publishZan');
});



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
	// //贷款管理
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



    //小屋管理
    Route::resource('houses', 'HouseController');
    //小屋支持人管理
    Route::resource('houseJoins', 'HouseJoinController');


});









// Route::resource('postComments', 'PostCommentController');

// Route::resource('attachPostComments', 'AttachPostCommentController');

// Route::resource('notices', 'NoticesController');



// Route::resource('attachMessageBoards', 'AttachMessageBoardController');

// Route::resource('attachHouses', 'AttachHouseController');

