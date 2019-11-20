<?php //session_start();
include "models/annonce_vetement.class.php";

//initialisation des parametres
$id_an = "";
$nom_an = "";
$prix_an = "";
$description_an = "";
$date_pub_an = "";
$couleur_an = "";
$region_an = "";
$taille_vet_an = "";

//recupétation des variables externes
if (isset($_REQUEST['id_an']))
	$id_an = $_REQUEST['id_an'];

if (isset($_POST['nom_an']))
	$nom_an = $_POST['nom_an'];

if (isset($_POST['prix_an']))
	$prix_an = $_POST['prix_an'];

if (isset($_REQUEST['description_an']))
	$description_an = $_REQUEST['description_an'];

if (isset($_REQUEST['date_pub_an']))
	$date_pub_an = $_REQUEST['date_pub_an'];

if (isset($_REQUEST['couleur_an']))
	$couleur_an = $_REQUEST['couleur_an'];

if (isset($_REQUEST['region_an']))
	$region_an = $_REQUEST['region_an'];

if (isset($_REQUEST['taille_vet_an']))
	$taille_vet_an = $_REQUEST['taille_vet_an'];
//creation de l'objet
$abn = new abonnee($id_an, $nom_an, $prix_an, $description_an, $date_pub_an, $couleur_an, $region_an, $taille_vet_an);


switch ($action) {
	case "add1":
		include "vue/vetement/annonce_vetement.php";
		break;

}
