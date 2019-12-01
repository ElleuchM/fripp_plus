<section class="content">
	<div class="container-fluid">
		<div class="row">
			<section class="col-lg-12 connectedSortable">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-user-plus"></i></i>
							Liste des annonces
						</h3>
					</div>

					<!-- /.card-header -->
         
					<table id="example1" class="table table-bordered table-striped">
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
            <?php 
          foreach ($annonces as $annonce) {
          $mar = new marque($annonce->id_marque, "");
          $cat = new categorie($annonce->id_categorie, "");
          $marque = $mar->detail($cnx);
          $categ = $cat->detail($cnx);

						echo "<tr>";
						echo "

									<td>" . $annonce->titre_an . "</td>
									<td>" .  $annonce->region_an . "</td>
									<td>" . $annonce->region_an . "</td>
									<td>" . $annonce->region_an . "</td>
									<td>" .$annonce->region_an . "</td>
									<td>" . $annonce->region_an . "</td>
									<td> <a href='dashboard.php?controller=personne&action=supp&id=" . $annonce->titre_an . "'>supp</a> 
									<a href='dashboard.php?controller=personne&action=edit1&id=" . $annonce->titre_an . "'>modif</a></td>




									
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


        