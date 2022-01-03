<?php
namespace Custom_App\Template_Content{
	
	use Illuminate\Support\Facades\Storage;
	
	class Template{
		
		function __construct(){
			
			
		}
		
		public function get_template($template_name = null){
			$target = "/templates/".$template_name.".html";
			
			if (Storage::disk("public")->exists($target)){
				$file_data = Storage::disk("public")->get($target);
				return $file_data;
			}else{
				return "";
			}
		}
	}
	
}

?>