	</div> <!-- END CONTAINER -->
	<script src="<?= base_url() ?>ui/all.js"></script>

	<script>
	var base_url = '<?= base_url() ?>';
	$.material.init();
	
	// ajax loading screen
	$(document).on({
    	ajaxStart: function() { $('body').addClass("loading"); },
    	ajaxStop: function() { $('body').removeClass("loading"); }    
	});

	// masonry and imagesLoaded
	var elem = document.querySelector('.grid');
	imagesLoaded( elem, function() {
		$('.grid').masonry({
		  // options
		  itemSelector: '.grid-item'
		});
	});
	// end

	//triggered when modal is about to be shown
	$('#myModal').on('show.bs.modal', function(event) {
	    //get data-id attribute of the clicked element
	    var row = $(event.relatedTarget);
	    var rolId = row.data('rol-id');
	    //console.log(rolId);
	    //populate the textbox
	    $(event.currentTarget).find('input[name="rolId"]').val(rolId);
	});

	// form submit
	$('#inscriere').submit(function(event) {
		event.preventDefault();
		var data = $( this ).serialize();
		$.ajax({
			method: "POST",
			url: base_url+"frontend/inscriere",
			data: data,
			dataType: "text",
			success: function(data) {
				console.log(data);
				$('#myModal').modal('hide');
				var modalSucces = $('#success');
				modalSucces.modal('show');
			}
		});		
	})
	</script>
</body>
</html>