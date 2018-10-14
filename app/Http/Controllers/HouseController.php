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
        $houses = $this->houseRepository->all();

        return view('houses.index')
            ->with('houses', $houses);
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

        if (empty($house)) {
            Flash::error('House not found');

            return redirect(route('houses.index'));
        }

        $house = $this->houseRepository->update($request->all(), $id);

        Flash::success('House updated successfully.');

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

        Flash::success('House deleted successfully.');

        return redirect(route('houses.index'));
    }
}
