<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\User;
use App\Models\Role;

class ApiController extends Controller
{//category
    public function storeCategory(Request $request)
    {
         Category::create($request->all());
         return response()->json(['status'=>true, 'message'=>'Successfully category has been added']);
    }
 
    public function updateCategory(Request $request,$id)
    {
         $category=Category::find($id);
         $category->update($request->all());
         return response()->json(['status'=>true, 'message'=>'Successfully category has been updated']);
    }
    public function showCategory($id){
         $category=Category::with('subcategories')->find($id);
         return response()->json(['status'=>true, 'data'=>$category]);

    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();         
        return response()->json(['status'=>true, 'message'=>'Successfully category has been deleted']);

    }
    //categories with sub categories
    public function categories()
    {
        $categories = Category::with('subcategories.products')->latest()->get();
        return response()->json(['status'=>true, 'data'=>$categories]);
    }

    //subcategories
    public function storeSubcategory(Request $request)
    {
        Subcategory::create($request->all());
        return response()->json(['status'=>true, 'message'=>'Successfully Subcategory has been added']);
    }
    public function updateSubcategory(Request $request,$id)
    {
         $subCategory=Subcategory::find($id);
         $subCategory->update($request->all());
         return response()->json(['status'=>true, 'message'=>'Successfully Subcategory has been updated']);
    }
    public function showSubcategory($id){
         $subCategory=Subcategory::find($id);
         return response()->json(['status'=>true, 'data'=>$subCategory]);

    }
    public function deleteSubcategory($id){
        $subCategory=Subcategory::find($id)->delete();         
        return response()->json(['status'=>true, 'message'=>'Successfully Subcategory has been deleted']);
    }
   

    //product
    public function storeProduct(Request $request){
        Product::create($request->all());
        return response()->json(['status'=>true,'message'=>'Successfully stored product']);
    }

    public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        $product->update($request->all());
        return response()->json(['status'=>true,'message'=>'successfully product updated']);

    }
    public function showProduct($id){
        $productDetails=Product::find($id);
        return response()->json(['status'=>true,'data'=>$productDetails]);
    }
     public function deleteProduct($id){
        Product::find($id)->delete();
        return response()->json(['status'=>true,'message'=>'Product deleted successfully']);
    }


    //many to many relation
    public function storeRole(Request $request){
        Role::create($request->all());
        return response()->json(['status'=>true,'message'=>'successfully added role']);
    }
     public function storeUser(Request $request){
        User::create($request->all());
        return response()->json(['status'=>true,'message'=>'successfully added User']);
    }
     public function assignRole(Request $request){
         
         $explodes = (explode(",",$request->role_ids));
         
        $user = User::find($request->user_id);
        $user->roles()->sync($explodes);


        return response()->json(['status'=>true,'message'=>'successfully asigned role']);
    }
}
