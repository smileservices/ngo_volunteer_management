<?php require 'header.php'; ?>
		<div class="container">
			<h1 class="text-center">Interfata Administrare</h1>
			<p class="lead text-center">Managementul Proiectelor si Voluntarilor</p>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					<button data-toggle="modal" data-target="#new_proiect" class="btn btn-raised btn-primary"><span class="glyphicon glyphicon-plus"> </span> Proiect Nou</button>
					Proiectele Active:
				</h2>
			</div>
		</div>

		<?php foreach ($proiecte as $proiect) { 
			if ($proiect->activ==1) { ?>

		<div class="container panel panel-default">
			<div class="panel-heading">
				<h2><a href="#" data-toggle="modal" data-target="#edit_proiect" data-proiect-id="<?= $proiect->pk_proiect_id ?>" data-proiect-nume="<?= $proiect->proiect_nume ?>" data-proiect-pic="<?= $proiect->pic ?>" data-proiect-activ="<?= $proiect->activ ?>" data-proiect-descriere="<?= $proiect->descriere ?>"><?= $proiect->proiect_nume ?>	</a>
					<button class="btn btn-raised btn-default" data-toggle="modal" data-proiect-id="<?= $proiect->pk_proiect_id ?>" data-target="#create_rol"><span class="glyphicon glyphicon-tasks"> </span> Adauga Rol</button>
					<a class="btn btn-raised btn-default" href="<?= base_url() ?>backend/voluntari/<?= $proiect->pk_proiect_id ?>"><span class="glyphicon glyphicon-user"> </span> Vezi Voluntarii</a>	
				</h2> 
			</div>
			<div class="panel-body">			
			<div class="col-md-2">
				<a href="#" data-toggle="modal" data-target="#edit_pic" data-proiect-id="<?= $proiect->pk_proiect_id ?>" data-proiect-pic="<?= $proiect->pic ?>">
				<img src="<?= base_url().'upload/img/'.$proiect->pic ?>" class="img img-responsive" alt="project_name"></a>
			</div>
			<div class="col-md-10">
				
				
				
				<div class="row spacer_25">
					
				</div>
				<p><?= $proiect->descriere ?></p>
			</div>
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Rol</th>
							<th>Sarcini</th>
							<th>Necesar de timp</th>
							<th>Nr. Voluntari</th>
						</tr>
					</thead>
					<tbody class="roluri">	
						<?php 
							$where = "WHERE fk_proiect_id = $proiect->pk_proiect_id";
							$roluri = $this->roluri_model->getAll($where);
							if ($roluri) {
							foreach ($roluri  as $rol) { 

								?>					
						<tr data-toggle="modal" data-rol-id="<?= $rol->pk_rol_id ?>" data-rol-nume="<?= $rol->rol_nume ?>" data-rol-sarcini="<?= $rol->sarcini ?>" data-rol-timp="<?= $rol->timp ?>" data-target="#edit_rol">
							<td><?= $rol->rol_nume ?></td>
							<td><?= $rol->sarcini ?></td>
							<td><?= $rol->timp ?></td>
							<td><?= $this->voluntari_model->numara_voluntari($rol->pk_rol_id) ?></td>
						</tr>	

						<?php } } ?>										
					</tbody>
				</table>
			</div>
			</div>
		</div> <!-- end project	 -->
		<div class="row spacer_50">
		
		</div> <!-- end spacer -->

		<?php }} ?> <!-- end foreach -->

		<div class="row">
			<div class="col-md-12">
				<h2>Voluntari cu Sarcini</h2>
			</div>
		</div>
		<div class="row spacer_50">

		</div>
		<div class="row">
			<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nume</th>
					<th>Judet</th>
					<th>Varsta</th>
					<th>Expertiza</th>
					<th>Timp</th>
					<th>Mail</th>
					<th>Telefon</th>
					<th>Proiect</th>
					<th>Rol</th>
					<th>Validat</th>

				</tr>
			</thead>
			<tbody class="roluri">
				<?php 
					if ($voluntari) {
					foreach ($voluntari as $voluntar): ?>
					<tr>
						<td><a href="#" data-toggle="modal" data-target="#edit_voluntar" data-voluntar-nume="<?= $voluntar->nume ?>"
					data-voluntar-judet="<?= $voluntar->judet ?>"
					data-voluntar-varsta="<?= $voluntar->varsta ?>"
					data-voluntar-expertiza="<?= $voluntar->expertiza ?>"
					data-voluntar-timp="<?= $voluntar->timp ?>"
					data-voluntar-email="<?= $voluntar->email ?>"
					data-voluntar-telefon="<?= $voluntar->telefon ?>"
					data-voluntar-id="<?= $voluntar->pk_voluntar_id ?>"> <?= $voluntar->nume ?></a></td>
						<td><?= $voluntar->judet ?></td>
						<td><?= $voluntar->varsta ?></td>
						<td><?= $voluntar->expertiza ?></td>
						<td><?= $voluntar->timp ?></td>
						<td><?= $voluntar->email ?></td>
						<td><?= $voluntar->telefon ?></td>
						<td><?= $voluntar->proiect_nume ?></td>
						<td><?= $voluntar->rol_nume ?></td>
						<td><?php switch ($voluntar->validat) {
							case '1':
								echo 'Acceptat';
								break;
							case '0':
								echo 'Respins';
								break;
							default:
								echo ' ';
								break;
						}  ?></td>
						<td><a href="#" data-toggle="modal" data-target="#edit_rol_voluntar" data-match-rol-id="<?= $voluntar->pk_rol_id ?>" data-match-id="<?= $voluntar->pk_match_id ?>" data-validat="<?= $voluntar->validat ?>"><span class="glyphicon glyphicon-cog"></span></a></td>
						
					</tr>
				<?php endforeach; }?>
			</tbody>
		</table>
	   </div>
	</div>

	<div class="row">
			<div class="col-md-12">
				<h2>Voluntari fara sarcini</h2>
			</div>
		</div>
		<div class="row spacer_50">

		</div>
		<div class="row">
			<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nume</th>
					<th>Judet</th>
					<th>Varsta</th>
					<th>Expertiza</th>
					<th>Timp</th>
					<th>Mail</th>
					<th>Telefon</th>
					<th>Adauga Sarcini</th>
				</tr>
			</thead>
			<tbody class="roluri">
				<?php 
					if ($voluntari_fara_rol) {
					foreach ($voluntari_fara_rol as $voluntar): ?>
					<tr>
						<td><a href="#" data-toggle="modal" data-target="#edit_voluntar" data-voluntar-nume="<?= $voluntar->nume ?>"
					data-voluntar-judet="<?= $voluntar->judet ?>"
					data-voluntar-varsta="<?= $voluntar->varsta ?>"
					data-voluntar-expertiza="<?= $voluntar->expertiza ?>"
					data-voluntar-timp="<?= $voluntar->timp ?>"
					data-voluntar-email="<?= $voluntar->email ?>"
					data-voluntar-telefon="<?= $voluntar->telefon ?>"
					data-voluntar-id="<?= $voluntar->pk_voluntar_id ?>"> <?= $voluntar->nume ?></a></td>
						<td><?= $voluntar->judet ?></td>
						<td><?= $voluntar->varsta ?></td>
						<td><?= $voluntar->expertiza ?></td>
						<td><?= $voluntar->timp ?></td>
						<td><?= $voluntar->email ?></td>
						<td><?= $voluntar->telefon ?></td>
						<td class="text-center"><a href="#" data-toggle="modal" data-target="#adauga_rol_voluntar" data-voluntar-id="<?= $voluntar->pk_voluntar_id ?>"><span class="glyphicon glyphicon-plus"></span></a></td>
						
					</tr>
				<?php endforeach; }?>
			</tbody>
		</table>
	   </div>
	</div>

	<div class="row spacer_50">			
	</div>

	<a role="button" data-toggle="collapse" href="#proiecteInactive" aria-expanded="false" aria-controls="proiecteInactive" class="btn btn-raised btn-default btn-block">
		<h2 class="text-center">Proiectele Inactive:</h2>
	</a>

	<div class="collapse" id="proiecteInactive">
			<?php foreach ($proiecte as $proiect) { 
			if ($proiect->activ==0) { ?>
		<div class="row spacer_25">
		
		</div> <!-- end spacer -->
		<div class="col-md-12 panel panel-default">
			<div class="panel-heading">
				<h2><a href="#" data-toggle="modal" data-target="#edit_proiect" data-proiect-id="<?= $proiect->pk_proiect_id ?>" data-proiect-nume="<?= $proiect->proiect_nume ?>" data-proiect-pic="<?= $proiect->pic ?>" data-proiect-activ="<?= $proiect->activ ?>" data-proiect-descriere="<?= $proiect->descriere ?>"><?= $proiect->proiect_nume ?>	</a>
					<button class="btn btn-raised btn-default" data-toggle="modal" data-proiect-id="<?= $proiect->pk_proiect_id ?>" data-target="#create_rol"><span class="glyphicon glyphicon-tasks"> </span> Adauga Rol</button>
					<a class="btn btn-raised btn-default" href="<?= base_url() ?>backend/voluntari/<?= $proiect->pk_proiect_id ?>"><span class="glyphicon glyphicon-user"> </span> Vezi Voluntarii</a>	
				</h2> 
			</div>
			<div class="panel-body">			
			<div class="col-md-2">
				<a href="#" data-toggle="modal" data-target="#edit_pic" data-proiect-id="<?= $proiect->pk_proiect_id ?>" data-proiect-pic="<?= $proiect->pic ?>">
				<img src="<?= base_url().'upload/img/'.$proiect->pic ?>" class="img img-responsive" alt="project_name"></a>
			</div>
			<div class="col-md-10">
				
				
				
				<div class="row spacer_25">
					
				</div>
				<p><?= $proiect->descriere ?></p>
			</div>
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Rol</th>
							<th>Sarcini</th>
							<th>Necesar de timp</th>
							<th>Nr. Voluntari</th>
						</tr>
					</thead>
					<tbody class="roluri">	
						<?php 
							$where = "WHERE fk_proiect_id = $proiect->pk_proiect_id";
							$roluri = $this->roluri_model->getAll($where);
							if ($roluri) {
							foreach ($roluri  as $rol) { 

								?>					
						<tr data-toggle="modal" data-rol-id="<?= $rol->pk_rol_id ?>" data-rol-nume="<?= $rol->rol_nume ?>" data-rol-sarcini="<?= $rol->sarcini ?>" data-rol-timp="<?= $rol->timp ?>" data-target="#edit_rol">
							<td><?= $rol->rol_nume ?></td>
							<td><?= $rol->sarcini ?></td>
							<td><?= $rol->timp ?></td>
							<td><?= $this->voluntari_model->numara_voluntari($rol->pk_rol_id) ?></td>
						</tr>	

						<?php } } ?>										
					</tbody>
				</table>
			</div>
			</div>
		</div> <!-- end project	 -->

		<?php }} ?> <!-- end foreach -->
	</div>
	<div class="row spacer_50">			
	</div>

