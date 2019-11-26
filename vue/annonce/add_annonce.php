
<h1>Ajouter annonce </h1>



  


<form id="ff" method="post" action="index.php?controller=annonce&action=add" enctype="multipart/form-data">
	<br>Nom annonce: <input type="text" name="titre_an" required>
	<br> Prix annonce:<input type="text" name="prix_an" required>
	<br> Description:<TEXTAREA name="description_an" rows=4 cols=40>Valeur par défaut</TEXTAREA>
	<br> Date :<input type="date" name="date_pub_an" required>
	<br> Couleur :<input type="text" name="couleur_an" required>
	<br> Region :
    <select name="region_an">
        <option value ="none">Nothing</option>
        <option value ="guava">Guava</option>
        <option value ="lychee">Lychee</option>
        <option value ="papaya">Papaya</option>
	</select> 
	
	<br> Marque :
    <select name="id_marque">
	<?php 
	$mar=new marque("","");
	$lis=$mar->liste($cnx);
	foreach($lis as $mar){
		echo"<option value =".$mar->id.">".$mar->nom_marq."</option>";
	}
		?>
		
	</select> 
	<br> categorie :
	
    <select name="id_categorie">
	<?php 
	$cat=new categorie("","");
	$lis=$cat->liste($cnx);
	foreach($lis as $cat){
		echo"<option value =".$cat->id.">".$cat->nom_cat."</option>";
	}
		?>
			
    </select> 
	<br> Pointure :<input type="text" name="taille" required>
	<br> Taille :
    <select name="taille">
        <option value ="S">S</option>
        <option value ="XS">XS</option>
        <option value ="M">M</option>
		<option value ="L">L</option>
		<option value ="XL">XL</option>
        <option value ="XXL">XXL</option>
		<option value ="XXXL">XXXL</option>
		<option value="autre">autre</option>
       
	</select> 
	<br>photo : <input id="image" type="file" name="photos[]" multiple="multiple" onchange="readURL(this);">
	
	<div class="gallery" width="180"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    function readURL(input) {

		if ($('#image')[0].files.length > 10) 
		{
			alert('choisir maximume 10 images');
			
			0
		} 
	
}           

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
		if(filesAmount>10)
			filesAmount=10;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="300">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#image').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});		
      
</script>











	<br> <input type="submit" name="submit" value="ajouter">	

	
</form>

