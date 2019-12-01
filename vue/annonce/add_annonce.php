
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

	
  <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css' />
  <link rel='stylesheet' href='https://unpkg.com/filepond/dist/filepond.min.css' />
  <style>.fileBox{ width: 80%;    margin-left: auto;    margin-right: auto;    margin-top: 40px;    background: #fbfbb8;    padding: 20px;    border: 3px solid black;}</style>

<div class="fileBox">
    
  
   
    <input type="file" class="filepond" name="filepond[]" multiple data-max-file-size="6MB" data-max-files="10" />
    
      
   
</div>
<script src='https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js'></script>
  <script src='https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js'></script>
  <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
  <script src='https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js'></script>
  <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
  <script src='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js'></script>
  <script src='https://unpkg.com/filepond/dist/filepond.min.js'></script>
<script>
  // register desired plugins...
  FilePond.registerPlugin(
// encodes the file as base64 data...
   FilePondPluginFileEncode,
// validates the size of the file...
   FilePondPluginFileValidateSize,
   
   // validates the file type...
   FilePondPluginFileValidateType,
// corrects mobile image orientation...
   FilePondPluginImageExifOrientation,
   
   // calculates & dds cropping info based on the input image dimensions and the set crop ratio
   FilePondPluginImageCrop,
   
   //  calculates & adds resize information
   FilePondPluginImageResize,
   
   // applies the image modifications supplied by the Image crop and Image resize plugins before the image is uploaded
   FilePondPluginImageTransform,
// previews dropped images...
   FilePondPluginImagePreview
);
// Select the file input and use create() to turn it into a pond
  FilePond.create( document.querySelector('.filepond'), { 
   
   allowMultiple: true,
   allowFileEncode: true,
   maxFiles:10,
   required: true,
   maxParallelUploads:10,
   instantUpload:false,
   acceptedFileTypes: ['image/*'],
   imageResizeTargetWidth: 50,
   //imageResizeMode: 'contain',
   imageCropAspectRatio: '1:1',
   imageTransformVariants: {
    
    'v3_200px': transforms => {
     transforms.resize.size.width = 900;
     return transforms;
    }
   },
   imageTransformOutputQuality: 100,
   imageTransformOutputMimeType: 'image/jpeg',
   
   onaddfile: (err, fileItem) => {
    console.log(err, fileItem.getMetadata('resize'));
   }
   
   
  });
  </script>

 

	<br> <input type="submit" name="submit" value="ajouter">	

	
</form>

