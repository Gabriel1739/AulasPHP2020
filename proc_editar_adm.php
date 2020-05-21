<?php
session_start();
include_once("db.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE usuarios SET nome='$nome', senha='$senha' WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Adiministrador editado com sucesso!</p>";
	header("Location: listar_adm.php?id=");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Adiministrador não foi editado com sucesso!</p>";
	header("Location: editar_adm.php?id=$id");
}
