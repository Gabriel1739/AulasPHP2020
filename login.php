<?php
	include("db.php");
	$error = "";

	if (isset($_POST['login'])) {
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];

		$verifUsers = mysqli_query($conn,"SELECT  nome  FROM usuarios WHERE nome = '$nome' AND  senha = '$senha'");

		if (mysqli_num_rows($verifUsers) > 0) {
			header("Location: listar.php");
		}else{			
			$error = "<h4 style='color:red'>Nome ou senha incorretos!</h4>";
		}
	}
?>


<center>
	<div class="container">
    	<h3>Painel de Adiministrador</h3><br>
    	<?php echo $error; ?>
   				<form method="POST">
					<label>Nome:</label>
						<input type="text" name="nome" placeholder="Nome de usuário..."><br>
					<label>Senha:</label>
						<input type="password" name="senha" placeholder="Senha..."><br><br>
					<input type="submit" name="login" value="Entar" style="width: 21%">
				</form> 	
	</div>
</center>