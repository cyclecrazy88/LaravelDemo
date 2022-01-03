<html>
	<head>
		<title>Home Page...</title>
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.css"/>
		<link type="text/css" rel="stylesheet" href="/css/display_images.css"/>
	</head>
	<body>
		<script type="text/javascript" src="/js/bootstrap.js"></script>
		<script type="module" src="/js/display_images.js"></script>
	
		<script type="text/javascript">
			const image_listing = <?php 
				$listing = new \Custom_App\Available_Images\Image_Listing();
				echo json_encode($listing,true)
			?>
		
		</script>
	
		<x-header/>
	
		<div class="container-fluid border mt-2 ml-2">
			<div class="heading_image p-2">
				<img src="/images_small/letter_box_small.jpg" width="300" height="300"/>
				
				<div class="float-right photo_album_heading">Some snaps and pictures taken from around the Sidmouth area.</div>
				
			</div>
			
			<div class="image-content">
				<div class="spinner-border" role="status">
					<span class="sr-only"></span>
				</div>
			</div>
			
		</div>
	
	</body>
</html>	