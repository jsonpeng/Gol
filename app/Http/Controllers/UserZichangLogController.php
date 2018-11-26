<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserZichangLogRequest;
use App\Http\Requests\UpdateUserZichangLogRequest;
use App\Repositories\UserZichangLogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserZichangLogController extends AppBaseController
{
    /** @var  UserZichangLogRepository */
    private $userZichangLogRepository;

    public function __construct(UserZichangLogRepository $userZichangLogRepo)
    {
        $this->userZichangLogRepository = $userZichangLogRepo;
    }

    /**
     * Display a listing of the UserZichangLog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userZichangLogRepository->pushCriteria(new RequestCriteria($request));

        $userZichangLogs = defaultSearchState($this->userZichangLogRepository);

        $input = $request->all();

        if(array_key_exists('type',$input)&& !empty($input['type']) ){
            $userZichangLogs = $userZichangLogs->where('type',$input['type']);
        }

        if(array_key_exists('status',$input)&& !empty($input['status']) ){
            $userZichangLogs = $userZichangLogs->where('status',$input['status']);
        }

        $page_list = 0;

        if(array_key_exists('page_list',$input)&& !empty($input['page_list']) ){
            $page_list = $input['page_list'];
        }

        $userZichangLogs = $userZichangLogs->orderBy('created_at','desc');
        if($page_list){
            $userZichangLogs = $userZichangLogs->paginate($page_list);
        }
        else{
            $userZichangLogs=$userZichangLogs->paginate(15);
        }
      

        return view('user_zichang_logs.index')
            ->with('userZichangLogs', $userZichangLogs)
            ->with('input',$input)
            ->with('tools',1);
    }

    /**
     * Show the form for creating a new UserZichangLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_zichang_logs.create');
    }

    /**
     * Store a newly created UserZichangLog in storage.
     *
     * @param CreateUserZichangLogRequest $request
     *
     * @return Response
     */
    public function store(CreateUserZichangLogRequest $request)
    {
        $input = $request->all();

        $userZichangLog = $this->userZichangLogRepository->create($input);

        Flash::success('User Zichang Log saved successfully.');

        return redirect(route('userZichangLogs.index'));
    }

    /**
     * Display the specified UserZichangLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userZichangLog = $this->userZichangLogRepository->findWithoutFail($id);

        if (empty($userZichangLog)) {
            Flash::error('User Zichang Log not found');

            return redirect(route('userZichangLogs.index'));
        }

        return view('user_zichang_logs.show')->with('userZichangLog', $userZichangLog);
    }

    /**
     * Show the form for editing the specified UserZichangLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userZichangLog = $this->userZichangLogRepository->findWithoutFail($id);

        if (empty($userZichangLog)) {
            Flash::error('User Zichang Log not found');

            return redirect(route('userZichangLogs.index'));
        }

        return view('user_zichang_logs.edit')->with('userZichangLog', $userZichangLog);
    }

    /**
     * Update the specified UserZichangLog in storage.
     *
     * @param  int              $id
     * @param UpdateUserZichangLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserZichangLogRequest $request)
    {
        $userZichangLog = $this->userZichangLogRepository->findWithoutFail($id);

        if (empty($userZichangLog)) {
            Flash::error('User Zichang Log not found');

            return redirect(route('userZichangLogs.index'));
        }

        $userZichangLog = $this->userZichangLogRepository->update($request->all(), $id);

        Flash::success('处理成功.');

        #给用户通知消息
        app('notice')->sendNoticeToUser($userZichangLog->user_id,'您的转出账单'.tag($userZichangLog->change).'元已到账成功,请查收');

        return redirect(route('userZichangLogs.index'));
    }

    /**
     * Remove the specified UserZichangLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userZichangLog = $this->userZichangLogRepository->findWithoutFail($id);

        if (empty($userZichangLog)) {
            Flash::error('User Zichang Log not found');

            return redirect(route('userZichangLogs.index'));
        }

        $this->userZichangLogRepository->delete($id);

        Flash::success('User Zichang Log deleted successfully.');

        return redirect(route('userZichangLogs.index'));
    }
}
