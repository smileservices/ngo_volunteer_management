	</div> <!-- END CONTAINER -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>	
	<script src="<?= base_url() ?>ui/js/bootstrap.min.js"></script>

	<script>
	// select first tab
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