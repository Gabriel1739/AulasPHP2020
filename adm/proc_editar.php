<?php
session_start();
include_once("db.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE contatos SET nome='$nome', email='$email',assunto='$assunto', data=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Contato editado com sucesso!</p>";
	header("Location: listar.php?id=");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Contato não foi editado com sucesso!</p>";
	header("Location: editar.php?id=$id");
}
