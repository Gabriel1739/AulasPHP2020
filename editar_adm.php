<?php
session_start();
include_once("db.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Adiministradores</title>		
	</head>
	<body>
		<a href="listar_adm.php">Listar Adiministradores</a><br>
		<h1>Editar Adiministradores</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_editar_adm.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome de usuário" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>Senha: </label>
			<input type="text" name="senha" placeholder="Digite a senha" value="<?php echo $row_usuario['senha']; ?>"><br><br>

			<input type="submit" value="Editar">
		</form>
	</body>
</html>