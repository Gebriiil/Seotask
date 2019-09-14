<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Language;
class LanguageController extends Controller
{
    public function languages()
    {
    	return view('admin.languages.languages');
    }
    public function create_languages()
    {
    	return view('admin.languages.create');
    }
    public function add_languages(Request $request)
    {
    	$rules=[
    		'title'=>'required|min:3',
    		'slogan'=>'required',
    		'image'=>'required'
    	];
    	$request->validate($rules);
    	$data=$request->except(['_token','image']);
    	if ($request->hasFile('image')) {
            $data['image']= image_upload($request->image);
        }
        
        Language::create($data);
        session()->flash('success' , 'Admin Added Succesfully');
        
        return redirect('admin-panel/languages');
    }
    public function language_api(){
    	$language=Language::all();
        return Datatables::of($language)
        ->addColumn('image' , function($row){
            return '
                <img src='. asset("upload/" . $row->image) .' class="m--img-rounded m--marginless m--img-centered" alt=""/ style="width:90px;height:70px;margin-left:20px;margin-right:20px;">
                ';
        })->addColumn('delete' , function($row){
            return '
                <a href="'.aurl('languages/delete/'.$row->id).'" class="btn btn-danger"   id="delete-magazine"><i class="fa fa-trash-o"></i> <input type="hidden" name="" id="id" value="' . $row->id . '"> </a>
                ';
            })->addColumn('edit' , function($row){
            return '
                <a class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info" href=" ' .aurl("languages/edit/".$row->id).'"><i class="fa fa-edit" ></i> 
                </a>
                    
                ';
            })->rawColumns(['image'=>'image','delete' => 'delete' , 'edit'=>'edit'])

        ->make(true);
    }
    public function edit_languages($id)
    {
    	$language=Language::find($id);
    	return view('admin.languages.edit',compact('language'));
    }
    public function update_languages(Request $request,$id)
    {
    	$rules=[
    		'title'=>'required|min:3',
    		'slogan'=>'required'
    	];
    	$request->validate($rules);
    	$data=$request->except(['_token','image']);
    	if ($request->hasFile('image')) {
            $data['image']= image_upload($request->image);
        }
    	$language=Language::find($id);
    	$language->update($data);
        session()->flash('success' , 'Language Added Succesfully');
        return redirect('admin-panel/languages');
    }
    public function delete_languages($id)
    {
    	Language::destroy($id);
    	session()->flash('success' , 'Language Deleted Succesfully');
    	return back();
    }
}
