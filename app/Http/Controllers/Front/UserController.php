<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Signuprequest;
use App\Http\Requests\Loginrequest;
use App\User;
use App\Jobs\SendMailJob;
class UserController extends Controller
{
    public function register_page()
    {
    	return view('front.register');
    }
    public function register(Request $request)
    {
    	$data=$request->except(['_token']);
    	$user=User::create([
    		'name'=>$data['name'],
    		'email'=>$data['email'],
    		'password'=>bcrypt($data['password']),
    		'phone'=>$data['phone'],
    		'status'=>0,
    		'verify_token'=>Str::random(40),
    	]);
    	$job=(new SendMailJob($user->verify_token))->delay(\Carbon\Carbon::now()->addSeconds(5));
        dispatch($job);
    	return view('verify');
    }
    public function verify($token)
    {
    	if ($user=User::where('verify_token',$token)->first()) {
    		$user->status=1;
    		$user->save();
    		session()->flash('success' , 'jnjnj');
    		return view('afterverify');
    	}    	
    	
    }
    public function login_page()
    {
    	return view('front.login');
    }
    public function dologin(Loginrequest $request)
    {
    	if ($user=User::where('email',$request->email)->first()) {
    		$status=$user->status;
    	}
    	$remember=request('remember')==1 ? true : false;
    	if(auth()->attempt(['email'=>request('email'), 'password'=>request('password')],$remember)&&$status==1){
    		return redirect(furl('home'));
    	}else{
    		session()->flash('errors' , 'jnjnj');
    		return redirect(furl('login'));
    	}
    }
    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
