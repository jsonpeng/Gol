<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserEquityRequest;
use App\Http\Requests\UpdateUserEquityRequest;
use App\Repositories\UserEquityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserEquityController extends AppBaseController
{
    /** @var  UserEquityRepository */
    private $userEquityRepository;

    public function __construct(UserEquityRepository $userEquityRepo)
    {
        $this->userEquityRepository = $userEquityRepo;
    }

    /**
     * Display a listing of the UserEquity.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userEquityRepository->pushCriteria(new RequestCriteria($request));
        $userEquities = $this->userEquityRepository->all();

        return view('user_equities.index')
            ->with('userEquities', $userEquities);
    }

    /**
     * Show the form for creating a new UserEquity.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_equities.create');
    }

    /**
     * Store a newly created UserEquity in storage.
     *
     * @param CreateUserEquityRequest $request
     *
     * @return Response
     */
    public function store(CreateUserEquityRequest $request)
    {
        $input = $request->all();

        $userEquity = $this->userEquityRepository->create($input);

        Flash::success('User Equity saved successfully.');

        return redirect(route('userEquities.index'));
    }

    /**
     * Display the specified UserEquity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userEquity = $this->userEquityRepository->findWithoutFail($id);

        if (empty($userEquity)) {
            Flash::error('User Equity not found');

            return redirect(route('userEquities.index'));
        }

        return view('user_equities.show')->with('userEquity', $userEquity);
    }

    /**
     * Show the form for editing the specified UserEquity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userEquity = $this->userEquityRepository->findWithoutFail($id);

        if (empty($userEquity)) {
            Flash::error('User Equity not found');

            return redirect(route('userEquities.index'));
        }

        return view('user_equities.edit')->with('userEquity', $userEquity);
    }

    /**
     * Update the specified UserEquity in storage.
     *
     * @param  int              $id
     * @param UpdateUserEquityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserEquityRequest $request)
    {
        $userEquity = $this->userEquityRepository->findWithoutFail($id);

        if (empty($userEquity)) {
            Flash::error('User Equity not found');

            return redirect(route('userEquities.index'));
        }

        $userEquity = $this->userEquityRepository->update($request->all(), $id);

        Flash::success('User Equity updated successfully.');

        return redirect(route('userEquities.index'));
    }

    /**
     * Remove the specified UserEquity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userEquity = $this->userEquityRepository->findWithoutFail($id);

        if (empty($userEquity)) {
            Flash::error('User Equity not found');

            return redirect(route('userEquities.index'));
        }

        $this->userEquityRepository->delete($id);

        Flash::success('User Equity deleted successfully.');

        return redirect(route('userEquities.index'));
    }
}
