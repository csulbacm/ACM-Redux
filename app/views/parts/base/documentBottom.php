			<div id="footer">
			    <div class="grid_6">
			        <div id="address_content">
                        <address>
                            California State University, Long Beach<br>
                            1250 Bellflower Boulevard, Long Beach, California 90840
                        </address>
                    </div>
			    </div>
			    <div class="grid_6">
<img src="<?php echo rx_imageURL("beta.png"); ?>" alt="" />
			        
			    </div>			    
			</div>
		</div>
		        <script type="text/javascript" charset="utf-8">
            (function () {
                var array = location.pathname.split('/');
                var last = location.pathname.split('/').length - 1;
                var currentPage = location.pathname.split('/')[last];
                $('#' + currentPage).addClass('select');

                // Borrowed from Chris Coyier

                $("<select />").appendTo("#nav");

                $("<option />", {
                   "selected": "selected",
                   "value"   : "",
                   "text"    : "Go to..."
                }).appendTo("#nav select");
              
                $("<option />", {
                     "value"   : "<?php echo SITEROOT; ?>",
                     "text"    : "Home"
                 }).appendTo("#nav select");

                $("#nav a").each(function() {
                 var el = $(this);
                 $("<option />", {
                     "value"   : el.attr("href"),
                     "text"    : el.text()
                 }).appendTo("#nav select");
                });          

                $("#nav select").change(function() {
                  window.location = $(this).find("option:selected").val();
                });

             })();            
        </script>
	</body>
</html>