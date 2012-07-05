function getGalleryThumb(url) {

    $.getJSON(url, function (data) {
        var $gallery = $("#gallery");
		var albumData = data["data"];        

        if(data["data"].length > 0) {
			console.log(albumData);
		}        
    });
}