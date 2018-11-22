<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodTruckRequest;
use App\Http\Requests\GetAllDataByTruckIdRequest;
use App\Http\Resources\FoodTrucks\FoodTruckCollection;
use App\Http\Resources\FoodTrucks\FoodTruckResource;
use App\Model\Banner;
use App\Model\FoodTruck;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FoodTruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FoodTruckCollection::collection(FoodTruck::paginate(10));
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
     public function store(FoodTruckRequest $request)
    {
        $foodTruck = new FoodTruck;
        $foodTruck->user_id = $request->owner_id;
        $foodTruck->display_name = $request->display_name;
        $foodTruck->device_token = $request->device_token;

        if(empty($request->speciality)){
            $foodTruck->speciality = '';
        }else{
            $foodTruck->speciality = $request->speciality;
        }

        if(empty($request->min_order_value)){
            $foodTruck->min_order_value = 0;
        }else{
            $foodTruck->min_order_value = $request->min_order_value;
        }

        if(empty($request->note)){
            $foodTruck->note = '';
        }else{
            $foodTruck->note = $request->note;
        }

        $foodTruck->save();
        return response([
            'status'=>1,
            'message'=>'Food Truck Added Successfully!',
            'data'=> new FoodTruckResource($foodTruck)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FoodTruck  $foodTruck
     * @return \Illuminate\Http\Response
     */
    public function show(FoodTruck $foodTruck)
    {
        // return $foodTruck;
        return [
            'status'=>1,
            'data'=>new FoodTruckResource($foodTruck)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FoodTruck  $foodTruck
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodTruck $foodTruck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FoodTruck  $foodTruck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodTruck $foodTruck)
    {
        $foodTruck->update($request->all());
        return response([
            'status'=>1,
            'message'=>'Food Truck Updated Successfully!',
            'data'=> new FoodTruckResource($foodTruck)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FoodTruck  $foodTruck
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodTruck $foodTruck)
    {
        //
    }

    // Admin Panel
    public function viewfoodTrucks(){
        $foodTrucks = FoodTruck::orderBy('id', 'DESC')->with(['owner', 'banner', 'categories', 'products'])->get();
        $foodTrucks = json_decode(json_encode($foodTrucks));

        // foreach ($foodTrucks as $key => $value) {
        //     $owner = User::where(['id'=>$value->user_id])->first();
        //     $foodTrucks[$key]->owner_name = $owner->name;
        // }

        // print_r(json_encode($foodTrucks));
        // exit;
        return view('admin.foodTrucks.view_foodTrucks')->with(compact('foodTrucks'));
    }

    public function editfoodTruck(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            FoodTruck::where(['id'=>$id])->update(['display_name'=>$data['display_name'], 'speciality'=>$data['speciality'], 'min_order_value'=>$data['min_order_value']]);
            return redirect('admin/view-foodTrucks')->with('flash_message_success','Food Truck Updated Successfully!');
           
        }
        $foodTruckDetail = FoodTruck::where(['id'=>$id])->first();
        return view('admin.foodTrucks.edit_foodTruck')->with(compact('foodTruckDetail'));
    }

    public function deletefoodTruck($id=null){
        if(!empty($id)){

            //Get Banner Image Name
            $bannerImage = Banner::where(['f_id'=>$id])->first();

            //Get Sponser Image Paths
            $large_image_path = 'backend_files/img/banners/large/';
            $medium_image_path = 'backend_files/img/banners/medium/';
            $small_image_path = 'backend_files/img/banners/small/';

            //Delete Large Image If not exists in folder
            if(file_exists($large_image_path.$bannerImage->image)){
                unlink($large_image_path.$bannerImage->image);
            }

             //Delete Medium Image If not exists in folder
            if(file_exists($medium_image_path.$bannerImage->image)){
                unlink($medium_image_path.$bannerImage->image);
            }

             //Delete Small Image If not exists in folder
            if(file_exists($small_image_path.$bannerImage->image)){
                unlink($small_image_path.$bannerImage->image);
            }
            //Delete Image from Banners Table

            FoodTruck::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Food Truck Deleted Successfully!');
        }
    }
}
