<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Repositories\SubcategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Categorys;
class SubcategoryController extends AppBaseController
{
    /** @var  SubcategoryRepository */
    private $subcategoryRepository;

    public function __construct(SubcategoryRepository $subcategoryRepo  )
    {

        $this->middleware('permission:subcategories-list|subcategories-create|subcategories-edit|subcategories-delete', ['only' => ['index','show']]);
        $this->middleware('permission:subcategories-create', ['only' => ['create','store']]);
        $this->middleware('permission:subcategories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subcategories-delete', ['only' => ['destroy']]);

        $this->subcategoryRepository = $subcategoryRepo;
    }

    /**
     * Display a listing of the Subcategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subcategories = $this->subcategoryRepository->all();


        return view('subcategories.index')
            ->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new Subcategory.
     *
     * @return Response
     */
    public function create()
    {
        $category = Categorys::all();

        return view('subcategories.create')->with(compact('category'));
    }

    /**
     * Store a newly created Subcategory in storage.
     *
     * @param CreateSubcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSubcategoryRequest $request)
    {
        $input = $request->all();

        $subcategory = $this->subcategoryRepository->create($input);

        Flash::success('Subcategory saved successfully.');

        return redirect(route('subcategories.index'));
    }

    /**
     * Display the specified Subcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.show')->with('subcategory', $subcategory);
    }

    /**
     * Show the form for editing the specified Subcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }
        $category = Categorys::all();
        $data = [
            'subcategory'  => $subcategory,
            'category'   =>  $category,

        ];
        return view('subcategories.edit')->with($data);
    }

    /**
     * Update the specified Subcategory in storage.
     *
     * @param int $id
     * @param UpdateSubcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubcategoryRequest $request)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        $subcategory = $this->subcategoryRepository->update($request->all(), $id);

        Flash::success('Subcategory updated successfully.');

        return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified Subcategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        $this->subcategoryRepository->delete($id);

        Flash::success('Subcategory deleted successfully.');

        return redirect(route('subcategories.index'));
    }
}