<!-- Modal MODAL Adaugare Rol Voluntar -->		
		<div class="modal fade" id="adauga_rol_voluntar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Adauga Sarcina</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/assign_match" method="POST">
		        <div class="modal-body">
				  <div class="form-group">	
				  	<label for="validat" class="col-sm-2 control-label">Validare</label>			    
				    <div class="col-sm-10">
				    	<select name="validat" class="form-control">
				    		<option value="NULL">Alege Validare</option>
				    		<option value="0">Respins</option>
				    		<option value="1">Acceptat</option>
				    	</select>
				   	</div>
				   </div>	

				   <div class="form-group">	
				  	<label for="rol_id" class="col-sm-2 control-label">Rol</label>			    
				    <div class="col-sm-10">
				    	<select name="rol_id" class="form-control">
				    		<?php foreach ($all_roluri as $rol): ?>
				    			<option value="<?php echo $rol->pk_rol_id ?>"><?php echo $rol->proiect_nume." - ".$rol->rol_nume ?></option>
				    		<?php endforeach ?>
				    	</select>
				   	</div>
				   </div>			   
				   				   
				   <input type="hidden" name="voluntar_id" value="">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>
		        <button type="submit" value="assign" name="submit" class="btn btn-raised btn-primary">Adauga</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<!-- MODAL Adaugare Rol Voluntar END -->

	<!-- Modal MODAL Editare Rol Voluntar -->		
		<div class="modal fade" id="edit_rol_voluntar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Editeaza Rol Voluntar</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/update_match" method="POST">
		        <div class="modal-body">
				  <div class="form-group">	
				  	<label for="validat" class="col-sm-2 control-label">Validare</label>			    
				    <div class="col-sm-10">
				    	<select name="validat" class="form-control">
				    		<option value="0">Respins</option>
				    		<option value="1">Acceptat</option>
				    	</select>
				   	</div>
				   </div>	

				   <div class="form-group">	
				  	<label for="match_rol_id" class="col-sm-2 control-label">Rol</label>			    
				    <div class="col-sm-10">
				    	<select name="match_rol_id" class="form-control">
				    		<?php foreach ($all_roluri as $rol): ?>
				    			<option value="<?php echo $rol->pk_rol_id ?>"><?php echo $rol->proiect_nume." - ".$rol->rol_nume ?></option>
				    		<?php endforeach ?>
				    	</select>
				   	</div>
				   </div>			   
				   				   
				   <input type="hidden" name="match-id" value="">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>
		        <button type="submit" value="edit" name="submit" class="btn btn-raised btn-primary">Modifica</button>
		        <button type="submit" value="delete" name="submit" class="btn btn-raised btn-danger">Sterge</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<!-- MODAL Editare Rol Voluntar END -->

	<!-- Modal Creare Rol -->		
		<div class="modal fade" id="create_rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Rol Nou</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/create_rol" method="POST">
		        <div class="modal-body">
				  <div class="form-group">	
				  	<label for="rolNume" class="col-sm-2 control-label">Nume Rol</label>			    
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="rolNume" value="">
				   	</div>
				   </div>

				   <div class="form-group">
				   <label for="rolSarcini" class="col-sm-2 control-label">Sarcini</label>					    
				    <div class="col-sm-10">
				    	<textarea class="form-control" name="rolSarcini" value=""></textarea>
				   	</div>
				   </div>

				   <div class="form-group">
				   <label for="rolTimp" class="col-sm-2 control-label">Timp</label>					    
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="rolTimp" value="">
				   	</div>
				   </div>				   
				    <input type="hidden" name="proiectId" value="">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>
		        <button type="submit" value="submit" name="submit" class="btn btn-raised btn-primary">Rol nou</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<!-- MODAL Creare Rol -->

		<!-- Modal Creare Proiect -->		
		<div class="modal fade" id="new_proiect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Proiect Nou</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/new_proiect" enctype="multipart/form-data" method="POST">
		        <div class="modal-body">
				  <div class="form-group">	
				  	<label for="proiectNume" class="col-sm-2 control-label">Nume Proiect</label>			    
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="proiectNume" value="">
				   	</div>
				   </div>

				   <div class="form-group">	
				  	<label for="proiectActiv" class="col-sm-2 control-label">Status</label>			    
				    <div class="col-sm-10">
				    	<select name="proiectActiv">
				    		<option value="1">Activ</option>
				    		<option value="0">Inactiv</option>
				    	</select>
				   	</div>
				   </div>					   

				   <div class="form-group">
				   <label for="proiectDescriere" class="col-sm-2 control-label">Descriere</label>					    
				    <div class="col-sm-10">
				    	<textarea rows="8" class="form-control" name="proiectDescriere" value=""></textarea>
				   	</div>
				   </div>

				   	<div class="form-group is-fileinput">	
						<label for="proiectPic" class="col-sm-2 control-label">Adauga</label>	
						<div class="col-md-10">					   
							<input type="file" id="inputFile4" name="pic">			
							<div class="input-group">
			                <input type="text" readonly="" class="form-control" placeholder="Ataseaza foto...">
			                <span class="input-group-btn input-group-sm">
			                  <button type="button" class="btn btn-fab btn-fab-mini">
			                    <i class="mdi-editor-attach-file"></i>
			                  </button>
			                </span>
			              </div>		
						</div>						   			   
					</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>		        
		        <button type="submit" value="new" name="submit" class="btn btn-raised btn-primary">Proiect Nou</button>		        
		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<!-- Modal Creare Proiect END -->
		<!-- Modal Editare Proiect -->		
		<div class="modal fade" id="edit_proiect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Editeaza Proiect</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/edit_proiect" method="POST">
		        <div class="modal-body">
				  <div class="form-group">	
				  	<label for="proiectNume" class="col-sm-2 control-label">Nume Proiect</label>			    
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="proiectNume" value="">
				   	</div>
				   </div>

				   <div class="form-group">	
				  	<label for="proiectActiv" class="col-sm-2 control-label">Status</label>			    
				    <div class="col-sm-10">
				    	<select name="proiectActiv">
				    		<option value="1">Activ</option>
				    		<option value="0">Inactiv</option>
				    	</select>
				   	</div>
				   </div>					   

				   <div class="form-group">
				   <label for="proiectDescriere" class="col-sm-2 control-label">Descriere</label>					    
				    <div class="col-sm-10">
				    	<textarea rows="8" class="form-control" name="proiectDescriere" value=""></textarea>
				   	</div>
				   </div>

				   <input type="hidden" name="proiectId">
				   <input type="hidden" name="proiectPic">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>		        
		        <button type="submit" value="edit" name="submit" class="btn btn-raised btn-primary">Modifica</button>
		        <button type="submit" value="delete" name="submit" class="btn btn-raised btn-danger">Sterge</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<!-- Modal Editare Proiect END -->

		<!-- Modal Editare Pic -->
		<div class="modal fade" id="edit_pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Editeaza Poza</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/edit_pic" enctype="multipart/form-data" method="POST">
		        <div class="modal-body">
				<div class="form-group">	
					<label for="proiectPic" class="col-sm-2 control-label">Poza</label>	
					<div class="col-md-10">					   
						<img src="" name="proiectPic" class="img img-responsive" alt="">						
					</div>						   			   
				</div>
				<div class="form-group">	
					<label for="proiectPic" class="col-sm-2 control-label">Poza Noua</label>	
					<div class="col-md-10">					   
						<input type="file" name="pic">
						<div class="input-group">
			                <input type="text" readonly="" class="form-control" placeholder="Ataseaza foto...">
			                <span class="input-group-btn input-group-sm">
			                  <button type="button" class="btn btn-fab btn-fab-mini">
			                    <i class="mdi-editor-attach-file"></i>
			                  </button>
			                </span>
			              </div>					
					</div>						   			   
				</div>
				   <input type="hidden" name="proiectId">
				   <input type="hidden" name="proiectPic">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>		        
		        <button type="submit" value="upload" name="submit" class="btn btn-raised btn-primary">Modifica</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>				
		<!-- Modal Editare Foto END-->

		<!-- Modal Editare Rol -->
		
		<div class="modal fade" id="edit_rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Editeaza Rol</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/edit_rol" method="POST">
		        <div class="modal-body">
				  <div class="form-group">	
				  	<label for="rolNume" class="col-sm-2 control-label">Nume Rol</label>			    
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="rolNume" value="">
				   	</div>
				   </div>

				   <div class="form-group">
				   <label for="rolSarcini" class="col-sm-2 control-label">Sarcini</label>					    
				    <div class="col-sm-10">
				    	<textarea class="form-control" name="rolSarcini" value=""></textarea>
				   	</div>
				   </div>

				   <div class="form-group">
				   <label for="rolTimp" class="col-sm-2 control-label">Timp</label>					    
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="rolTimp" value="">
				   	</div>
				   </div>
				   
				    <input type="hidden" name="rolId">			  
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>		        
		        <button type="submit" value="edit" name="submit" class="btn btn-raised btn-primary">Modifica</button>
		        <button type="submit" value="delete" name="submit" class="btn btn-raised btn-danger">Sterge</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<!-- Modal Editare Rol END -->
		
		<!-- Modal Editare Voluntar-->
		<div class="modal container fade" id="edit_voluntar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Editeaza Voluntar</h4>
		      </div>
		      
		        <form class="form-horizontal" action="<?= base_url() ?>backend/update_voluntari" method="POST">
		        <div class="modal-body">
				  <div class="form-group">				    
				    <div class="col-sm-12">
				    	<input type="text" class="form-control" name="voluntarNume">
				   	</div>
				   </div>
				   <div class="form-group">				    
				    <div class="col-sm-12">
				    	<select class="form-control" name="voluntarJudet">
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
				    <div class="form-group">				    
				    	<div class="col-sm-12">
				      	<input type="email" class="form-control" name="voluntarEmail" >
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="number" class="form-control" name="voluntarTelefon" >
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="number" class="form-control" name="voluntarVarsta" >
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="text" class="form-control" name="voluntarExpertiza">
				    	</div>
				    </div>
				    <div class="form-group">				    
				    	<div class="col-sm-12">  	
				      	<input type="text" class="form-control" name="voluntarTimp">
				    	</div>
				    </div>	
				    <input type="hidden" name="voluntarId">			  
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Renunta</button>		        
		        <button type="submit" value="edit" name="submit" class="btn btn-raised btn-primary">Modifica</button>
		        <button type="submit" value="delete" name="submit" class="btn btn-raised btn-danger">Sterge</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div><!-- Modal Voluntar -->

<?php require 'footer.php'; ?>