<?PHP
	include "Dashbord/Controller/commentC.php";

	$commentC=new commentC();
	
	if (isset($_POST["id"])){
		$commentC->supprimerComment($_POST["id"]);
		header ('Location:../forum/tablecomment.php');
	}
?>