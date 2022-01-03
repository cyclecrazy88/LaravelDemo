<?php
namespace Request_Handlers\about_image{
	
	use Illuminate\Http\Request;
	use Illuminate\Routing\Controller;
	use Illuminate\Support\Facades\DB;
	
	class database_update_status{
		public $success = null;
		public function __construct($success ){
			$this->success = $success;
		}
	}
	
	class update_about_image extends Controller{
		
		function __construct(){
			#echo "Update Image...\n";
		}
		
		public function get_done_list(){
			$image_data =
				DB::table("picture_desc")->select("item_key")->get();
			return json_encode($image_data);
		}
		
		// Get the data item for the image content.
		public function get_data($image_key){
			$image_data =
				DB::table("picture_desc")->where("item_key",$image_key)->get();
			return json_encode($image_data);
		}
		// Set/Update the data for database item.
		public function set_data(){
			$request = request();
			parse_str( $request->getContent(),$outputData );
			$currentTime = date('Y-m-d H:i:s');
			$updated =
			DB::table("picture_desc")->upsert(Array("item_key"=>$outputData['selected_image'],
												"item_heading"=>$outputData['image_heading'],
												"item_desc"=>$outputData["image_desc"],
												"update_time"=>$currentTime),
												Array("item_key"));
			return json_encode(new database_update_status(true));
		}
		
	}
	
}
?>