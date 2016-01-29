	</div> <!-- END CONTAINER -->
	<script src="<?= base_url() ?>ui/all.js"></script>

	<script>
	$.material.init();
	// select first tab

	// masonry and imagesLoaded
	var elem = document.querySelector('.grid');
	imagesLoaded( elem, function() {
		$('.grid').masonry({
		  // options
		  itemSelector: '.grid-item'
		});
	});
	// end
	$( "#mainPanel ul.nav li:first-child" ).addClass( "active" );
	$( ".tab-content div.tab-pane:first-child" ).addClass( "active" );

		//triggered when modal is about to be shown
		$('#myModal').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var rolId = row.data('rol-id');
		    console.log(rolId);
		    //populate the textbox
		    $(event.currentTarget).find('input[name="rolId"]').val(rolId);
		});
	</script>
</body>
</html>