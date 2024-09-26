<?PHP
	include "Dashbord/Controller/postC.php";

	$postC=new postC();
	
	if (isset($_POST["id"])){
		$postC->supprimerPost($_POST["id"]);
		header ('Location:../forum/adminpost.php');
	}
?>