
class DisplayImages{
	
	constructor(){
		console.log("Display Images...");
		this.processRequest()
	}
	
	async processRequest(){
		var data = await this.getData()
		if (data instanceof Object &&
			data.fileListing instanceof Array){
			var fileData = data.fileListing
			
			var doneList = await fetch("/getImageDoneList")
			var resultList = await doneList.json()
			
			// --------------------------------------------------------------------------
			// Loop around and just display those items which haven't been processed yet.
			// --------------------------------------------------------------------------
			var outputList = Array()
			for (var listingKey in data.fileListing){
				var itemFound = false;
				if (resultList instanceof Array){
					for (var resultKey in resultList){
						if (resultList[resultKey].item_key == data.fileListing[listingKey]){
							itemFound = true
						}
					}
				}
				if (!itemFound){
					outputList.push(data.fileListing[listingKey])
				}
			}
			
			
			
			var randomIndex = Math.floor(Math.random()*outputList.length)
			var selectedImage = outputList[randomIndex]
			//var selectedImage = data.fileListing[3]
			
			
			//var imageData = await fetch("/"+selectedImage)
			var template = await this.getTemplate()
			
			
			var inputDesc = "";
			var inputHeading = "";
			var templateDetail = await fetch("/getImageDetails/"+selectedImage)
			var templateDetailJson = await templateDetail.json()
			if (templateDetailJson instanceof Array &&
				templateDetailJson.length > 0){
				inputHeading = templateDetailJson[0]["item_heading"]
				inputDesc = templateDetailJson[0]["item_desc"]
			}
			
			if (typeof template == "string"){
				var viewContent = new Vue({
					template:template,
					el:".image-content",
					data:function(){
						return {
							image_heading:inputHeading,
							image_url:"/"+selectedImage,
							image_detail:inputDesc,
							updated_text:"",
							image_name:selectedImage}
					},
					methods:{
						
						submitChange:async function(eventData){
							if (eventData instanceof Event){
								var image_heading = this.image_heading
								
								var requestObj = {
									image_heading:this.image_heading,
									selected_image:selectedImage,
									image_desc:this.image_detail,
									_token:image_listing.appToken,
								}
								const requestBody = new URLSearchParams(requestObj).toString()
								var requestAction = await fetch("/setComment",
									{method:"POST",body:requestBody,
										headers:{
											'X-CSRF-TOKEN':image_listing.appToken,
										}})
								var actionResult = await requestAction.json()
								if (actionResult instanceof Object &&
									actionResult.success){
									this.updated_text = "Image detail updated for ("+selectedImage+")"
								}

							}
						}
						
					}
				})
			}
		}
	}
	
	async getData(){
		if (image_listing instanceof Object){
			return image_listing
		}else{
			var data = await fetch("/pictureListing/")
			var json = await data.json()
			return json
		}
		
	}
	
	async getTemplate(){
		var template = await fetch("/template/image-template")
		return await template.text()
	}
}
window.addEventListener("load",function(){
	new DisplayImages()
})
