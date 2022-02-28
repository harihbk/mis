<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParentcategoryRequest;
use App\Http\Requests\UpdateParentcategoryRequest;
use App\Repositories\ParentcategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Subcategory;

class ParentcategoryController extends AppBaseController
{
    /** @var  ParentcategoryRepository */
    private $parentcategoryRepository;

    public function __construct(ParentcategoryRepository $parentcategoryRepo)
    {

        $this->middleware('permission:parentcategories-list|parentcategories-create|parentcategories-edit|parentcategories-delete', ['only' => ['index','show']]);
        $this->middleware('permission:parentcategories-create', ['only' => ['create','store']]);
        $this->middleware('permission:parentcategories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:parentcategories-delete', ['only' => ['destroy']]);

        $this->parentcategoryRepository = $parentcategoryRepo;
    }

    /**
     * Display a listing of the Parentcategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $parentcategories = $this->parentcategoryRepository->all();

        return view('parentcategories.index')
            ->with('parentcategories', $parentcategories);
    }

    /**
     * Show the form for creating a new Parentcategory.
     *
     * @return Response
     */
    public function create()
    {
        $subcategory = Subcategory::all();
        return view('parentcategories.create')->with(compact('subcategory'));
    }

    /**
     * Store a newly created Parentcategory in storage.
     *
     * @param CreateParentcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateParentcategoryRequest $request)
    {
        $input = $request->except('icon');
        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads'), $icon);
            $input['icon'] = $icon;
            }
        $parentcategory = $this->parentcategoryRepository->create($input);

        Flash::success('Parentcategory saved successfully.');

        return redirect(route('parentcategories.index'));
    }

    /**
     * Display the specified Parentcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parentcategory = $this->parentcategoryRepository->find($id);

        if (empty($parentcategory)) {
            Flash::error('Parentcategory not found');

            return redirect(route('parentcategories.index'));
        }

        return view('parentcategories.show')->with('parentcategory', $parentcategory);
    }

    /**
     * Show the form for editing the specified Parentcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parentcategory = $this->parentcategoryRepository->find($id);

        if (empty($parentcategory)) {
            Flash::error('Parentcategory not found');

            return redirect(route('parentcategories.index'));
        }
        $Subcategory = Subcategory::all();
        $data = [
            'subcategory' => $Subcategory,
            'parentcategory' =>  $parentcategory
        ];
        return view('parentcategories.edit')->with($data);
    }

    /**
     * Update the specified Parentcategory in storage.
     *
     * @param int $id
     * @param UpdateParentcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParentcategoryRequest $request)
    {
        $parentcategory = $this->parentcategoryRepository->find($id);

        if (empty($parentcategory)) {
            Flash::error('Parentcategory not found');

            return redirect(route('parentcategories.index'));
        }


         // if there is image found that image will unlink.
        //  if(isset($request->icon)){
        //     if(file_exists(public_path()."/uploads/$parentcategory->icon")){
        //         unlink(public_path()."/uploads/$parentcategory->icon");
        //      }
        // }


    // upload image to the public directory.


        $parentcategory = $this->parentcategoryRepository->update($request->all(), $id);


        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads'), $icon);
            $parentcategory->update(['icon'=>$icon]);
            }
        Flash::success('Parentcategory updated successfully.');

        return redirect(route('parentcategories.index'));
    }

    /**
     * Remove the specified Parentcategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parentcategory = $this->parentcategoryRepository->find($id);

        if (empty($parentcategory)) {
            Flash::error('Parentcategory not found');

            return redirect(route('parentcategories.index'));
        }

        $this->parentcategoryRepository->delete($id);

        Flash::success('Parentcategory deleted successfully.');

        return redirect(route('parentcategories.index'));
    }
}
