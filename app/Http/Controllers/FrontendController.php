<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Product_part_number;
use App\Models\Parentcategory;
use App\Models\Subcategory;
use DB;
use DataTables;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;
use App\Models\Specification;
use App\Models\Partno_filters;
use App\Models\Rivertnut;

class FrontendController extends Controller
{

    public function __construct()
    {


    }

    public function index(Request $request){
       $category = Categorys::paginate(5);

       if ($request->ajax()) {
        $view = view('frontend.loadcategory',compact('category'))->render();
        return response()->json(['html'=>$view]);
    }
     $product_part_number = DB::table('product_part_number')
    ->join('product', 'product.id', '=', 'product_part_number.product_id')
    ->join('childcategory', 'childcategory.id', '=', 'product.childcategory_id')
    ->join('parentcategory','parentcategory.id','=','childcategory.parentcategory_id')
    ->join('subcategory','subcategory.id','=','parentcategory.subcategory_id')
    ->join('category','category.id','=','subcategory.category_id')
    ->select('product_part_number.icon')
    ->where('category.id','=',1)
    ->get();

    $deal_of_the_day = Product_part_number::where('deal_of_the_day',1)->where('display_status',1)->get();
    $subcategory = Subcategory::where('category_id',1)->limit(20)->get();
    $Rivertnut = Rivertnut::get();


       return view('frontend.index')->with(compact('category','product_part_number','deal_of_the_day','subcategory','Rivertnut'));
    }

    public function product($childcategory_id){
        $products = Product::where('childcategory_id',$childcategory_id)->get();
        return view('frontend.product')->with(compact('products'));
    }

    public function part($product_id){
        $part_number = Product_part_number::where('product_id',$product_id)->where('display_status',1)->get();



$specification = Product_part_number::with(['specification'=>function($query){
    $query->groupBy('specification_id');
}])->where('product_id',$product_id)->get();


        return view('frontend.part_number')->with(compact('part_number','specification'));
    }

    public function parentcats(Request $request,$subcat_id){

       $parent_categorys = Parentcategory::where(['subcategory_id'=>$subcat_id])->get();

       $subcatname = Subcategory::where('id','=',$subcat_id)->first();
       $subcat = Subcategory::find($subcat_id);

    //    if ($request->ajax()) {
    //     $view = view('frontend.loadcategory',compact('category'))->render();
    //     return response()->json(['html'=>$view]);
    // }


       return view('frontend.parentcategory')->with(compact('parent_categorys','subcatname','subcat'));
    }



    public function productpartnumber($product_id){
        $part_number = Product_part_number::where('product_id',$product_id)->where('display_status',1)->get();

        $specification = Product_part_number::with(['specification'=>function($query){
            $query->groupBy('specification_id');
        }])->where('product_id',$product_id)->get();

        return view('frontend.part_number')->with(compact('part_number','specification'));


    }

    public function listparents(Request $request,$parentcategory){

        $pc = Parentcategory::find($parentcategory);


        // parentcategory is id
        $child = Childcategory::where('parentcategory_id','=',$parentcategory)->get();
        $childids =  $child->pluck('id')->toArray();
        $products = Product::wherein('childcategory_id',$childids)->get();
        $product_ids =  $products->pluck('id')->toArray();
        $part_number = Product_part_number::whereIn('product_id',$product_ids)->where('display_status',1)->get();



        if ($request->ajax()) {
            if($request->get('prod_id')){
                $part_number = Product_part_number::where('product_id',$request->get('prod_id'))->where('display_status',1)->get();
            }

            if($request->get('spec_type')){
                $spec_type = $request->get('spec_type');



                $part_number = Product_part_number::query()->whereHas('filterspec_type',function($q) use($spec_type){
                    $q->whereIn('specification_type_id',$spec_type);
                })->whereIn('product_id',$product_ids)->where('display_status',1)->get();
            }


            $data = $part_number;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('img', function($row){
                        $im = url('')."/uploads/$row->icon";
                        $img = "<img class='table-image' src=".$im." width='70%' class='image-icon'>";
                         return $img;
                 })
                 ->addColumn('part_number', function($row){
                     $route = route('website.partnumberpage',$row->id);
                    $img = "<a href='".$route."' class='partnumber'>$row->part_number</a>";
                     return $img;
             })
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['img','part_number','action'])
                    ->make(true);
        }

           $childcategory = [];
           $specification = Specification::all();

