<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Admin;
use App\User;
use App\Http\Requests\Adminrequest;
use App\Http\Requests\Loginrequest;
class AdminAuth extends Controller
{
    public function login()
    {
    	return view('admin.login');
    }
    public function dologin(Loginrequest $request)
    {
    	$remember=request('remember')==1 ? true : false;
    	if(auth()->guard('admin')->attempt(['email'=>request('email'), 'password'=>request('password')],$remember)){
    		return redirect('admin-panel/index');
    	}else{
    		session()->flash('errors' , 'jnjnj');
    		return redirect('admin-panel/login');
    	}
    }
    public function logout()
    {
    	auth()->guard('admin')->logout();
    	return redirect('admin-panel/login');
    }
    public function admins()
    {
    	return view('admin.admins.admins');
    }

    public function admins_api(){
    	$admin=Admin::all();
        return Datatables::of($admin)
        ->addColumn('image' , function($row){
            return '
                <img src='. asset("upload/" . $row->image) .' class="m--img-rounded m--marginless m--img-centered" alt=""/ style="width:90px;height:70px;margin-left:20px;margin-right:20px;">
                ';
        })->addColumn('delete' , function($row){
            return '
                <a class="btn btn-danger" data-toggle="modal" data-target="#magazine_delete" id="delete-magazine"><i class="fa fa-trash-o"></i> <input type="hidden" name="" id="id" value="' . $row->id . '"> </a>
                ';
            })->addColumn('edit' , function($row){
            return '
                <a class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info" href=" ' .aurl("admin/edit/".$row->id).'"><i class="fa fa-edit" ></i> 
                </a>
                    
                ';
            })->rawColumns(['image'=>'image','delete' => 'delete' , 'edit'=>'edit'])

        ->make(true);
    }

    public function create_admins()
    {
    	return view('admin.admins.create');
    }
    public function add_admins(Adminrequest $request)
    {
    	
    	$data=$request->except(['_token','image','password']);
    	if ($request->hasFile('image')) {
            $data['image']= image_upload($request->image);
        }
        $data['password']=bcrypt($request->password);
        Admin::create($data);
        session()->flash('success' , 'Admin Added Succesfully');
        return redirect('admin-panel/admins');
    }
    public function edit_admins($id)
    {
    	$admin=Admin::find($id);
    	return view('admin.admins.edit',compact('admin'));
    }
    public function update_admins(Request $request,$id)
    {
    	$rules=[
    		'name'=>'required|min:3',
    		'email'=>'required|email|max:255',
    		'password'=>'confirmed',
    	];
    	$request->validate($rules);
    	$data=$request->except(['_token','image','password']);
    	if ($request->hasFile('image')) {
            $data['image']= image_upload($request->image);
        }
        if ($request->password) {
            $data['password']=bcrypt($request->password);
        }
        $admin=Admin::find($id);
        $admin->update($data);
        session()->flash('success' , 'Admin Updated Succesfully');
        return redirect('admin-panel/admins');
    }

    //Users
    public function users_api(){
        $user=User::all();
        return Datatables::of($user)
        ->addColumn('status' , function($row){
            if ($row->status==1) {
                return 'Active';
            }else{
                return 'not Active';
            }
            })->addColumn('action' , function($row){
                if ($row->status==1) {
                    return '
                    <a href="'.aurl('user/deactivate/'.$row->id).'" class="btn btn-danger"  id="deactivate"><i class="fa fa-unlock"></i> <input type="hidden" name="" id="id" value="' . $row->id . '"> </a>
                    ';
                }else{
                   return '
                    <a href="'.aurl('user/activate/'.$row->id).'" class="btn btn-success"  id="delete-magazine"><i class="fa fa-lock"></i> <input type="hidden" name="" id="id" value="' . $row->id . '"> </a>
                    '; 
                }
            
            })->rawColumns(['status'=>'status','action'=>'action'])

        ->make(true);
    }

    public function users()
    {
        return view('admin.users.users');
    }
    public function user_deactivate($id)
    {
        $user=User::find($id);
        $user->status=0;
        $user->save();
        return back();
    }
    public function user_activate($id)
    {
        $user=User::find($id);
        $user->status=1;
        $user->save();
        return back();
    }
}
