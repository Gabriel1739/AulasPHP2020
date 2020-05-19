<?php

session_start();
include_once("db.php");

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$assunto = filter_input(INPUT_POST, 'assunto');
$mensagem = filter_input(INPUT_POST, 'mensagem');

$dados_usuarios = "INSERT INTO contatos (nome, email, assunto, mensagem, data) VALUES ('$nome', '$email', '$assunto', '$mensagem', NOW())";
$msg_usuario = mysqli_query($conn, $dados_usuarios);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Mensagem enviada, aguarde que entraremos em contato!</p>";
	header("Location: index.php?pg=faleconosco");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Mensagem não enviada, tente novamente!</p>";
	header("Location: faleconosco.php");
}


?>