           return view('frontend.product_bychild')->with(compact('products','childcategory','specification','pc'));


   }



    public function products(Route $route, Request $request , $childategory_id  ){

        $pc = Childcategory::find($childategory_id);


       $products = Product::where('childcategory_id','=',$childategory_id)->get();
       $product_ids =  $products->pluck('id')->toArray();
       $part_number = Product_part_number::whereIn('product_id',$product_ids)->where('display_status',1)->get();




       if ($request->ajax()) {
        if($request->get('prod_id')){
            $part_number = Product_part_number::where('product_id',$request->get('prod_id'))->where('display_status',1)->get();
        }

        if($request->get('spec_type')){
            $spec_type = $request->get('spec_type');
            $childcategory_id = $request->route('childategory_id');
            $products = Product::where('childcategory_id','=',$childcategory_id)->get();
            $product_ids =  $products->pluck('id')->toArray();

            $part_number = Product_part_number::query()->whereHas('filterspec_type',function($q) use($spec_type){
                $q->whereIn('specification_type_id',$spec_type);
            })->whereIn('product_id',$product_ids)->get();
        }




        $data = $part_number;
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function($row){
                    $im = url('')."/uploads/$row->icon";
                    $img = "<img class='table-image' src=".$im." width='70%' class='image-icon'>";
                     return $img;
             })
             ->addColumn('part_number', function($row){
                 $route = route('website.partnumberpage',$row->id);
                $img = "<a href='".$route."' class='partnumber'>$row->part_number</a>";
                 return $img;
         })
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                })
                ->rawColumns(['img','part_number','action'])
                ->make(true);
    }

       $childcategory = Childcategory::where('id','=',$childategory_id)->first();
       $specification = Specification::all();
       return view('frontend.product_bychild')->with(compact('products','childcategory','specification','pc'));

    }


    public function partnumberpage($partno_id){


        $part_number = Product_part_number::where('id',$partno_id)->where('display_status',1)->first();



       $related_data = Product_part_number::select('icon','part_number','id')->where('product_id',$part_number->product->id)->whereNotIn('id',[$partno_id])->take(5)->get();

        return view('frontend.singlepartnopage')->with(compact('part_number','related_data'));
    }





    public function orderuserview(Request $request)
    {

        $data = Product_part_number::select(['id', 'part_number as name'])
                ->where("part_number","LIKE","%{$request->query('query')}%")->where('display_status',1)
                ->get();

            //    $filterData = Product_part_number::where('part_number','LIKE','%'.$search_partno.'%')

      //  echo json_encode($data);

        return response()->json($data);
    }

    public function revertpages(Request $request){
      $revert = $request->product;



      $revert_name = str_replace('_', ' ', $revert);
      $data = Rivertnut::where('name',$revert_name)->first();
      return view('frontend.revertpage')->with(compact('data'));

    }

    public function enquiry(Request $request){

        $name = $request->name;
        $email = $request->email;
        $phoneno = $request->phoneno;
        $product = $request->product;
        $quantity = $request->quantity;
        $writeanote = $request->writeanote;



        $html = "<table id='customers' style='font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;'>
        <tbody>
        <tr>
        <th style='border: 1px solid #ddd;
        padding: 8px'>Company Name</th>
        <td  style='border: 1px solid #ddd;
        padding: 8px'>$name</td>
        </tr>
        <tr>
        <th  style='border: 1px solid #ddd;
        padding: 8px'>Email ID</th>
        <td  style='border: 1px solid #ddd;
        padding: 8px'>$email</td></tr>
        <tr>
        <th  style='border: 1px solid #ddd;
        padding: 8px'>Phone No</th>
        <td  style='border: 1px solid #ddd;
        padding: 8px'>$phoneno</td></tr>
        <tr>
        <th  style='border: 1px solid #ddd;
        padding: 8px'>Product</th>
        <td  style='border: 1px solid #ddd;
        padding: 8px'>$product</td></tr>
        <tr>
        <th  style='border: 1px solid #ddd;
        padding: 8px'>Quantity</th>
        <td  style='border: 1px solid #ddd;
        padding: 8px'>$quantity</td>
        </tr>
        <tr>
        <th  style='border: 1px solid #ddd;
        padding: 8px'>Write a Note</th>
        <td  style='border: 1px solid #ddd;
        padding: 8px'>$writeanote</td></tr>
        </tbody>
        </table>


        ";


        $details = [
            'title' => 'Mail from BestindiaKart',
            'body' => "",
            'htmltemplate' => $html,

        ];

        $useremail =  $email;
        \Mail::to($useremail)->send(new \App\Mail\Enquirymail($details));
        $revert_name = str_replace(' ', '_', $product);
        return \Redirect::route('revert', $revert_name)->with('message', 'Enquiry Sent successfully!');


    }


}
