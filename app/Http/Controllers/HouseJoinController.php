<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHouseJoinRequest;
use App\Http\Requests\UpdateHouseJoinRequest;
use App\Repositories\HouseJoinRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\House;

class HouseJoinController extends AppBaseController
{
    /** @var  HouseJoinRepository */
    private $houseJoinRepository;

    public function __construct(HouseJoinRepository $houseJoinRepo)
    {
        $this->houseJoinRepository = $houseJoinRepo;
    }

    /**
     * Display a listing of the HouseJoin.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->houseJoinRepository->pushCriteria(new RequestCriteria($request));
   
        $houseJoins = defaultSearchState($this->houseJoinRepository);

        $input = $request->all();

        if(array_key_exists('name',$input) && !empty($input['name']) ){
            $houses = House::where('name','like','%'.$input['name'].'%')->get();
            $houses_arr = [];
            foreach ($houses as $key => $value) {
                 $houses_arr[] = $value->id;
             } 
             $houseJoins = $houseJoins->whereIn('house_id',$houses_arr);
        }

    
        if(array_key_exists('pay_status',$input) && !empty($input['pay_status']) ){
            $houseJoins = $houseJoins->where('pay_status',$input['pay_status']);
        }

        if(array_key_exists('hetong',$input) && !empty($input['hetong']) ){
            $houseJoins = $houseJoins->where('hetong',$input['hetong']);
        }

        $page_list = 0;

        if(array_key_exists('page_list',$input) && !empty($input['page_list']) ){
            $page_list = $input['page_list'];
        }

        $houseJoins = $houseJoins->orderBy('created_at','desc');

        if($page_list){
            $houseJoins = $houseJoins->paginate($page_list);
        }
        else{
            $houseJoins=$houseJoins->paginate(15);
        }
        return view('house_joins.index')
            ->with('houseJoins', $houseJoins)
            ->with('input',$input)
            ->with('tools',1);
    }

    /**
     * Show the form for creating a new HouseJoin.
     *
     * @return Response
     */
    public function create()
    {
        return view('house_joins.create');
    }

    /**
     * Store a newly created HouseJoin in storage.
     *
     * @param CreateHouseJoinRequest $request
     *
     * @return Response
     */
    public function store(CreateHouseJoinRequest $request)
    {
        $input = $request->all();

        $houseJoin = $this->houseJoinRepository->create($input);

        Flash::success('House Join saved successfully.');

        return redirect(route('houseJoins.index'));
    }

    /**
     * Display the specified HouseJoin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $houseJoin = $this->houseJoinRepository->findWithoutFail($id);

        if (empty($houseJoin)) {
            Flash::error('House Join not found');

            return redirect(route('houseJoins.index'));
        }

        return view('house_joins.show')->with('houseJoin', $houseJoin);
    }

    /**
     * Show the form for editing the specified HouseJoin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $houseJoin = $this->houseJoinRepository->findWithoutFail($id);

        if (empty($houseJoin)) {
            Flash::error('House Join not found');

            return redirect(route('houseJoins.index'));
        }

        return view('house_joins.edit')->with('houseJoin', $houseJoin);
    }

    /**
     * Update the specified HouseJoin in storage.
     *
     * @param  int              $id
     * @param UpdateHouseJoinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHouseJoinRequest $request)
    {
        $houseJoin = $this->houseJoinRepository->findWithoutFail($id);

        if (empty($houseJoin)) {
            Flash::error('House Join not found');

            return redirect(route('houseJoins.index'));
        }

        $houseJoin = $this->houseJoinRepository->update($request->all(), $id);

        Flash::success('更新成功.');

        return redirect(route('houseJoins.index'));
    }

    /**
     * Remove the specified HouseJoin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $houseJoin = $this->houseJoinRepository->findWithoutFail($id);

        if (empty($houseJoin)) {
            Flash::error('House Join not found');

            return redirect(route('houseJoins.index'));
        }

        $this->houseJoinRepository->delete($id);

        Flash::success('House Join deleted successfully.');

        return redirect(route('houseJoins.index'));
    }
}
