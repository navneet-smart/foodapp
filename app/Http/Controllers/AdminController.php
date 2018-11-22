<?php
namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\FoodTruck;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProviderCategory;
use App\Model\Sponser;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
	public function login(Request $request){
		if($request->isMethod('post')){
			$data=$request->input();

            $userDetail = User::where(['email'=>$data['email']])->first();
            $userDetail = json_decode(json_encode($userDetail));

			if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])){
				if($userDetail->role == 'Admin'){
					return redirect('admin/dashboard')->with('flash_message_success', 'Welcome Admin!');
				}
				else{
					 return redirect('admin')->with('flash_message_error', 'Only Admin can Access!');
				}
			}else{
				return redirect('admin')->with('flash_message_error', 'Invalid Username or Password!');
			}
        }
		return view('admin.admin_login');
	}

	public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logout Successfully!');
    }

	public function dashboard(){
        $owners_count = User::where(['role'=>'Owner'])->count();
        $foodTrucks_count = FoodTruck::count();
        $provider_categories_count = ProviderCategory::count();
        $products_count = Product::count();
        $sponsers_count = Sponser::count();
        $categories_count = Category::count();
        $orders_count = Order::count();
        $dboys_count = User::where(['role'=>'Dboy'])->count();

        $orders_statistic = Order::get();
        $orders_statistic = json_decode(json_encode($orders_statistic));
        $charges_array = array();
        $subtotal_array = array();
        $total_array = array();
        foreach ($orders_statistic as $key => $value) {
           array_push($charges_array, $value->charges);
           array_push($subtotal_array, $value->subtotal);
           array_push($total_array, $value->total);
        }
        $sum_of_charges=array_sum($charges_array);
        $sum_of_subtotal=array_sum($subtotal_array);
        $sum_of_total=array_sum($total_array);

        $foodTrucks = FoodTruck::with('items')->get();
        $foodTrucks = json_decode(json_encode($foodTrucks));

		return view('admin.dashboard')->with(compact('owners_count','foodTrucks_count', 'provider_categories_count', 'products_count', 'sponsers_count', 'categories_count', 'orders_count', 'dboys_count', 'sum_of_charges', 'sum_of_subtotal', 'sum_of_total', 'foodTrucks'));
	}

	public function settings(){
		return view('admin.settings');
	}

    public function checkPassword(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $current_pwd = $data['current_pwd'];
        $check_pwd = User::where(['id'=> Auth::user()->id])->first();

        if(Hash::check($current_pwd,$check_pwd->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $check_pwd = User::where(['email' => Auth::user()->email])->first();
            $current_pwd = $data['current_pwd'];
            if(Hash::check($current_pwd,$check_pwd->password)){
                $password = bcrypt($data['new_pwd']);
                $id = Auth::user()->id;
                User::where('id',$id)->update(['password'=>$password]);
                return redirect()->back()->with('flash_message_success','Password Updated Successfully!');
            }else {
                return redirect()->back()->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }

    public function profile(){
        $user = Auth::user();
        $user = json_decode(json_encode($user));
        return view('admin.profile')->with(compact('user'));
    }

    public function editProfile(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            User::where(['id'=>$id])->update(['name'=>$data['name']]);
            return redirect('/admin/profile')->with('flash_message_success','Profile Updated Successfully!');
        }
        $userDetail = User::where(['id'=>$id])->first();
        return view('admin.edit_profile')->with(compact('userDetail'));
    }
}