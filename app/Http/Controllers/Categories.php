<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class Categories extends Controller
{
     public function saveCategory(Request $request){

        $category =Category::find($request->input("id"));
        $category =(!empty($category))?$category:new Category();
        $category->name = $request->input("name");
        $category->slug = $request->input("slug");
        $category->save();
        return redirect('/admin/categories');
    }
    public function allCategories(){
        $categories =Category::all();

        return view('admin.categories',compact('categories'));
    }
    public function Categories(){
        $categories =Category::all();

        return $categories;
    }

    public function deleteCategory($id){

      $category = Category::find($id);

      if($category){
        $category->delete();
    }

    return redirect('/admin/categories');
}

public function category($id=''){
    if($id){
      $category =Category::find($id);
  }
  else{
    $category = '';
}
return view('admin.addcategory',compact('category'));
}
}
