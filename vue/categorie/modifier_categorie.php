<h1>Modifier categorie</h1>
<form method="post" action="index.php?controleur=categorie&action=edit" enctype="multipart/form-data">

<br>nom categorie : <input type="text" name="nom_cat" value="<?php echo $categorie->nom_cat;?>" required>

<input type="hidden" name="id" value="<?php echo $categorie->id_cat;?>">

<br><input type="submit" name="submit" value="Modifier">

</form>