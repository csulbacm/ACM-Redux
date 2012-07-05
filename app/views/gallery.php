<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach - Gallery"); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>
    
<div class="main-content container_12" style="background:none">
    <div id="gallery" style="display:inline-block;" ></div>
    <a id="next" href="javascript:void(0);" style="background:#333;color:#fff;display:block;padding:15px 20px;">Next</a>
</div>

<script>
    // TODO: Fix this kludgy mess D8<

    function randomString(len) {
        var set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        var string = [];

        while(len--) {
            string[string.length] = set[Math.floor(Math.random() * set.length)];
        }

        return string.join("");
    }

    function thumbnail(cover_id, id) {   

        $.ajax({
          url: 'http://graph.facebook.com/' + cover_id,
          async: true,
          dataType: 'json',
          success: function (data) {
            image_url = data.images[3].source;
                $('#' + id).append('<img style="width:100%;display:block;" src="' + image_url +  '" alt="" />')
          }
        });        

    }

    function makeTile(album) {
        var name  = album.name;
        var photo = album.cover_photo;
        var id = randomString(10);

        if(typeof(photo) === typeof(undefined)) {
            console.log("lost wall");
        }

        var output = '<div id="' + id + '"class="content-module grid_4">'
            output+= '<h2>' + name + '</h2>';
            output+= '</div>';


        thumbnail(photo, id);
        return output;
    }

    function makeAlbumLink(gallery, albums) {
        var len = albums.length;

        for(var i = 0; i < len; i++) {
            gallery.append(makeTile(albums[i]));
        }
    }

    function jsonGet(url) {
        $.getJSON(url, function (data) {
            var $gallery = $("#gallery");
            var nextUrl  = null;
            try {
                nextUrl  = data.paging.next;
            } catch(e) {
                //
            }
            
            makeAlbumLink($gallery, data["data"])
            
            if(data["data"].length > 0) {

               $('#next').unbind('click');
               $('#next').click( function () {
                    jsonGet(nextUrl);           
               });
            } else {
                $('#next').hide()
            }
        });

    }

    $(function () {
        var album = null;
        jsonGet('http://graph.facebook.com/csulbacm/albums');    
    });
</script>

<?php includePart("base", "documentBottom"); ?>