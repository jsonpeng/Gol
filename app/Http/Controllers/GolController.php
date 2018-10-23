<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GolController extends Controller
{

	//首页
    public function index(Request $request)
    {
       
        return view('front.index');
    }

	//很多人
	public function manyMan(Request $request,$type='小屋')
	{
		return view('front.gol.many',compact('type'));
	}


	//很多人详情
	public function manyManDetail(Request $request,$id)
	{
		return view('front.gol.many_detail');
	}

	//gol系列
	public function series(Request $request,$type='青旅')
	{
		return view('front.gol.series',compact('type'));
	}

	//gol详情
	public function golDetail(Request $request,$id)
	{
		return view('front.gol.series_detail');
	}

	/**
	 * 个人中心
	 */
	//个人登录
	public function authLogin(Request $request)
	{
		return view('front.auth.login');
	}
}
