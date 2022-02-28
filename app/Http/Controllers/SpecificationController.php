<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecificationRequest;
use App\Http\Requests\UpdateSpecificationRequest;
use App\Repositories\SpecificationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpecificationController extends AppBaseController
{
    /** @var  SpecificationRepository */
    private $specificationRepository;

    public function __construct(SpecificationRepository $specificationRepo)
    {
        $this->specificationRepository = $specificationRepo;
    }

    /**
     * Display a listing of the Specification.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $specifications = $this->specificationRepository->all();

        return view('specifications.index')
            ->with('specifications', $specifications);
    }

    /**
     * Show the form for creating a new Specification.
     *
     * @return Response
     */
    public function create()
    {
        return view('specifications.create');
    }

    /**
     * Store a newly created Specification in storage.
     *
     * @param CreateSpecificationRequest $request
     *
     * @return Response
     */
    public function store(CreateSpecificationRequest $request)
    {
        $input = $request->all();

        $specification = $this->specificationRepository->create($input);

        Flash::success('Specification saved successfully.');

        return redirect(route('specifications.index'));
    }

    /**
     * Display the specified Specification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error('Specification not found');

            return redirect(route('specifications.index'));
        }

        return view('specifications.show')->with('specification', $specification);
    }

    /**
     * Show the form for editing the specified Specification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error('Specification not found');

            return redirect(route('specifications.index'));
        }

        return view('specifications.edit')->with('specification', $specification);
    }

    /**
     * Update the specified Specification in storage.
     *
     * @param int $id
     * @param UpdateSpecificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpecificationRequest $request)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error('Specification not found');

            return redirect(route('specifications.index'));
        }

        $specification = $this->specificationRepository->update($request->all(), $id);

        Flash::success('Specification updated successfully.');

        return redirect(route('specifications.index'));
    }

    /**
     * Remove the specified Specification from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error('Specification not found');

            return redirect(route('specifications.index'));
        }

        $this->specificationRepository->delete($id);

        Flash::success('Specification deleted successfully.');

        return redirect(route('specifications.index'));
    }
}
