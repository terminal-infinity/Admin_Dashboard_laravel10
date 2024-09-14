<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    //Category
    public function view_category(){
        $category=Category::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.view_category',compact('category'));
    }

    public function upload_category(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:categories',
            'image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data=new Category();
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->status = $request->status;

        if($request->file('image')){
            $takeimage =$request->file('image');
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$takeimage->getClientOriginalExtension();
            $img = $manager->read($takeimage);
            $img->resize(3279, 1886);
            $img->toJpeg(80)->save(public_path('categoryimage/'.$name_gen));

            $data->image = $name_gen;
        }
        
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function edit_category($id){
        $category=Category::findOrfail($id);
        return view('admin.partials.product.edit_category',compact('category'));
    }

    public function update_category(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:categories',
            'image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data=Category::findOrfail($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->status = $request->status;

        if($request->file('image')){
            $takeimage =$request->file('image');
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$takeimage->getClientOriginalExtension();
            $img = $manager->read($takeimage);
            $img->resize(3279, 1886);
            $img->toJpeg(80)->save(public_path('categoryimage/'.$name_gen));

            $data->image = $name_gen;
        }
        
        $data->save();

        return redirect()->route('admin.view_category')->with('message', 'Category Update Successfully');

    }

    public function delete_category($id){
        $data=Category::findOrFail($id);

        
        $image_path=public_path('categoryimage/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }



    //SubCategory
    public function view_subcategory(){
        return view('admin.partials.product.view_subcategory');
    }



    //product
    public function view_product(){
        return view('admin.partials.product.view_product');
    }

    public function add_product(){
        return view('admin.partials.product.add_product');
    }
}
