<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCategoriesByTruckIdRequest;
use App\Http\Requests\ProviderCategoryRequest;
use App\Http\Resources\ProviderCategories\ProviderCategoryCollection;
use App\Http\Resources\ProviderCategories\ProviderCategoryResource;
use App\Model\FoodTruck;
use App\Model\ProviderCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProviderCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProviderCategoryCollection::collection(ProviderCategory::paginate(10));
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
    public function store(ProviderCategoryRequest $request)
    {
        $provider_category = new ProviderCategory;
        $provider_category->f_id = $request->f_id;
        $provider_category->category = $request->category;
        $provider_category->save();
        return response([
            'status'=>1,
            'message'=>'Provider Category Added Successfully!',
            'data'=> new ProviderCategoryResource($provider_category)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProviderCategory  $providerCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProviderCategory $providerCategory)
    {
        return [
            'status'=>1,
            'data'=>new ProviderCategoryResource($providerCategory)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProviderCategory  $providerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProviderCategory $providerCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProviderCategory  $providerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProviderCategory $providerCategory)
    {
        $providerCategory->update($request->all());
        return response([
            'status'=>1,
            'message'=>'Provider Category Updated Successfully!',
            'data'=> new ProviderCategoryResource($providerCategory)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProviderCategory  $providerCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderCategory $providerCategory)
    {
        $providerCategory->delete();
        return response([
            'status'=>1,
            'message'=>'Provider Category Deleted Successfully!'
        ],Response::HTTP_CREATED);
    }

    public function getCategoriesByTruckId(GetCategoriesByTruckIdRequest $request){
        $f_id=$request->f_id;
        return ProviderCategoryCollection::collection(ProviderCategory::where(['f_id'=>$f_id])->get());
    }

    public function getAllProviderCategories(){
        //
    }

    // Admin Panel
    public function viewProviderCategories(){
        $provider_categories = ProviderCategory::orderBy('id', 'DESC')->with(['foodTruck', 'banner'])->get();
        $provider_categories = json_decode(json_encode($provider_categories));

        // foreach ($provider_categories as $key => $value) {
        //     $foodTruck = FoodTruck::where(['id'=>$value->f_id])->first();
        //     $provider_categories[$key]->foodTruck_display_name = $foodTruck->display_name;
        // }

        return view('admin.providerCategories.view_provider_categories')->with(compact('provider_categories'));
    }

    public function editProviderCategory(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            ProviderCategory::where(['id'=>$id])->update(['category'=>$data['category']]);
            return redirect('admin/view-foodTrucks')->with('flash_message_success','Provider Category Updated Successfully!');
           
        }
        $providercategoryDetail = ProviderCategory::where(['id'=>$id])->first();
        return view('admin.providerCategories.edit_provider_category')->with(compact('providercategoryDetail'));
    }

    public function deleteProviderCategory($id=null){
        if(!empty($id)){
            ProviderCategory::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Provider Category Deleted Successfully!');
        }
    }
}
