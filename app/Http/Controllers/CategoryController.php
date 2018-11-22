<?php

namespace App\Http\Controllers;

use App\Http\Resources\Categories\CategoryCollection;
use App\Http\Resources\Categories\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryCollection::collection(Category::paginate(10));
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
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return [
            'status'=>1,
            'data'=>new CategoryResource($category)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    // Admin Panel
    public function viewCategories(){
        $categories = Category::orderBy('id', 'DESC')->get();
        $categories = json_decode(json_encode($categories));
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Category;

            if (Category::where('category', '=', Input::get('category'))->exists()) {
                return redirect('admin/add-category')->with('flash_message_error', 'Category already Exist!');
            }
            else
            {
                $category->category = $data['category'];

                if(!empty($data['image'])){

                    // Upload Image Start
                    if($request->hasFile('image')){
                        $image_tmp = Input::file('image');
                        if($image_tmp->isValid()){
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = rand(111,99999).'.'.$extension;
                            $large_image_path = 'backend_files/img/categories/large/'.$filename;
                            $medium_image_path = 'backend_files/img/categories/medium/'.$filename;
                            $small_image_path = 'backend_files/img/categories/small/'.$filename;
                            // Resize Images
                            Image::make($image_tmp)->save($large_image_path);
                            Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                            Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                            // Store image name in categories table
                            $category->image = $filename;
                        }
                    }
                    // Upload Image End

                }else{
                    $category->image = '';               
                }

                $category->save();
                return redirect('admin/view-categories')->with('flash_message_success', 'Category Added Successfully!');
            }
        }
        return view('admin.categories.add_category');
    }

    public function editCategory(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            // Upload Image Start
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'backend_files/img/categories/large/'.$filename;
                    $medium_image_path = 'backend_files/img/categories/medium/'.$filename;
                    $small_image_path = 'backend_files/img/categories/small/'.$filename;
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

            Category::where(['id'=>$id])->update(['category'=>$data['category'], 'image'=>$filename]);
            return redirect('admin/view-categories')->with('flash_message_success','Category Updated Successfully!');
           
        }
        $categoryDetail = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetail'));
    }

    public function deleteCategory($id=null){
        if(!empty($id)){

            //Get Category Image Name
            $categoryImage = Category::where(['id'=>$id])->first();

            //Get Category Image Paths
            $large_image_path = 'backend_files/img/categories/large/';
            $medium_image_path = 'backend_files/img/categories/medium/';
            $small_image_path = 'backend_files/img/categories/small/';

            //Delete Large Image If not exists in folder
            if(file_exists($large_image_path.$categoryImage->image)){
                unlink($large_image_path.$categoryImage->image);
            }

             //Delete Medium Image If not exists in folder
            if(file_exists($medium_image_path.$categoryImage->image)){
                unlink($medium_image_path.$categoryImage->image);
            }

             //Delete Small Image If not exists in folder
            if(file_exists($small_image_path.$categoryImage->image)){
                unlink($small_image_path.$categoryImage->image);
            }
            //Delete Image from Categories Table

            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category Deleted Successfully!');
        }
    }

    public function checkCategory(Request $request){
        if (Category::where('category', '=', Input::get('category'))->exists()) {
           echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function deleteCategoryImage($id=null){
        //Get Category Image Name
        $categoryImage = Category::where(['id'=>$id])->first();

        //Get Category Image Paths
        $large_image_path = 'backend_files/img/categories/large/';
        $medium_image_path = 'backend_files/img/categories/medium/';
        $small_image_path = 'backend_files/img/categories/small/';

        //Delete Large Image If not exists in folder
        if(file_exists($large_image_path.$categoryImage->image)){
            unlink($large_image_path.$categoryImage->image);
        }

         //Delete Medium Image If not exists in folder
        if(file_exists($medium_image_path.$categoryImage->image)){
            unlink($medium_image_path.$categoryImage->image);
        }

         //Delete Small Image If not exists in folder
        if(file_exists($small_image_path.$categoryImage->image)){
            unlink($small_image_path.$categoryImage->image);
        }

        //Delete Image from Categories Table
        Category::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success','Category Image Deleted Successfully!');
    }
}
