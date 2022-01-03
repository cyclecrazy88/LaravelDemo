<?php
namespace Custom_App\Available_Images{
	
	use Illuminate\Support\Facades\Storage;
	
	class Image_Listing{
		
		public $fileListing = Array();
		public $appToken = null;
		
		public function __construct(){
			$this->appToken = csrf_token();
			$this->available_image_listing();
		}
		
		private function available_image_listing(){
			$image_listing = scandir(public_path()."/images/");
			foreach ($image_listing as $itemKey => $itemContent){
				if (is_string($itemContent)){
					if (preg_match("/^([A-Za-z_0-9-]{1,})(?:.jpg)$/", $itemContent) !== 0){
						array_push($this->fileListing, "images/".$itemContent);
					}			
				}
			}
			return $itemContent;
		}
		
		private function list_directory_contents(){
			$file_names = Storage::disk('public')->allFiles("images");
			foreach ($file_names as $itemKey => $itemContent){
				if (is_string($itemContent)){
					array_push($this->fileListing, $itemContent);
				}
			}
			return $itemContent;
		}
		
	}
	// Get the Image data for the input item.
	class Image_Data{
		
		public function __construct(){
			
		}
		
		public function image_contents($fileName=null,$imageName=null){
			$imagePath = app_path()."/public/".$fileName."/".$imageName;
			echo "Path: $imagePath\n";
		}
		
		public function image_data($fileName=null,$imageName=null){
			$file_data = Storage::disk('public')->get($fileName."/".$imageName);
			return $file_data;
		}
		
	}
	
}

?>