<?php


if (!function_exists('section_1')) {
	function section_1() {
		return \App\Models\section_1::orderBy('id', 'desc')->first();
	}
}

if(!function_exists('aurl')){
	function aurl($url=null){
		return url(  app()->getLocale().'/admin-panel/' . $url);
	}
}
if(!function_exists('furl')){
	function furl($url=null){
		return url(  app()->getLocale().'/'. $url);
	}
}

if(!function_exists('admin')){
	function admin(){
		return auth()->user();
	}
}
if(!function_exists('active_menu')){
	function active_menu($link){
		if (preg_match('/' . $link . '/i', Request::segment(2))) {
			return ['active-menu' , 'display:block'];
		}else{
			return ['' , ''];
		}
	}
}
if(!function_exists('v_image')){
	function v_image($ext=null){
		if ($ext===null) {
			return 'image|mimes:jpg,jpeg,png,gif';
		}else{
			return 'image|mimes:' . $ext;
 		}
	}
}
if (!function_exists('image_upload')){
	function image_upload($file,$image_name=null)
	{
		$image_name=md5 (microtime()) . '.' . $file->getClientOriginalExtension();
		 $file->move(public_path('upload'),$image_name);
		 return $image_name;
	}
}
if (!function_exists('langs')){
	function langs()
	{
		$langs=\App\Language::all();
		$lans=[];
		foreach ($langs as $lang) {
			$lans[$lang->slogan]=array('name'=>$lang->title,'script'=>'Latn','native'=>$lang->title,'slogan'=>$lang->slogan);
		}
		return $lans;
	}
}
if (!function_exists('lans')){
	function lans()
	{
		$lans=\App\Language::all();
		return $lans;
	}
}
if (!function_exists('locales')){
	function locales()
	{
		$lans=\App\Language::all();
		$locales=[];
		foreach ($lans as $lan) {
			$locales+=[$lan->slogan];
		}
		return $locales;
	}
}


?>