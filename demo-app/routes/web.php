<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

include_once(app_path()."/Custom_Classes/Available-Images.php");
include_once(app_path()."/Custom_Classes/Template-Content.php");
use Custom_App\Available_Images;
use Custom_App\Template_Content;
include_once(app_path()."/Request_Handlers/about-image.php");
use Request_Handlers\about_image;

// Home page main view.
Route::get('/', function (Request $request = null) {
	return view('home');
});

// Get the available pictures for a location
Route::get('/pictureListing',function (Request $request = null){
	$listing = new \Custom_App\Available_Images\Image_Listing();
	return response(json_encode($listing,true))->header("Content-Type","application/json");
});

// Get the picture data for the location.
Route::get("/picture/{fileName}/{imageName}",function($fileName,$imageName){
	$image = new \Custom_App\Available_Images\Image_Data($fileName,$imageName);
	$image->image_contents($fileName,$imageName);
	#return response($image->image_data($fileName,$imageName))->header("Content-Type","application/octet-stream");
});

Route::get("/template/{templateName}",function($templateName = null){
	$template = new Custom_App\Template_Content\Template();
	$data = $template->get_template($templateName);
	
	return response($data)->header("Content-Type","text/html");
});

Route::get("/getImageDetails/{fileName}/{imageName}",function($fileName,$imageName){
	$update_image = new 
		\Request_Handlers\about_image\update_about_image();
	$json_output = $update_image->get_data($fileName."/".$imageName);
	return response($json_output)->header("Content-Type","application/json");
});

// Request a list of currently processed images.
Route::get("/getImageDoneList/",function(){
	$update_image = new 
		\Request_Handlers\about_image\update_about_image();
	return response($update_image->get_done_list())->header("Content-Type","application/json");
});

Route::post("/setComment/",function(){
	$update_image = new 
		\Request_Handlers\about_image\update_about_image();
	$json_output = $update_image->set_data();
	return response($json_output)->header("Content-Type","application/json");
})->middleware("UpdatePictureDetails");