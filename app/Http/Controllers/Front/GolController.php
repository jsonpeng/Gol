<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //正在参与
        $hourses_now_join =  app('common')->houseRepo()->nowJoinHouses();

        //即将结束
        $hourses_near_end = app('common')->houseRepo()->isEndHouses();

        //即将上架
        $hourses_for_sale =  app('common')->houseRepo()->forSaleHouses();

        return view('front.gol.many',compact('type','hourses_now_join','hourses_near_end','hourses_for_sale'));
    }

    //很多人详情
    public function manyManDetail(Request $request,$id)
    {

        $hourse = app('common')->houseRepo()->getHouseDetail($id);
        $error = null;
        if(!isset($hourse->hourse)){
            $error = $hourse;
        }
        return view('front.gol.many_detail',compact('hourse','error'));
    }

    //gol系列
    public function series(Request $request,$type='青旅')
    {
        $gols = app('common')->golRepo()->getTypeGols($type);
        return view('front.gol.series',compact('type','gols'));
    }

    //gol详情
    public function golDetail(Request $request,$id)
    {
        $gol = app('common')->golRepo()->getGolDetail($id);
        $error = null;
        if(!isset($gol->detail)){
             $error = $gol;
        }
        return view('front.gol.series_detail',compact('gol','error'));
    }

    /**
     * 个人中心
     */
    //个人登录
    public function authLogin(Request $request)
    {
        return view('front.auth.login');
    }

    //个人手机号快速注册
    public function authMobileReg(Request $request)
    {
        return view('front.auth.mobile_reg');
    }

    //个人中心
    public function authCenter(Request $request)
    {
        $user = auth('web')->user();
        return view('front.auth.usercenter');
    }

    //个人中心 -> 项目中心
    public function authProject(Request $request)
    {
        return view('front.auth.project');
    }

    //个人中心 -> 我的交易单
    public function authOrder(Request $request)
    {
        return view('front.auth.order');
    }


    //个人中心 -> 我的关注
    public function authAttention(Request $request)
    {
        return view('front.auth.attention');
    }

    //通知中心
    public function authNotices(Request $request)
    {
        $user = auth('web')->user();
        $notices = app('notice')->authNotices($user,true);
        //$this->noticesRepository->setNoticeReaded($user);
        return view('front.auth.notice',compact('notices'));
    }

    //平台协议
    public function protocol(Request $request)
    {
        return view('front.protocol');
    }

}