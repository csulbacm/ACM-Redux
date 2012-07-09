
function thumbnail(cover_id) {   
	var link = "";

    $.ajax({
      url: 'http://graph.facebook.com/' + cover_id,
      async: false,
      dataType: 'json',
      success: function (data) {
        image_url = data.images[3].source;
        link = image_url;
      }
    });        

    return link;
}

function getGalleryTileData(url) {
	var out = [];
	
	$.ajax({
	  url: url,
	  dataType: 'json',
	  async : false,

	  success: function (data) {
        var $gallery = $("#gallery");
		var albumData = data["data"];        
		var randomAlbumIndex = Math.floor(Math.random() * albumData.length);

		out = [randomAlbumIndex].map( 
		       		function (e) {
					var currentAlbum = albumData[e];
		        	var x =  {
		        		image: thumbnail(currentAlbum.cover_photo),
		      			name : currentAlbum.name,
		        		url : currentAlbum.link
		        	};

		        	return x;
			});

    }
	});

	return out;   
}

function makeTile(galleryThumb) {
	var appendContent = "";
		appendContent += '<h3>' + galleryThumb.name +'</h3>';
		appendContent += '<a href="' + galleryThumb.url + '" target="_blank">';
		appendContent += '<img src="' + galleryThumb.image + '" alt="" style="width:100%;display:block;"/>';
		appendContent += '</a>';

	return appendContent;
}

$(function() {
	var tiles = getGalleryTileData('https://graph.facebook.com/csulbacm/albums/');
	var content = tiles.map(function(e) { return makeTile(e) }).join("");
	$("#photos-content").html('');
	$("#photos-content").append(content);
});