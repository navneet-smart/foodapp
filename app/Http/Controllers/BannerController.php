<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Http\Requests\GetBannersByTruckIdRequest;
use App\Http\Resources\Banners\BannerCollection;
use App\Http\Resources\Banners\BannerResource;
use App\Model\Banner;
use App\Model\FoodTruck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BannerCollection::collection(Banner::paginate(10));
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
    public function store(BannerRequest $request)
    {
        $banner = new Banner;
        $banner->f_id = $request->f_id;

        if (Banner::where('f_id', '=', Input::get('f_id'))->exists()) {
           //Get Banner Image Name
            $bannerImage = Banner::where(['f_id'=>$request->f_id])->first();

            //Get Banner Image Paths
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

            if(!empty($request['image'])){
                // Upload Image Start
                if($request->hasFile('image')){
                    $image_tmp = Input::file('image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'backend_files/img/banners/large/'.$filename;
                        $medium_image_path = 'backend_files/img/banners/medium/'.$filename;
                        $small_image_path = 'backend_files/img/banners/small/'.$filename;
                        // Resize Images
                        Image::make($image_tmp)->save($large_image_path);
                        Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        // Store image name in categories table
                        $banner->image = $filename;
                    }
                }
                // Upload Image End

            }else{
                $banner->image = '';               
            }

            //Update Image from Banners Table
            Banner::where(['f_id'=>$request->f_id])->update(['image'=>$banner->image]);

            return response([
                'status'=>1,
                'message'=>'Banner Updated Successfully!',
                'data'=> new BannerResource($banner)
            ],Response::HTTP_CREATED);
        }

        else{
            if(!empty($request['image'])){
                // Upload Image Start
                if($request->hasFile('image')){
                    $image_tmp = Input::file('image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'backend_files/img/banners/large/'.$filename;
                        $medium_image_path = 'backend_files/img/banners/medium/'.$filename;
                        $small_image_path = 'backend_files/img/banners/small/'.$filename;
                        // Resize Images
                        Image::make($image_tmp)->save($large_image_path);
                        Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        // Store image name in categories table
                        $banner->image = $filename;
                    }
                }
                // Upload Image End

            }else{
                $banner->image = '';               
            }

            $banner->save();
            return response([
                'status'=>1,
                'message'=>'Banner Added Successfully!',
                'data'=> new BannerResource($banner)
            ],Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return [
            'status'=>1,
            'data'=>new BannerResource($banner)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }

    public function getBannersByTruckId(GetBannersByTruckIdRequest $request){
        $f_id=$request->f_id;
        return BannerCollection::collection(Banner::where(['f_id'=>$f_id])->get());
    }

    // Admin Panel
    public function viewBanners(){
        $banners = Banner::orderBy('id', 'DESC')->get();
        $banners = json_decode(json_encode($banners));

        foreach ($banners as $key => $value) {
            $foodTruck = FoodTruck::where(['id'=>$value->f_id])->first();
            $banners[$key]->foodTruck_display_name = $foodTruck->display_name;
        }
        return view('admin.banners.view_banners')->with(compact('banners'));
    }

    public function deleteBanner($id=null){
        if(!empty($id)){
            Banner::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Banner Deleted Successfully!');
        }
    }
}
