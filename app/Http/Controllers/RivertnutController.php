<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRivertnutRequest;
use App\Http\Requests\UpdateRivertnutRequest;
use App\Repositories\RivertnutRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Revertvalue;
use App\Models\Setting;


class RivertnutController extends AppBaseController
{
    /** @var  RivertnutRepository */
    private $rivertnutRepository;

    public function __construct(RivertnutRepository $rivertnutRepo)
    {
        $this->rivertnutRepository = $rivertnutRepo;
    }

    /**
     * Display a listing of the Rivertnut.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rivertnuts = $this->rivertnutRepository->all();

        return view('rivertnuts.index')
            ->with('rivertnuts', $rivertnuts);
    }

    /**
     * Show the form for creating a new Rivertnut.
     *
     * @return Response
     */
    public function create()
    {
        return view('rivertnuts.create');
    }

    /**
     * Store a newly created Rivertnut in storage.
     *
     * @param CreateRivertnutRequest $request
     *
     * @return Response
     */
    public function store(CreateRivertnutRequest $request)
    {
        $input = $request->except(['icon','images','title','title_values']);



        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(base_path('uploads'), $icon);
            $input['icon'] = $icon;
            }

            $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=time().'_'.$file->getClientOriginalName();
                    $file->move('image',$name);
                    $images[]=$name;
                }
                $input['images'] = implode("|",$images);


            }

        $rivertnut = $this->rivertnutRepository->create($input);

        $id = $rivertnut->id;

        foreach($_POST['title'] as $k=>$v){

            $arr = [
                'revert_nuts_id' => $id,
                'title'  => $v,
                'title_values' => (isset($_POST['title_values'][$k]) ? $_POST['title_values'][$k] : '')
            ];
            Revertvalue::insert($arr);

        }


        Flash::success('Rivertnut saved successfully.');

        return redirect(route('rivertnuts.index'));
    }

    /**
     * Display the specified Rivertnut.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rivertnut = $this->rivertnutRepository->find($id);

        if (empty($rivertnut)) {
            Flash::error('Rivertnut not found');

            return redirect(route('rivertnuts.index'));
        }



        return view('rivertnuts.show')->with('rivertnut', $rivertnut);
    }

    /**
     * Show the form for editing the specified Rivertnut.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rivertnut = $this->rivertnutRepository->find($id);

        if (empty($rivertnut)) {
            Flash::error('Rivertnut not found');

            return redirect(route('rivertnuts.index'));
        }


        return view('rivertnuts.edit')->with('rivertnut', $rivertnut);
    }

    /**
     * Update the specified Rivertnut in storage.
     *
     * @param int $id
     * @param UpdateRivertnutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRivertnutRequest $request)
    {
        $rivertnut = $this->rivertnutRepository->find($id);

        if (empty($rivertnut)) {
            Flash::error('Rivertnut not found');

            return redirect(route('rivertnuts.index'));
        }

        $rivertnut = $this->rivertnutRepository->update($request->all(), $id);

        Flash::success('Rivertnut updated successfully.');

        return redirect(route('rivertnuts.index'));
    }

    /**
     * Remove the specified Rivertnut from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rivertnut = $this->rivertnutRepository->find($id);

        if (empty($rivertnut)) {
            Flash::error('Rivertnut not found');

            return redirect(route('rivertnuts.index'));
        }

        $this->rivertnutRepository->delete($id);

        Flash::success('Rivertnut deleted successfully.');

        return redirect(route('rivertnuts.index'));
    }
}
