<?php
session_start();
include_once("db.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM contatos WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Mensagem apagada com sucesso!</p>";
		header("Location: listar.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao apagar a mensagem!</p>";
		header("Location: listar.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar a mensagem!</p>";
	header("Location: listar.php");
}
