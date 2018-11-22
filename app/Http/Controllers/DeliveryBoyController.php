<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryBoys\DeliveryBoyCollection;
use App\Mail\TestEmail;
use App\Model\DeliveryBoy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class DeliveryBoyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DeliveryBoyCollection::collection(User::where(['role'=>'Dboy'])->paginate(10));
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
     * @param  \App\Model\DeliveryBoy  $deliveryBoy
     * @return \Illuminate\Http\Response
     */
    public function show(User $deliveryBoy)
    {
        return $deliveryBoy;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DeliveryBoy  $deliveryBoy
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryBoy $deliveryBoy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DeliveryBoy  $deliveryBoy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryBoy $deliveryBoy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\DeliveryBoy  $deliveryBoy
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryBoy $deliveryBoy)
    {
        //
    }

    public function viewdeliveryBoys(){
        $dboys = User::where(['role'=>'Dboy'])->orderBy('id', 'DESC')->get();
        $dboys = json_decode(json_encode($dboys));
        return view('admin.deliveryBoys.view_deliveryBoys')->with(compact('dboys'));
    }

    public function adddeliveryBoy(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $user = new User;

            if (User::where('email', '=', Input::get('email'))->exists()) {
                return redirect('admin/add-deliveryBoy')->with('flash_message_error', 'Email already registered with us!');
            }
            else
            {
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->contact = $data['contact'];
                // $random_password = str_random(10);
                $random_password = '123';
                $user->password = Hash::make($random_password);
                $user->role = 'Dboy';
                $user->remember_token = str_random(40);
                $user->save();
                
                $data = $user->email . ' and ' . $random_password;

                // Mail::to($user->email)->send(new TestEmail($data));
                
                return redirect('admin/view-deliveryBoys')->with('flash_message_success', 'Delivery Boy Added Successfully!');
            }
        }
        return view('admin.deliveryBoys.add_deliveryBoy');
    }

    public function editdeliveryBoy(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            User::where(['id'=>$id])->update(['name'=>$data['name'], 'contact'=>$data['contact']]);
            return redirect('admin/view-deliveryBoys')->with('flash_message_success','Delivery Boy Updated Successfully!');
           
        }
        $dbDetail = User::where(['id'=>$id])->first();
        return view('admin.deliveryBoys.edit_deliveryBoy')->with(compact('dbDetail'));
    }
}
