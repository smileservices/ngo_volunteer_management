	</div> <!-- END CONTAINER -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>	
	<script src="<?= base_url() ?>ui/js/bootstrap.min.js"></script>

	<script>
		//triggered when modal is about to be shown
		$('#edit_rol').on('show.bs.modal', function(event) {

		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var rolId = row.data('rol-id');
		    var rolNume = row.data('rol-nume');
		    var rolSarcini = row.data('rol-sarcini');
		    var rolTimp = row.data('rol-timp');
		    //console.log(rolNume);
		    //populate the textbox
		    $(event.currentTarget).find('input[name="rolId"]').val(rolId);
		    $(event.currentTarget).find('input[name="rolNume"]').val(rolNume);
		    $(event.currentTarget).find('textarea[name="rolSarcini"]').val(rolSarcini);
		    $(event.currentTarget).find('input[name="rolTimp"]').val(rolTimp);
		});
	</script>
	<script>
		$('#create_rol').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var proiectId = row.data('proiect-id');
		    $(event.currentTarget).find('input[name="proiectId"]').val(proiectId);
		    });
	</script>
	<script>
		$('#edit_proiect').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var proiectId = row.data('proiect-id');
		    var proiectNume = row.data('proiect-nume');
		    var proiectActiv = row.data('proiect-activ');
		    var proiectPic = row.data('proiect-pic');
		    var proiectDescriere = row.data('proiect-descriere');
		    $(event.currentTarget).find('input[name="proiectId"]').val(proiectId);
		    $(event.currentTarget).find('input[name="proiectNume"]').val(proiectNume);
		    $(event.currentTarget).find('select[name="proiectActiv"]').val(proiectActiv);
		    $(event.currentTarget).find('input[name="proiectPic"]').val(proiectPic);
		    $(event.currentTarget).find('textarea[name="proiectDescriere"]').val(proiectDescriere);
		    });
	</script>
	<script>
		$('#edit_pic').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var proiectPic = row.data('proiect-pic');
		    var proiectPicRoute = window.location.origin +'/upload/img/'+proiectPic;
		    var proiectId = row.data('proiect-id');
		    $(event.currentTarget).find('input[name="proiectId"]').val(proiectId);
		    $(event.currentTarget).find('input[name="proiectPic"]').val(proiectPic);
		    $(event.currentTarget).find('img[name="proiectPic"]').attr("src",proiectPicRoute);
		    });
	</script>
		<script>
		$('#edit_voluntar').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var voluntarId = row.data('voluntar-id');
		    var voluntarNume = row.data('voluntar-nume');
		    var voluntarTelefon = row.data('voluntar-telefon');
		    var voluntarEmail = row.data('voluntar-email');
		    var voluntarJudet = row.data('voluntar-judet');
		    var voluntarVarsta = row.data('voluntar-varsta');
		    var voluntarExpertiza = row.data('voluntar-expertiza');
		    var voluntarTimp = row.data('voluntar-timp');
		    $(event.currentTarget).find('input[name="voluntarId"]').val(voluntarId);
		    $(event.currentTarget).find('input[name="voluntarNume"]').val(voluntarNume);
		    $(event.currentTarget).find('input[name="voluntarTelefon"]').val(voluntarTelefon);
		    $(event.currentTarget).find('input[name="voluntarEmail"]').val(voluntarEmail);
		    $(event.currentTarget).find('select[name="voluntarJudet"]').val(voluntarJudet);
		    $(event.currentTarget).find('input[name="voluntarExpertiza"]').val(voluntarExpertiza);
		    $(event.currentTarget).find('input[name="voluntarTimp"]').val(voluntarTimp);
		    $(event.currentTarget).find('input[name="voluntarVarsta"]').val(voluntarVarsta);
		    });
	</script>
	<script>
		$('#edit_rol_voluntar').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var validat = row.data('validat');		    
		    var match_rol_id = row.data('match-rol-id');
		    var match_id = row.data('match-id');
		    $(event.currentTarget).find('select[name="validat"]').val(validat);
		    $(event.currentTarget).find('select[name="match_rol_id"]').val(match_rol_id);
		    $(event.currentTarget).find('input[name="match-id"]').val(match_id);
		    });
	</script>
	<script>
		$('#adauga_rol_voluntar').on('show.bs.modal', function(event) {
		    //get data-id attribute of the clicked element
		    var row = $(event.relatedTarget);
		    var voluntar_id = row.data('voluntar-id');
		    $(event.currentTarget).find('input[name="voluntar_id"]').val(voluntar_id);
		    });
	</script>
</body>
</html>