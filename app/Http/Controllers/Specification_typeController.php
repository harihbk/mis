<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecification_typeRequest;
use App\Http\Requests\UpdateSpecification_typeRequest;
use App\Repositories\Specification_typeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Specification;

class Specification_typeController extends AppBaseController
{
    /** @var  Specification_typeRepository */
    private $specificationTypeRepository;

    public function __construct(Specification_typeRepository $specificationTypeRepo)
    {
        $this->specificationTypeRepository = $specificationTypeRepo;
    }

    /**
     * Display a listing of the Specification_type.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $specificationTypes = $this->specificationTypeRepository->all();

        return view('specification_types.index')
            ->with('specificationTypes', $specificationTypes);
    }

    /**
     * Show the form for creating a new Specification_type.
     *
     * @return Response
     */
    public function create()
    {
        $specification = Specification::all();
        return view('specification_types.create')->with(compact('specification'));
    }

    /**
     * Store a newly created Specification_type in storage.
     *
     * @param CreateSpecification_typeRequest $request
     *
     * @return Response
     */
    public function store(CreateSpecification_typeRequest $request)
    {
        $input = $request->all();

        $specificationType = $this->specificationTypeRepository->create($input);

        Flash::success('Specification Type saved successfully.');

        return redirect(route('specificationTypes.index'));
    }

    /**
     * Display the specified Specification_type.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $specificationType = $this->specificationTypeRepository->find($id);

        if (empty($specificationType)) {
            Flash::error('Specification Type not found');

            return redirect(route('specificationTypes.index'));
        }

        return view('specification_types.show')->with('specificationType', $specificationType);
    }

    /**
     * Show the form for editing the specified Specification_type.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $specificationType = $this->specificationTypeRepository->find($id);

        if (empty($specificationType)) {
            Flash::error('Specification Type not found');

            return redirect(route('specificationTypes.index'));
        }

        $specification = Specification::all();
        $data =[
            'specification' => $specification,
            'specificationType' => $specificationType
        ];

        return view('specification_types.edit')->with($data);
    }

    /**
     * Update the specified Specification_type in storage.
     *
     * @param int $id
     * @param UpdateSpecification_typeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpecification_typeRequest $request)
    {
        $specificationType = $this->specificationTypeRepository->find($id);

        if (empty($specificationType)) {
            Flash::error('Specification Type not found');

            return redirect(route('specificationTypes.index'));
        }

        $specificationType = $this->specificationTypeRepository->update($request->all(), $id);

        Flash::success('Specification Type updated successfully.');

        return redirect(route('specificationTypes.index'));
    }

    /**
     * Remove the specified Specification_type from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $specificationType = $this->specificationTypeRepository->find($id);

        if (empty($specificationType)) {
            Flash::error('Specification Type not found');

            return redirect(route('specificationTypes.index'));
        }

        $this->specificationTypeRepository->delete($id);

        Flash::success('Specification Type deleted successfully.');

        return redirect(route('specificationTypes.index'));
    }


    public function getspecificationtype(request $request){
      $d =  Specification::with('specificationTypes')->whereIn('id',$request->only('field')["field"])->get();
      echo json_encode($d);
    }
}
