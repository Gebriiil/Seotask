<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Http\Requests\Productrequest;
use App\Product;
class ProductController extends Controller
{
    public function products()
    {
    	return view('admin.products.products');
    }
    public function create_products()
    {
    	return view('admin.products.create');
    }
    public function add_products(Productrequest $request)
    {
    	$data=$request->except(['image']);
    	if ($request->hasFile('image')) {
            $data['image']= image_upload($request->image);
        }
        
    	Product::create($data);
    	session()->flash('success' , 'Product Added Succesfully');
        return redirect('admin-panel/products');
    }
    public function product_api(){
    	$product=Product::all();
        return Datatables::of($product)
        ->addColumn('name' , function($row){
            return $row->{"name:".app()->getLocale()};
        })->addColumn('desc' , function($row){
             return $row->{"desc:".app()->getLocale()};
        })->addColumn('price' , function($row){
             return $row->{"price:".app()->getLocale()};
        })->addColumn('image' , function($row){
            return '
                <img src='. asset("upload/" . $row->image) .' class="m--img-rounded m--marginless m--img-centered" alt=""/ style="width:90px;height:70px;margin-left:20px;margin-right:20px;">
                ';
        })->addColumn('delete' , function($row){
            return '
                <a href="'.aurl('products/delete/'.$row->id).'" class="btn btn-danger"   id="delete-magazine"><i class="fa fa-trash-o"></i> <input type="hidden" name="" id="id" value="' . $row->id . '"> </a>
                ';
            })->addColumn('edit' , function($row){
            return '
                <a class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info" href=" ' .aurl("products/edit/".$row->id).'"><i class="fa fa-edit" ></i> 
                </a>
                    
                ';
            })->rawColumns(['image'=>'image','delete' => 'delete' , 'edit'=>'edit'])

        ->make(true);
    }
    public function edit_products($id)
    {
    	$product=Product::find($id);
    	return view('admin.products.edit',compact('product'));
    }
    public function update_products(Productrequest $request,$id)
    {
    	$data=$request->except(['image']);
    	if ($request->hasFile('image')) {
            $data['image']= image_upload($request->image);
        }
        $product=Product::find($id);
        $product->update($data);
    	session()->flash('success' , 'Product Added Succesfully');
        return redirect('admin-panel/products');
    }
    public function delete_products($id)
    {
    	Product::destroy($id);
    	session()->flash('success' , 'Product Deleted Succesfully');
    	return back();
    }
}
