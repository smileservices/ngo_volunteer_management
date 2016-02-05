	</div> <!-- END CONTAINER -->
	<script src="<?= base_url() ?>ui/all.js"></script>

	<script>
$(document).ready(function(){
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

	// $('.roluri-link').click(function(){		
	// 	setTimeout(function(){
	// 		$('.grid').masonry();
	// 	}, 180);
	// });
	$('.roluri-link').click(function(){
		var link = this;
		$(link).hide();
	});

	$('.panel-footer')
		.on('shown.bs.collapse', function() {
			$('.grid').masonry();
		});


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
				$('#myModal').modal('hide');
				$('#response').text(data);
				$('#success').modal('show');
			}
		});		
	})
});
	</script>
</body>
</html>