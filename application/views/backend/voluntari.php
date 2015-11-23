<?php require 'header.php'; ?>

		<div class="row">
			<h1 class="text-center">Voluntari pentru "<?php echo $proiect->proiect_nume ?>" </h1>
		</div>
		<div class="row spacer_100">
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php foreach ($roluri as $rol) : ?>
					<h3><?php echo $rol->rol_nume ?></h3>
					<table class="table table-striped">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nume</th>
									<th>Judet</th>
									<th>Varsta</th>
									<th>Expertiza</th>
									<th>Timp</th>
									<th>Rating</th>
									<th>Validat</th>
									<th>Mail</th>
									<th>Telefon</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$where = "as m 
									JOIN voluntari AS v
									ON m.fk_voluntar_id = v.pk_voluntar_id
									WHERE m.fk_rol_id = $rol->pk_rol_id";
									$voluntari = $this->voluntari_model->getAll($where, 'roluri_voluntari'); 
									if ($voluntari) {
									foreach ($voluntari as $voluntar): ?>
									<tr>
										<td><?= $voluntar->nume ?></td>
										<td><?= $voluntar->judet ?></td>
										<td><?= $voluntar->varsta ?></td>
										<td><?= $voluntar->expertiza ?></td>
										<td><?= $voluntar->timp ?></td>
										<td> </td>
										<td><?= $voluntar->validat ?></td>
										<td><?= $voluntar->email ?></td>
										<td><?= $voluntar->telefon ?></td>
									</tr>
								<?php endforeach; }?>
							</tbody>
					</table>
				<?php endforeach ?>
			</div>
		</div>

<?php require 'footer.php'; ?>