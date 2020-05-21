<?php
session_start();
include_once("db.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM contatos WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Contatos</title>		
	</head>
	<body>
		<a href="listar.php">Lista de Mensagens</a><br>
		<h1>Editar Contatos</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_editar.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite seu e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>

			<label>Assunto: </label>
			<input type="text" name="assunto" placeholder="Digite o assunto" value="<?php echo $row_usuario['assunto']; ?>"><br><br>

			<input type="submit" value="Editar">
		</form>
	</body>
</html>