<?php

namespace App\Http\Controllers;

use App\Http\Resources\Sponsers\SponserCollection;
use App\Http\Resources\Sponsers\SponserResource;
use App\Model\Sponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class SponserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SponserCollection::collection(Sponser::paginate(10));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function show(Sponser $sponser)
    {
        return [
            'status'=>1,
            'data'=> new SponserResource($sponser)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponser $sponser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponser $sponser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponser $sponser)
    {
        //
    }

        // Admin Panel
    public function viewSponsers(){
        $sponsers = Sponser::orderBy('id', 'DESC')->get();
        $sponsers = json_decode(json_encode($sponsers));
        return view('admin.sponsers.view_sponsers')->with(compact('sponsers'));
    }

    public function addSponser(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $sponser = new Sponser;

            if (Sponser::where('display_name', '=', Input::get('display_name'))->exists()) {
                return redirect('admin/add-sponser')->with('flash_message_error', 'Sponser already Exist!');
            }
            else
            {

                $sponser->display_name = $data['display_name'];

                if(!empty($data['image'])){

                    // Upload Image Start
                    if($request->hasFile('image')){
                        $image_tmp = Input::file('image');
                        if($image_tmp->isValid()){
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = rand(111,99999).'.'.$extension;
                            $large_image_path = 'backend_files/img/sponsers/large/'.$filename;
                            $medium_image_path = 'backend_files/img/sponsers/medium/'.$filename;
                            $small_image_path = 'backend_files/img/sponsers/small/'.$filename;
                            // Resize Images
                            Image::make($image_tmp)->save($large_image_path);
                            Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                            Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                            // Store image name in sponsers table
                            $sponser->image = $filename;
                        }
                    }
                    // Upload Image End

                }else{
                    $sponser->image = '';               
                }

                $sponser->save();
                return redirect('admin/view-sponsers')->with('flash_message_success','Sponser Added Successfully!');
            }
        }
        return view('admin.sponsers.add_sponser');
    }

    public function editSponser(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            // Upload Image Start
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'backend_files/img/sponsers/large/'.$filename;
                    $medium_image_path = 'backend_files/img/sponsers/medium/'.$filename;
                    $small_image_path = 'backend_files/img/sponsers/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }elseif ($data['current_image'] == '') {
                $filename='';
            }

            else{
                $filename=$data['current_image'];
            }
            // Upload Image End

            Sponser::where(['id'=>$id])->update(['display_name'=>$data['display_name'], 'image'=>$filename]);
            return redirect('admin/view-sponsers')->with('flash_message_success','Sponser Updated Successfully!');
           
        }
        $sponserDetail = Sponser::where(['id'=>$id])->first();
        return view('admin.sponsers.edit_sponser')->with(compact('sponserDetail'));
    }

    public function deleteSponser($id=null){
        if(!empty($id)){

            //Get Sponser Image Name
            $sponserImage = Sponser::where(['id'=>$id])->first();

            //Get Sponser Image Paths
            $large_image_path = 'backend_files/img/sponsers/large/';
            $medium_image_path = 'backend_files/img/sponsers/medium/';
            $small_image_path = 'backend_files/img/sponsers/small/';

            //Delete Large Image If not exists in folder
            if(file_exists($large_image_path.$sponserImage->image)){
                unlink($large_image_path.$sponserImage->image);
            }

             //Delete Medium Image If not exists in folder
            if(file_exists($medium_image_path.$sponserImage->image)){
                unlink($medium_image_path.$sponserImage->image);
            }

             //Delete Small Image If not exists in folder
            if(file_exists($small_image_path.$sponserImage->image)){
                unlink($small_image_path.$sponserImage->image);
            }
            //Delete Image from Sponsers Table

            Sponser::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Sponser Deleted Successfully!');
        }
    }

    public function checkSponser(Request $request){
        if (Sponser::where('display_name', '=', Input::get('display_name'))->exists()) {
           echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function deleteSponserImage($id=null){
        //Get Sponser Image Name
        $sponserImage = Sponser::where(['id'=>$id])->first();

        //Get Sponser Image Paths
        $large_image_path = 'backend_files/img/sponsers/large/';
        $medium_image_path = 'backend_files/img/sponsers/medium/';
        $small_image_path = 'backend_files/img/sponsers/small/';

        //Delete Large Image If not exists in folder
        if(file_exists($large_image_path.$sponserImage->image)){
            unlink($large_image_path.$sponserImage->image);
        }

         //Delete Medium Image If not exists in folder
        if(file_exists($medium_image_path.$sponserImage->image)){
            unlink($medium_image_path.$sponserImage->image);
        }

         //Delete Small Image If not exists in folder
        if(file_exists($small_image_path.$sponserImage->image)){
            unlink($small_image_path.$sponserImage->image);
        }

        //Delete Image from Sponsers Table
        Sponser::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success','Sponser Image Deleted Successfully!');
    }
}
