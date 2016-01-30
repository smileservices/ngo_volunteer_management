<!-- Modal Inscriere Voluntari-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div> <!-- end modal header -->
    	<div class="modal-body">
    		<form action="<?= base_url() ?>frontend/inscriere" method="POST">
    		<fieldset>
    			<legend>Inscrie-te voluntar!</legend>
			  	<div class="form-group label-floating is-empty">			    
			    	<label for="nume" class="control-label">Nume/Prenume</label>
			    	<input required="true" type="text" class="form-control" name="nume" id="nume">
			    </div>
			    <div class="form-group has-success">		
			    	<select  required="true" class="form-control" name="judet">
			    		<option>Alege Judet</option>
			    		<option value="AB">Alba</option>
						<option value="AG">Arges</option>
						<option value="AR">Arad</option>
						<option value="B" >Bucuresti</option>
						<option value="BC">Bacau</option>
						<option value="BH">Bihor</option>
						<option value="BN">Bistrita</option>
						<option value="BR">Braila</option>
						<option value="BT">Botosani</option>
						<option value="BV">Brasov</option>
						<option value="BZ">Buzau</option>
						<option value="CJ">Cluj</option>
						<option value="CL">Calarasi</option>
						<option value="CS">Caras-Severin</option>
						<option value="CT">Constanta</option>
						<option value="CV">Covasna</option>
						<option value="DB">Dambovita</option>
						<option value="DJ">Dolj</option>
						<option value="GJ">Gorj</option>
						<option value="GL">Galati</option>
						<option value="GR">Giurgiu</option>
						<option value="HD">Hunedoara</option>
						<option value="HG">Harghita</option>
						<option value="IF">Ilfov</option>
						<option value="IL">Ialomita</option>
						<option value="IS">Iasi</option>
						<option value="MH">Mehedinti</option>
						<option value="MM">Maramures</option>
						<option value="MS">Mures</option>
						<option value="NT">Neamt</option>
						<option value="OT">Olt</option>
						<option value="PH">Prahova</option>
						<option value="SB">Sibiu</option>
						<option value="SJ">Salaj</option>
						<option value="SM">Satu-Mare</option>
						<option value="SV">Suceava</option>
						<option value="TL">Tulcea</option>
						<option value="TM">Timis</option>
						<option value="TR">Teleorman</option>
						<option value="VL">Valcea</option>
						<option value="VN">Vrancea</option>
						<option value="VS">Vaslui</option>
			    	</select>
			    </div>
			    <div class="form-group label-floating is-empty">			    
			    	<label for="email" class="control-label">Adresa de email</label>
			      	<input  required="true" type="email" class="form-control" name="email" id='email'>
			    </div>
			    <div class="form-group label-floating is-empty">
			    	<label for="telefon" class="control-label">Telefon</label>
			      	<input  required="true" type="number" class="form-control" name="telefon" id="telefon">
			    </div>
			    <div class="form-group label-floating is-empty">
			    	<label for="varsta" class="control-label">Varsta</label>	
			      	<input type="number" class="form-control" name="varsta" id="varsta">
			    </div>
			    <div class="form-group label-floating is-empty">
			    	<label for="expertiza" class="control-label">Expertiza</label>	
			      	<input type="text" class="form-control" name="expertiza" id="expertiza">
			    </div>
			    <div class="form-group label-floating is-empty">
			    	<label for="investitie" class="control-label">Cat timp poti aloca?</label>
			      	<input type="text" class="form-control" name="investitie">
			    </div>	
			    <input type="hidden" name="rolId">
			    <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>
		        <button type="submit" value="submit" name="submit" class="btn btn-raised btn-primary">Trimite formularul</button>  
	        </fieldset> 		
	        </form>	  
    	</div> <!-- end modal body -->
    </div>
  </div>
</div><!-- Modal