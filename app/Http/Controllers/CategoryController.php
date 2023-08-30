<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:categories,name',
            'category_img'=>'mimes:png,jpg,jpeg',
        ]);
        $image_name = null;
        if($request->hasFile('category_img')){
            $image = $request->file('category_img');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/category'),$image_name);
        }
        $category = Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'category_img'=>$image_name,

        ]);
        return redirect()->route('category.index');
    }

    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name'=>'required|unique:categories,name,'.$category,
            'category_img'=>'mimes:png,jpg,jpeg',
        ]);
        $image_name = $category->category_img;
        if($request->hasFile('category_img')){
            $image = $request->file('category_img');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/categry/'),$image_name);
        }
        $category = Category::update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'category_img'=>$image_name,

        ]);
    }
    public function destroy(Category $category){
        if($category->category_img != null){
            if(file_exists(public_path('uploads/category/'.$category_img))){
                File::delete(public_path('uploads/category/'.$category_img));
            }
        }
        return redirect()->route('category.index');

    }
    public function show(Category $category){

    }
}
