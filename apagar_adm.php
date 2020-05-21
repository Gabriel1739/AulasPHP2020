<?php
session_start();
include_once("db.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM usuarios WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Adiministrador apagado com sucesso!</p>";
		header("Location: listar_adm.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao apagar o adiministrador!</p>";
		header("Location: listar_adm.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um adiministrador!</p>";
	header("Location: listar_adm.php");
}
