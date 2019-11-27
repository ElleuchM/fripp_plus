<?php //session_start();
include "includes/fonction.class.php";
include "models/annonce.class.php";
include "models/photo.class.php";
include "models/categorie.class.php";
include "models/marque.class.php";


//initialisation des parametres 
$id_an="";
$titre_an="";
$prix_an="";
$description_an="";
$date_pub_an="";
$couleur_an="";
$region_an="";
$taille="";
$id_marque="";
$id_categorie="";
if(isset($_POST['status']))
$status=$_POST['status'];
else $status='non acceptée';


$photos=array();

$rech_region="";
$rech_nom="";
$rech_marque="";
$fn=new fonction();

//recupétation des variables externes

if (isset($_REQUEST['id_an']))
	$id_an = $_REQUEST['id_an'];

if (isset($_POST['titre_an']))
	$titre_an = $_POST['titre_an'];

if (isset($_POST['prix_an']))
	$prix_an = $_POST['prix_an'];

if (isset($_POST['description_an']))
	$description_an = $_POST['description_an'];

if (isset($_POST['date_pub_an']))
	$date_pub_an = $_POST['date_pub_an'];

if (isset($_POST['couleur_an']))
	$couleur_an = $_POST['couleur_an'];

if (isset($_POST['region_an']))
$region_an = $_POST['region_an'];
    
if (isset($_POST['taille']))
$taille = $_POST['taille'];

if (isset($_POST['id_marque']))
	$id_marque = $_POST['id_marque'];

if (isset($_POST['id_categorie']))
	$id_categorie = $_POST['id_categorie'];



//************************************************************************************************************************* */

	if (isset($_POST['rech_region']))
	$rech_region = $_POST['rech_region'];

	if (isset($_POST['rech_categorie']))
	$rech_categorie = $_POST['rech_categorie'];

	if (isset($_POST['rech_marque']))
	$rech_marque = $_POST['rech_marque'];


	if(isset($_REQUEST['photo_old']))
	$photos=$_REQUEST['photo_old'];
	
if(isset($_FILES['photos']))
{
	$dossier = 'photos/';
    $taille_maxi = 10000000;    
    $extensions = array('.jpg', '.jpeg','.png','.gif');
	$fichier_temp = $_FILES['photos']['tmp_name'];
	
    $nbfichiersEnvoyes = count($fichier_temp);
	 if($nbfichiersEnvoyes>10)
	 $nbfichiersEnvoyes=10;
    for($i=0; $i<$nbfichiersEnvoyes; $i++) {
		$fichier= basename($_FILES['photos']['name'][$i]);
		//array_push($netflix, 'Shaft', 'Mute', 'Clinical', 'Blue Jay', 'Candy Jar');
		$fichier_temp= $_FILES['photos']['tmp_name'][$i];
		
		$taille= filesize($_FILES['photos']['tmp_name'][$i]);
	
        $extension= strrchr($_FILES['photos']['name'][$i], '.');
	
        if(!in_array($extension, $extensions)) $erreur= '<span class="non">Vous devez uploader le fichier'.$i.' de type JPEG ou JPG</span>';
        if($taille>$taille_maxi)  $erreur= 'Le fichier'.$i.' est trop gros...';
        if(!isset($erreur))
        {
			$nom_photo=$fn->generer_chaine(8);
	$fichier=$nom_photo.$extension;
	array_push($photos, $fichier);
			 if(move_uploaded_file($fichier_temp, $dossier. $fichier)) 
			 {
			  echo'<span class="okdac">Upload'.$i.' effectué avec succès !</span>';
			 }
			 else 
			 {
			 echo'<span class="non">Echec de l\'upload'.$i.' !</span>';
			 }      
        }
		
	}


	


}

//************************************************************************************************************************* */
//creation de l'objet
$ann = new annonce($id_an,$titre_an,$prix_an,$description_an,$date_pub_an,$couleur_an,$region_an,$taille,$id_marque,$id_categorie,$_SESSION['id'],$photos,$status);




switch ($action) {
	case "add1":
		include "vue/annonce/add_annonce.php"; 
        break;

	case "add":
		
		$ann->add($cnx);

        break; 
    
    case "edit1":$annonce=$ann->detail($cnx);
    include "vue/annonce/update_annonce.php";
        break;
        
    case "edit":$ann->edit($cnx);
        break;
    
	case "supp":
		
		$ann->supp($cnx);
        break; 
         
	case "liste":		
		$annonces=$ann->liste($cnx,"");

	    include "vue/annonce/liste_annonce.php";
		break;
		case "listeN":		
			$annonces=$ann->liste($cnx,"where status like 'non acceptée'");
			include "vue/annonce/liste_annonce.php";
			break;
		case "stat":				
			$nb_oui=$ann->count($cnx,'acceptée'); 
			$nb_non=$ann->count($cnx,'non acceptée');
			foreach($nb_oui as $oui){
			}
			foreach($nb_non as $non){
			}

			include "vue/admin/statistique.php";

			break;
	

	

}
