<h1>Ajout Annonce Vetement</h1>
<form method="POST" action="annonce_vetement.controller.php?action=add" enctype="multipart/form-data">
	<br>Nom annonce: <input type="text" name="nom_an" required>
	<br> Prix annonce:<input type="text" name="prix_an" required>
	<br> Description:<TEXTAREA name="description_an" rows=4 cols=40>Valeur par défaut</TEXTAREA>
	<br> Date :<input type="date" name="date_pub_an" required>
	<br> Couleur :<input type="text" name="couleur_an" required>
	<br> Region :<input type="text" name="region_an" required>
	<br> Taille :<input type="text" name="taille_vet_an" required>
	<br> <input type="submit" name="submit" value="ajouter">	
</form>
