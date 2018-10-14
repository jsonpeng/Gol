<?php

namespace App\Repositories;

use App\Models\Notices;
use InfyOm\Generator\Common\BaseRepository;
use App\User;
/**
 * Class NoticesRepository
 * @package App\Repositories
 * @version September 5, 2018, 9:52 am CST
 *
 * @method Notices findWithoutFail($id, $columns = ['*'])
 * @method Notices find($id, $columns = ['*'])
 * @method Notices first($columns = ['*'])
*/
class NoticesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content',
        'link',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Notices::class;
    }


    /**
     * [获取未读或者所有的消息]
     * @param  [type]  $user [description]
     * @param  boolean $read [description]
     * @return [type]        [description]
     */
    public function authNotices($user,$read=false)
    {
            $read = $read ? 1 : 0;
            $notices = Notices::where('user_id',$user->id);
            if(!empty($user)){
                return $read ?  $notices->orderBy('created_at','desc')->get() : $notices->where('read',$read)->get();
            }
            else{
                return [];
            }
    }

    /**
     * [给用户发通知消息]
     * @param  [type] $reply_user_id [description]
     * @param  [type] $user_id       [description]
     * @param  string $type          [description]
     * @param  string $content       [description]
     * @param  array  $arr           [description]
     * @return [type]                [description]
     */
    public function sendUserNotice($reply_user_id,$user_id,$type='board',$content='回复',$arr=['type'=>null])
    {
        #链接地址
        $link = $type== 'board' ? '/message_board?comment_id='.$arr['comment_id'] : '/post/'.$type.'?comment_id='.$arr['comment_id'];
        if(!empty($arr['type'])){
            $link .= '&more=1';
        }
        $user = optional(User::find($user_id));
        $notice = Notices::create([
            'content' => $user->name.$content.'了你的评论',
            'link'  => $link,
            'user_id' => $reply_user_id
        ]);
        //回复的带上通知消息id
        // if($content == '回复'){
            $notice->update([
                'link'=>$notice->link.'&notice_id='.$notice->id
            ]);
        // }
    }

    /**
     * [通过通知消息id设置消息为已读状态]
     * @param [type] $id [description]
     */
    public function setNoticeReadById($id)
    {
        $notice = Notices::find($id);
        if($notice){
            $notice->update(['read'=>1]);
        }
    }

    /**
     * [批量设置用户所有消息为已读]
     * @param [type] $user [description]
     */
    public function setNoticeReaded($user){
        Notices::where('user_id',$user->id)->update(['read'=>1]);
    }

}
