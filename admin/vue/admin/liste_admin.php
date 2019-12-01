<section class="content">
	<div class="container-fluid">
		<div class="row">
			<section class="col-lg-12 connectedSortable">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-user-plus"></i></i>
							Liste des admins
						</h3>
					</div>

					<!-- /.card-header -->
					<?php
					echo '<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>nom</th>
							<th>prenom</th>
							<th>email</th>
							<th>numero</th>
							<th>status</th>
							<th>role</th>
							<th>actions</th>
						</tr>
						</thead>
						<tbody>
						';
					foreach ($personnes as $personne) {

						echo "<tr>";
						echo "

									<td>" . $personne->nom_pers . "</td>
									<td>" . $personne->prenom_pers . "</td>
									<td>" . $personne->email_pers . "</td>
									<td>" . $personne->tel_pers . "</td>
									<td>" . $personne->status . "</td>
									<td>" . $personne->id_role . "</td>
									<td> <a href='dashboard.php?controller=personne&action=supp&id=" . $personne->id . "'>supp</a> 
									<a href='dashboard.php?controller=personne&action=edit1&id=" . $personne->id . "'>modif</a></td>




									
								";
						echo "</tr>";
					}
					echo "
						</tbody>
						<tfoot>
						<tr>

						<th>nom</th>
						<th>prenom</th>
						<th>email</th>
						<th>numero</th>
						<th>status</th>
						<th>role</th>
						<th>action</th>
						</tr>
						</tfoot>

						</table>";

					?>
				</div>
			</section>
			<!-- /.card-body -->
		</div>
	</div>
</section>
<!-- /.card -->