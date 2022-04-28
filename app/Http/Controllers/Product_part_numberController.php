<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct_part_numberRequest;
use App\Http\Requests\UpdateProduct_part_numberRequest;
use App\Repositories\Product_part_numberRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Partnofield;
use App\Models\Partno_filters;
use App\Models\Product_part_number;
use App\Models\Weight;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct_part_number;


use Session;
class Product_part_numberController extends AppBaseController
{


    /** @var  Product_part_numberRepository */
    private $productPartNumberRepository;

    public function __construct(Product_part_numberRepository $productPartNumberRepo)
    {
        $this->middleware('permission:products-list|products-create|products-edit|products-delete', ['only' => ['index','show']]);
        $this->middleware('permission:products-create', ['only' => ['create','store']]);
        $this->middleware('permission:products-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:products-delete', ['only' => ['destroy']]);
        $this->productPartNumberRepository = $productPartNumberRepo;
    }

    /**
     * Display a listing of the Product_part_number.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productPartNumbers = $this->productPartNumberRepository->all();

        return view('product_part_numbers.index')
            ->with(compact('productPartNumbers'));
    }

    /**
     * Show the form for creating a new Product_part_number.
     *
     * @return Response
     */
    public function create()
    {

        $product = Product::all();
        $dynamicfield = [];
        $specification = Specification::all();
        $weights = Weight::all();
        $units   = Unit::all();
         return view('product_part_numbers.create')->with(compact('product','specification','dynamicfield','weights','units'));
    }

    /**
     * Store a newly created Product_part_number in storage.
     *
     * @param CreateProduct_part_numberRequest $request
     *
     * @return Response
     */
    public function store(CreateProduct_part_numberRequest $request)
    {


        $input = $request->except(['specification_id','icon','addmore']);

        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(base_path('uploads'), $icon);
            $input['icon'] = $icon;
            }



            // form insert
        $productPartNumber = $this->productPartNumberRepository->create($input);


        $spec_filter = $request->only(['specification_id']);


        if(isset($request->only('specification_id')['specification_id'])){
        foreach ($request->only('specification_id')['specification_id'] as $k=>$tag) {

            $productPartNumber -> specification() -> attach($k);
        }

        foreach ($spec_filter['specification_id'] as $kk=>$spectype_filter) {
            if(is_array($spectype_filter)){
            foreach ($spectype_filter as $kkk=>$vvv) {
                $array = array(
                    'product_part_number_id' => $productPartNumber->id,
                    'specification_type_id'  => $vvv,
                    'specification_id'       => $kk,
                );
                Partno_filters::create($array);
            }
            } // check if array
        }
    }


        //dynamic fields


        // $request->validate([

        //     'addmore.*._label' => 'required',

        //     'addmore.*._value' => 'required',

        // ]);



 // add more
        foreach ($request->addmore as $key => $value) {
            $value['product_part_number_id'] = $productPartNumber->id;
            if(!empty($value['_label'])){
                Partnofield::create($value);
            }


        }





        Flash::success('Product Part Number saved successfully.');

        return redirect(route('productPartNumbers.index'));
    }

    /**
     * Display the specified Product_part_number.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }

        return view('product_part_numbers.show')->with('productPartNumber', $productPartNumber);
    }

    /**
     * Show the form for editing the specified Product_part_number.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }
        $product = Product::all();
        $specification = Specification::all();
        $data = [
            'specification'      => $specification,
             'product'            => $product,
             'productPartNumber' => $productPartNumber,
             'dynamicfield'       => Partnofield::where('product_part_number_id',$id)->get(),
             'weights'            => Weight::all(),
             'units'              => Unit::all()
        ];
        return view('product_part_numbers.edit')->with($data);
    }

    /**
     * Update the specified Product_part_number in storage.
     *
     * @param int $id
     * @param UpdateProduct_part_numberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduct_part_numberRequest $request)
    {


        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }
        $input = $request->except('specification_id','addmore');

   // if there is image found that image will unlink.

//    if(isset($productPartNumber->icon)){
//     if(file_exists(public_path()."/uploads/$productPartNumber->icon")){
//         unlink(public_path()."/uploads/$productPartNumber->icon");
//      }
// }



        // // upload image to the public directory.
        // if($request->hasFile('icon')) {
        // $icon = time().'_'.$request->icon->getClientOriginalName();
        // $request->icon->move(public_path('uploads'), $icon);
        // //$productPartNumber->update(['icon'=>$icon]);

        // }



$productPartNumber = $this->productPartNumberRepository->update($input, $id);

        $productPartNumber->specification()->sync([]);



        if($request->hasFile('icon')) {
            $icon = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->move(base_path('uploads'), $icon);

            Product_part_number::where('id', $id)->update(array('icon' => $icon));

            }


        if(isset($request->only('specification_id')['specification_id']) && $request->only('specification_id')['specification_id']){


        foreach ($request->only('specification_id')['specification_id'] as $k=>$tag) {
            $productPartNumber -> specification() -> attach($k);
        }

        $spec_filter = $request->only(['specification_id']);
        Partno_filters::where('product_part_number_id',$productPartNumber->id)->delete();

        foreach ($spec_filter['specification_id'] as $kk=>$spectype_filter) {
            if(is_array($spectype_filter)){
            foreach ($spectype_filter as $kkk=>$vvv) {
                $array = array(
                    'product_part_number_id' => $productPartNumber->id,
                    'specification_type_id'  => $vvv,
                    'specification_id'       => $kk,
                );
                Partno_filters::create($array);
            }
        } // check if array

        }



    }


        Partnofield::where('product_part_number_id',$id)->delete();
        foreach ($request->addmore as $key => $value) {
            $value['product_part_number_id'] = $id;
            if(!empty($value['_label'])){
                Partnofield::create($value);
            }

        }



        Flash::success('Product Part Number updated successfully.');

        return redirect(route('productPartNumbers.index'));
    }

    /**
     * Remove the specified Product_part_number from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }

        $this->productPartNumberRepository->delete($id);

        Flash::success('Product Part Number deleted successfully.');

        return redirect(route('productPartNumbers.index'));
    }



    public function partno(Request $request){

        $search_partno =  $request->partno;
        $childcategory =$request->childategory_id;
        $routeName = $request->prevurl;
        $n_id      = $request->n_id;

        $filterData = Product_part_number::where('part_number','LIKE','%'.$search_partno.'%')->where('display_status',1)
        ->first();
         if($filterData == null){
            Session::flash('partno','Part number Doest not exist, search another product');

          if($routeName == "website.parentcats"){
            return redirect()->route($routeName, ['subcat_id' => $n_id]);
          }

          if($routeName == "website.partnumberpage"){
            return redirect()->route($routeName, ['partno_id' => $n_id]);
          }

          if($routeName == "website.products"){
            return redirect()->route($routeName, ['childategory_id' => $n_id]);
          }


            return redirect()->route($routeName);
         }
        $childcategory = $filterData->product->childcategory->id;

        return redirect()->route('website.products', ['childategory_id' => $childcategory]);
       // return redirect(route("products/10"));



    }


    public function import(Request $request){

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Excel::import(new ImportProduct_part_number, $request->file('file')->store('files'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Flash::success('Product Part Number updated successfully.');

        return redirect()->back();
    }
}
