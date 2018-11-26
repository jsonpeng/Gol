<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Repositories\HouseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HouseController extends AppBaseController
{
    /** @var  HouseRepository */
    private $houseRepository;

    public function __construct(HouseRepository $houseRepo)
    {
        $this->houseRepository = $houseRepo;
    }

    /**
     * Display a listing of the House.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->houseRepository->pushCriteria(new RequestCriteria($request));

        $houses = defaultSearchState($this->houseRepository);

        $input = $request->all();

        if(array_key_exists('name',$input) && !empty($input['name']) ){
            $houses = $houses->where('name','like','%'.$input['name'].'%');
        }

        if(array_key_exists('address',$input) && !empty($input['address']) ){
            $houses = $houses->where('address','like','%'.$input['address'].'%');
        }

        if(array_key_exists('type',$input) && !empty($input['type']) ){
            $houses = $houses->where('type',$input['type']);
        }

        if(array_key_exists('status',$input) && !empty($input['status']) ){
            $houses = $houses->where('status',$input['status']);
        }

        $page_list = 0;

        if(array_key_exists('page_list',$input) && !empty($input['page_list']) ){
            $page_list = $input['page_list'];
        }

        $houses = $houses->orderBy('created_at','desc');

        if($page_list){
            $houses = $houses->paginate($page_list);
        }
        else{
            $houses=$houses->paginate(15);
        }
      
        return view('houses.index')
            ->with('houses', $houses)
            ->with('input',$input)
            ->with('tools',1);
    }

    /**
     * Show the form for creating a new House.
     *
     * @return Response
     */
    public function create()
    {
        return view('houses.create');
    }

    /**
     * Store a newly created House in storage.
     *
     * @param CreateHouseRequest $request
     *
     * @return Response
     */
    public function store(CreateHouseRequest $request)
    {
        $input = $request->all();

        $house = $this->houseRepository->create($input);

        Flash::success('House saved successfully.');

        return redirect(route('houses.index'));
    }

    /**
     * Display the specified House.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $house = $this->houseRepository->findWithoutFail($id);

        if (empty($house)) {
            Flash::error('House not found');

            return redirect(route('houses.index'));
        }

        return view('houses.show')->with('house', $house);
    }

    /**
     * Show the form for editing the specified House.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $house = $this->houseRepository->findWithoutFail($id);

        if (empty($house)) {
            Flash::error('House not found');

            return redirect(route('houses.index'));
        }

        return view('houses.edit')->with('house', $house);
    }

    /**
     * Update the specified House in storage.
     *
     * @param  int              $id
     * @param UpdateHouseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHouseRequest $request)
    {
        $house = $this->houseRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($house)) {
            Flash::error('House not found');

            return redirect(route('houses.index'));
        }

        $this->houseRepository->update($input, $id);

        Flash::success('更新小屋成功.');

        if(array_key_exists('tui', $input)){

            app('notice')->sendNoticeToUser($house->user_id,'您的小屋'.tag($input['name'],'orange').'状态已更新为'.tag($input['status']));

        }

        return redirect(route('houses.index'));
    }

    /**
     * Remove the specified House from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $house = $this->houseRepository->findWithoutFail($id);

        if (empty($house)) {
            Flash::error('House not found');

            return redirect(route('houses.index'));
        }

        $this->houseRepository->delete($id);

        Flash::success('删除成功.');

        return redirect(route('houses.index'));
    }
}
