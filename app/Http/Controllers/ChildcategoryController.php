<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChildcategoryRequest;
use App\Http\Requests\UpdateChildcategoryRequest;
use App\Repositories\ChildcategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Parentcategory;

class ChildcategoryController extends AppBaseController
{
    /** @var  ChildcategoryRepository */
    private $childcategoryRepository;

    public function __construct(ChildcategoryRepository $childcategoryRepo)
    {
        $this->middleware('permission:childcategories-list|childcategories-create|childcategories-edit|childcategories-delete', ['only' => ['index','show']]);
        $this->middleware('permission:childcategories-create', ['only' => ['create','store']]);
        $this->middleware('permission:childcategories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:childcategories-delete', ['only' => ['destroy']]);

        $this->childcategoryRepository = $childcategoryRepo;
    }

    /**
     * Display a listing of the Childcategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $childcategories = $this->childcategoryRepository->all();

        return view('childcategories.index')
            ->with('childcategories', $childcategories);
    }

    /**
     * Show the form for creating a new Childcategory.
     *
     * @return Response
     */
    public function create()
    {
        $parentcategory = Parentcategory::all();
        return view('childcategories.create')->with(compact('parentcategory'));
    }

    /**
     * Store a newly created Childcategory in storage.
     *
     * @param CreateChildcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateChildcategoryRequest $request)
    {
        $input = $request->all();

        $childcategory = $this->childcategoryRepository->create($input);

        Flash::success('Childcategory saved successfully.');

        return redirect(route('childcategories.index'));
    }

    /**
     * Display the specified Childcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $childcategory = $this->childcategoryRepository->find($id);

        if (empty($childcategory)) {
            Flash::error('Childcategory not found');

            return redirect(route('childcategories.index'));
        }

        return view('childcategories.show')->with('childcategory', $childcategory);
    }

    /**
     * Show the form for editing the specified Childcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $childcategory = $this->childcategoryRepository->find($id);

        if (empty($childcategory)) {
            Flash::error('Childcategory not found');

            return redirect(route('childcategories.index'));
        }
        $parentcategory = Parentcategory::all();
        $data =[
            'parentcategory' => $parentcategory,
            'childcategory'  => $childcategory
        ];

        return view('childcategories.edit')->with( $data);
    }

    /**
     * Update the specified Childcategory in storage.
     *
     * @param int $id
     * @param UpdateChildcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChildcategoryRequest $request)
    {
        $childcategory = $this->childcategoryRepository->find($id);

        if (empty($childcategory)) {
            Flash::error('Childcategory not found');

            return redirect(route('childcategories.index'));
        }

        $childcategory = $this->childcategoryRepository->update($request->all(), $id);

        Flash::success('Childcategory updated successfully.');

        return redirect(route('childcategories.index'));
    }

    /**
     * Remove the specified Childcategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $childcategory = $this->childcategoryRepository->find($id);

        if (empty($childcategory)) {
            Flash::error('Childcategory not found');

            return redirect(route('childcategories.index'));
        }

        $this->childcategoryRepository->delete($id);

        Flash::success('Childcategory deleted successfully.');

        return redirect(route('childcategories.index'));
    }
}
