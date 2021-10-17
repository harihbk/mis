<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategorysRequest;
use App\Http\Requests\UpdateCategorysRequest;
use App\Repositories\CategorysRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CategorysController extends AppBaseController
{
    /** @var  CategorysRepository */
    private $categorysRepository;

    public function __construct(CategorysRepository $categorysRepo)
    {

        $this->middleware('permission:categorys-list|categorys-create|categorys-edit|categorys-delete', ['only' => ['index','show']]);
        $this->middleware('permission:categorys-create', ['only' => ['create','store']]);
        $this->middleware('permission:categorys-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:categorys-delete', ['only' => ['destroy']]);
        $this->categorysRepository = $categorysRepo;

    }

    /**
     * Display a listing of the Categorys.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $categorys = $this->categorysRepository->all();

        return view('categorys.index')
            ->with('categorys', $categorys);
    }

    /**
     * Show the form for creating a new Categorys.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorys.create');
    }

    /**
     * Store a newly created Categorys in storage.
     *
     * @param CreateCategorysRequest $request
     *
     * @return Response
     */
    public function store(CreateCategorysRequest $request)
    {
        $input = $request->except('icon');

        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads'), $icon);
            $input['icon'] = $icon;
            }

        $categorys = $this->categorysRepository->create($input);

        Flash::success('Categorys saved successfully.');

        return redirect(route('categorys.index'));
    }

    /**
     * Display the specified Categorys.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categorys = $this->categorysRepository->find($id);

        if (empty($categorys)) {
            Flash::error('Categorys not found');

            return redirect(route('categorys.index'));
        }

        return view('categorys.show')->with('categorys', $categorys);
    }

    /**
     * Show the form for editing the specified Categorys.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categorys = $this->categorysRepository->find($id);

        if (empty($categorys)) {
            Flash::error('Categorys not found');

            return redirect(route('categorys.index'));
        }

        return view('categorys.edit')->with('categorys', $categorys);
    }

    /**
     * Update the specified Categorys in storage.
     *
     * @param int $id
     * @param UpdateCategorysRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategorysRequest $request)
    {
        $categorys = $this->categorysRepository->find($id);

        if (empty($categorys)) {
             Flash::error('Categorys not found');

            return redirect(route('categorys.index'));
        }

        // if there is image found that image will unlink.
            if(isset($categorys->icon)){
                if(file_exists(public_path()."/uploads/$categorys->icon")){
                  //  unlink(public_path()."/uploads/$categorys->icon");
                 }
            }


        // upload image to the public directory.
        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads'), $icon);
            } else {
            $icon = "";
            }

        $categorys = $this->categorysRepository->update($request->all(), $id);
        $categorys->update(['icon'=>$icon]);
        Flash::success('Categorys updated successfully.');

        return redirect(route('categorys.index'));
    }

    /**
     * Remove the specified Categorys from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categorys = $this->categorysRepository->find($id);

        if (empty($categorys)) {
            Flash::error('Categorys not found');

            return redirect(route('categorys.index'));
        }

        $this->categorysRepository->delete($id);

        Flash::success('Categorys deleted successfully.');

        return redirect(route('categorys.index'));
    }
}
