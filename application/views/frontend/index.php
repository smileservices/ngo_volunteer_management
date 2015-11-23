<?php require 'header.php'; ?>

 
 
<!-- pax -->			
<div id="mainPanel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Aici construim o alternativa la clasa politica</h3>
  </div>
  <div class="panel-body">

				<h3>Mesajul Romaniei Curate:</h3>
<div class="cols2">					<p>Dragi prieteni din strada si din spatele ecranelor</p>				 

					<p>Un sistem politic cu partide nereprezentative si corupte a esuat. Lumea nereprezentata a iesit in 
					strada. Si multa lume care nu a iesit se simte mai solidara cu protestatatarii decat cu partidele.
					Alternativa la ele nu este insa structurata. Societatea politica trebuie reconstruita ca sa fie mai 
					reprezentativa, de la baza in sus, fara a politiza integral societatea civila, dar cu implicarea ei. 
					Este treaba sefului statului sa rezolve criza politica, dar a noastra sa oferim pe termen lung acea 
					alternativa la clasa politica de care ne-am saturat.</p><p>
					Invitam, ca atare, pe cei care vor sa puna umarul la acest efort dar nu stiu cu cine sa se asocieze 
					si ce sa faca sa se adune aici, prin intermediul aplicatiei noastre. Cine este interesat de o idee sau 
					alta sa selecteze optiunile adecvate prin aplicatie. Un moderator al Romaniei curate va lua 
					legatura cu voi toti pentru a stabili o intrevedere.</p>

					<p>Romania Curata va fi facilitatorul acestui proces de unificare. Nu il facem pe Facebook, ca nu 
					vrem sa expunem pe nimeni la riscuri. Rolul moderarii noastre este sa ocroteasca acest proces de 
					asociere. Odata ce se formeaza grupuri sau propuneri, totul va fi la vedere. Al doilea rol este 
					oferirea unui teren neutru si a unor lideri din societatea civila care sa serveasca drept facilitatorii 
					acestui proces. Lista lor este deschisa. Folosind&nbsp;aplicatia si grupurile de lucru de mai jos ne puteti 
					informa despre competentele dvs administrative, stiintitifice, creative, de comunicare.&nbsp;</p>

					<p>Daca aveti mesaje personale de adresat oricarui colaborator al Romaniei Curate o puteti face scriind pe adresa <?= safe_mailto('vreausieu@romaniacurata.ro', 'vreausieu@romaniacurata.ro') ?></p>
				</div>

 
<h3 id="selectTitle" class="bg-primary">Selectează unul din grupurile de lucru:</h3>
 
<ul class="nav nav-tabs">

<?php

// pax create tabs 
$projId = '';
foreach ($proiecte as $proiect) {
	$projId = preg_replace('/\s+/', '', $proiect->proiect_nume);

	// remove `Grupuldelucrupentru`
	if (strlen($projId) >= 25) { 
		$projId = substr($projId, 19); 
		$projId='grup_'.$projId;} 

	// make shorter proj names
	$projName = str_replace('Grupul de lucru pentru ', '', $proiect->proiect_nume); 
	$projName = ucfirst($projName);

	echo '<li><a data-toggle="tab" href="#'.$projId.'">'.$projName.'</a></li>';

	} ?>

</ul>

<div class="tab-content">
		<?php 
		$projId = '';
		foreach ($proiecte as $proiect) {
		$projId = preg_replace('/\s+/', '', $proiect->proiect_nume);

		// remove `Grupuldelucrupentru`
		if (strlen($projId) >= 25) { 
			$projId = substr($projId, 19); 
			$projId='grup_'.$projId;} 
		 ?>
		<div class="tab-pane" id="<?=$projId?>">
				<img src="<?= base_url().'upload/img/'.$proiect->pic ?>" class="img img-responsive" alt="project_name">
				<h2><?= $proiect->proiect_nume ?></h2>
				<p><?= $proiect->descriere ?></p>
				<table class="table">
					<thead>
						<tr>
							<th>Rol</th>
							<th>Activitati</th>
							<th>Necesar de timp</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="roluri">	
						<?php 
							$where = "WHERE fk_proiect_id = $proiect->pk_proiect_id";
							$roluri = $this->roluri_model->getAll($where);
							foreach ($roluri  as $rol) { ?>					
						<tr data-toggle="modal" data-rol-id="<?= $rol->pk_rol_id ?>" data-target="#myModal">
							<td><?= $rol->rol_nume ?></td>
							<td><?= $rol->sarcini ?></td>
							<td><?= $rol->timp ?></td>
							<td><a class="btn btn-primary" role="button">Selectează</a></td>
						</tr>	
						<?php } ?>
					</tbody>
				</table>
		</div> <!-- end project	 -->
		<?php } ?> <!-- end foreach -->
	</div></div>
		</div><!-- end of main panel -->

				<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Inscrie-te voluntar!</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>frontend/inscriere" method="POST">
		        <div class="modal-body">
				  <div class="form-group has-success">				    
				    <div class="col-sm-12">
				    	<input required="true" type="text" class="form-control" name="nume" placeholder="Nume/Prenume">
				   	</div>
				   </div>
				   <div class="form-group has-success">				    
				    <div class="col-sm-12">
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
				    </div>
				    <div class="form-group has-success">				    
				    	<div class="col-sm-12">
				      	<input  required="true" type="email" class="form-control" name="email" placeholder="Email">
				    	</div>
				    </div>
				    <div class="form-group has-success">				    
				    	<div class="col-sm-12">  	
				      	<input  required="true" type="number" class="form-control" name="telefon" placeholder="Telefon">
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="number" class="form-control" name="varsta" placeholder="Varsta">
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="text" class="form-control" name="expertiza" placeholder="In ce domeniu ne poti ajuta">
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="text" class="form-control" name="timp" placeholder="Cat timp poti aloca (saptamanal/zilnic)">
				    	</div>
				    </div>	
				    <input type="hidden" name="rolId">			  
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Renunta</button>
		        <button type="submit" value="submit" name="submit" class="btn btn-primary">Trimite formularul</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div><!-- Modal -->
		


<?php require 'footer.php' ?>