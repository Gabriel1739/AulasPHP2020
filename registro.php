<?php

session_start();
include("db.php");

	$error = "";

	if (isset($_POST['registrar'])) {
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		$csenha = $_POST['csenha'];

		$verifica = mysqli_query($conn,"SELECT * FROM usuarios WHERE nome = '$nome'");

		if (strlen($nome) < 4) {
			$error = "<h4 style='color:red'>Nome de usuário muito curto!</h4>";
		}else if (strlen($senha) < 4) {
			$error = "<h4 style='color:red'>Senha muito curta!</h4>";
		}else if ($senha != $csenha) {
			$error = "<h4 style='color:red'>Senhas não conferem, tente novamente!</h4>";
		}
		else if(mysqli_num_rows($verifica) > 0){
			$error = "<h4 style='color:red'>Nome de usuário já cadastrado!</h4>";
		}else{		
			mysqli_query($conn,"INSERT INTO `usuarios` (`nome`, `senha`) VALUES ('$nome','$senha')");
			$error = "<h4 style='color:green'>Administrador registrado com sucesso!</h4>";
			}
		}
?>

		<a href="index.php">Voltar para o site</a><br><br>
		<a href="listar_adm.php">Lista de Adiministradores</a><br><br>
		<a href="listar.php">Lista de Mensagens</a><br>

<center>
	<div class="container">
    	<h3>Registrar Novo Adiministrador</h3>
   			<?php echo $error; ?>
   				<form method="POST">
					<label>Nome:</label>
						<input type="text" name="nome" placeholder="Nome de usuário..."><br>
					<label>Senha:</label>
						<input type="password" name="senha" placeholder="Senha..."><br>
					<label>Senha:</label>
						<input type="password" name="csenha" placeholder="Confirmar senha..."><br><br>
					<input type="submit" name="registrar" value="Registrar" style="width: 23%">
				</form>
	</div>
</center>

