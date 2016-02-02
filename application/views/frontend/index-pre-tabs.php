<?php require 'header.php'; ?>

		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Aici construim o alternativa politica</h2>
			</div>			
		</div>		
			<!-- <a href="<?= base_url() ?>backend/index"><p class="text-center">Backend</p></a> -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="text-center">Mesaj al Romaniei Curate: </h4>	
					</div>		
					<div class="panel-body">
					<p>Dragi prieteni din strada si din spatele ecranelor</p>	

					<p>Un sistem politic cu partide nereprezentative si corupte a esuat. Lumea nereprezentata a iesit in 
					strada. Si multa lume care nu a iesit se simte mai solidara cu protestatatarii decat cu partidele.
					Alternativa la ele nu este insa structurata. Societatea politica trebuie reconstruita ca sa fie mai 
					reprezentativa, de la baza in sus, fara a politiza integral societatea civila, dar cu implicarea ei. 
					Este treaba sefului statului sa rezolve criza politica, dar a noastra sa oferim pe termen lung acea 
					alternativa la clasa politica de care ne-am saturat.
					Invitam, ca atare, pe cei care vor sa puna umarul la acest efort dar nu stiu cu cine sa se asocieze 
					si ce sa faca sa se adune aici, prin intermediul aplicatiei noastre. Cine este interesat de o idee sau 
					alta sa selecteze optiunile adecvate prin aplicatie. Un moderator al Romaniei curate va lua 
					legatura cu voi toti pentru a stabili o intrevedere.</p>

					<p>Romania Curata va fi facilitatorul acestui proces de unificare. Nu il facem pe Facebook, ca nu 
					vrem sa expunem pe nimeni la riscuri. Rolul moderarii noastre este sa ocroteasca acest proces de 
					asociere. Odata ce se formeaza grupuri sau propuneri, totul va fi la vedere. Al doilea rol este 
					oferirea unui teren neutru si a unor lideri din societatea civila care sa serveasca drept facilitatorii 
					acestui proces. Lista lor este deschisa. Folosind aplicatia si grupurile de lucru de mai jos ne puteti 
					informa despre competentele dvs administrative, stiintitifice, creative, de comunicare. </p>

					<p>Daca aveti mesaje personale de adresat oricarui colaborator al Romaniei Curate o puteti face scriind pe adresa <?= safe_mailto('vreausieu@romaniacurata.ro', 'vreausieu@romaniacurata.ro') ?></p>
					</div>							
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Selecteaza una din alternativele de implicare</h2>
			</div>
		</div>

		<div class="row grid">
		<?php foreach ($proiecte as $proiect) { ?>

		<div class="col-md-6 grid-item">
			<div class="col-md-12 panel panel-standard">
			<img src="<?= base_url().'upload/img/'.$proiect->pic ?>" class="img img-responsive" alt="project_name">
			<div class="panel-body">
				<div class="col-md-12">
					<h2><?= $proiect->proiect_nume ?></h2>
					<p><?= $proiect->descriere ?></p>
				</div>
			</div>
			<a class="roluri-link" href="#rol_<?= $proiect->pk_proiect_id ?>" data-toggle="collapse" aria-expanded="false" aria-controls="rol_<?= $proiect->pk_proiect_id ?>"><i class="glyphicon glyphicon-collapse-down"> </i> Cu ce pot ajuta?</a>
			<div id="rol_<?= $proiect->pk_proiect_id ?>" class="collapse col-md-12 panel-footer">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Rol</th>
							<th>Activitati</th>
							<th>Necesar de timp</th>
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
						</tr>	

						<?php } ?>					
					</tbody>
				</table>
			</div>
			</div>			
		</div> <!-- end project	 -->
		<?php } ?> <!-- end foreach -->
		</div>

<?php require 'modal-inscriere.php' ?>	
<?php require 'footer.php' ?>