<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetProductsByCatIdRequest;
use App\Http\Requests\GetProductsByTruckIdRequest;
use App\Http\Requests\GetVegProductsRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SearchByNameRequest;
use App\Http\Resources\FoodTrucks\FoodTruckCollection;
use App\Http\Resources\Products\ProductCollection;
use App\Http\Resources\Products\ProductResource;
use App\Model\FoodTruck;
use App\Model\Product;
use App\Model\ProviderCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->f_id = $request->f_id;
        $product->cat_id = $request->cat_id;
        $product->name = $request->name;
        $product->display_name = $request->display_name;

        if(empty($request->description)){
            $product->description = '';
        }else{
            $product->description = $request->description;
        }

        $product->size_and_price = $request->size_and_price;
        $product->is_veg = $request->is_veg;
        $product->save();

        return response([
            'status'=>1,
            'message'=>'Product Added Successfully!',
            'data'=> new ProductResource($product)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return [
            'status'=>1,
            'data'=>new ProductResource($product)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response([
            'status'=>1,
            'message'=>'Product Updated Successfully!',
            'data'=> new ProductResource($product)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response([
            'status'=>1,
            'message'=>'Product Deleted Successfully!'
        ],Response::HTTP_CREATED);
    }

    public function getProductsByTruckId(GetProductsByTruckIdRequest $request){
        $f_id=$request->f_id;
        return ProductCollection::collection(Product::where(['f_id'=>$f_id])->get());
    }

    public function getVegProducts(GetVegProductsRequest $request){
        $is_veg=$request->is_veg;
        return ProductCollection::collection(Product::where(['is_veg'=>$is_veg])->get());
    }

    public function getProductsByCatId(GetProductsByCatIdRequest $request){
        $cat_id=$request->cat_id;
        return ProductCollection::collection(Product::where(['cat_id'=>$cat_id])->get());
    }

    public function searchByName(SearchByNameRequest $request){
        $name=$request->name;
        $products_data = Product::where('name', 'like', '%'. $name .'%')->orWhere('display_name', 'like', '%'. $name .'%')->get();
        $products_data = json_decode(json_encode($products_data));

        $foodTrucks_array = array();
        foreach ($products_data as $key => $value) {
            $foodTrucks = FoodTruck::where(['id'=>$value->f_id])->with('banner','owner')->get();
            array_push($foodTrucks_array, $foodTrucks[0]);
        }
        $unique_array=array_unique($foodTrucks_array);
        return FoodTruckCollection::collection(collect($unique_array));
    }

    // Admin Panel
    public function viewProducts(){
        $products = Product::orderBy('id', 'DESC')->with(['foodTruck', 'category', 'banner'])->get();
        $products = json_decode(json_encode($products));
        
        // foreach ($products as $key => $value) {
        //     $foodTruck = FoodTruck::where(['id'=>$value->f_id])->first();
        //     $category = ProviderCategory::where(['id'=>$value->cat_id])->first();
        //     $products[$key]->foodTruck_display_name = $foodTruck->display_name;
        //     $products[$key]->category = $category->category;
        // }

        return view('admin.products.view_products')->with(compact('products'));
    }

    public function editProduct(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['is_veg'])){
                $is_veg = 0;
            }else{
                $is_veg = 1;
            }

            Product::where(['id'=>$id])->update(['name'=>$data['name'],'display_name'=>$data['display_name'], 'description'=>$data['description'], 'size_and_price'=>$data['size_and_price'], 'is_veg'=>$is_veg]);
            return redirect('admin/view-foodTrucks')->with('flash_message_success','Product Updated Successfully!');
           
        }
        $productDetail = Product::where(['id'=>$id])->first();
        return view('admin.products.edit_product')->with(compact('productDetail'));
    }

    public function deleteProduct($id=null){
        if(!empty($id)){
            Product::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Product Deleted Successfully!');
        }
    }
}
