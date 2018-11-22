<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryBoys\DeliveryBoyResource;
use App\Http\Resources\Owners\OwnerCollection;
use App\Http\Resources\Owners\OwnerResource;
use App\Mail\TestEmail;
use App\Model\FoodTruck;
use App\Model\Owner;
use App\Model\Product;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Session;
use Symfony\Component\HttpFoundation\Response;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OwnerCollection::collection(User::where(['role'=>'Owner'])->paginate(10));
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
     * @param  \App\Model\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(User $owner)
    {
        return [
            'status'=>1,
            'data'=>new OwnerResource($owner)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $credentials = request(['email', 'password']);
        
        if(Auth::attempt($credentials)){
            $owner = User::where(['email'=>$request->email])->get()->first();

            $role = User::where(['role'=>$owner->role])->first();
            $role=json_decode(json_encode($role));
            
            if($role->role == 'Owner'){
                
                $foodTruck_existance=FoodTruck::where(['user_id'=>$owner->id])->first();
            
                if(!empty($foodTruck_existance)){
                    $owner['profile_status']=true;
                    $owner['f_id']=$foodTruck_existance->id;
                    $product_existance = Product::where(['f_id'=>$foodTruck_existance->id])->get()->first();

                    if(!empty($product_existance)){
                        $owner['menu_status']=true;
                    }else{
                        $owner['menu_status']=false;
                    }

                }else{
                    $owner['profile_status']=false;
                    $owner['f_id']=null;
                    $owner['menu_status']=false;
                }
                    
                return response()->json([
                    'status' => 1,
                    'message' => 'Login Successfully!',
                    'data' => new OwnerResource($owner), 
                ], Response::HTTP_CREATED);
            }

            elseif($role->role == 'Dboy'){
                return response()->json([
                    'status' => 1,
                    'message' => 'Login Successfully!',
                    'data' => new DeliveryBoyResource($owner), 
                ], Response::HTTP_CREATED);
            }
        }
        
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Invalid Credentials!',
            ], Response::HTTP_CREATED);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        return response()->json([
            'status' => 1,
            'message' => 'Log Out Successfully!',
        ], Response::HTTP_CREATED);
    }
  
    public function user(Request $request)
    {
        $user = Auth::user();
        
        return response()->json([
            'status' => 1,
            'message' => 'Success!',
            'data'=>$user
        ]);
    }

    // Admin Panel
    public function viewOwners(){
        $owners = User::where(['role'=>'Owner'])->orderBy('id', 'DESC')->get();
        $owners = json_decode(json_encode($owners));
        return view('admin.owners.view_owners')->with(compact('owners'));
    }

    public function addOwner(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $user = new User;

            if (User::where('email', '=', Input::get('email'))->exists()) {
                return redirect('admin/add-owner')->with('flash_message_error', 'Email already registered with us!');
            }
            else
            {
                $user->name = $data['name'];
                $user->email = $data['email'];
                // $random_password = str_random(10);
                $random_password = '123';
                $user->password = Hash::make($random_password);
                $user->role = 'Owner';
                $user->remember_token = str_random(40);
                $user->save();
                
                $data = $user->email . ' and ' . $random_password;

                // Mail::to($user->email)->send(new TestEmail($data));
                
                return redirect('admin/view-owners')->with('flash_message_success', 'Owner Added Successfully!');
            }
        }
        return view('admin.owners.add_owner');
    }

    public function editOwner(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            User::where(['id'=>$id])->update(['name'=>$data['name']]);
            return redirect('admin/view-owners')->with('flash_message_success','Owner Updated Successfully!');
           
        }
        $ownerDetail = User::where(['id'=>$id])->first();
        return view('admin.owners.edit_owner')->with(compact('ownerDetail'));
    }

    public function checkEmail(Request $request){
        if (User::where('email', '=', Input::get('email'))->exists()) {
           echo "true"; die;
        }else{
            echo "false"; die;
        }
    }
}
