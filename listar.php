<?php
session_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Lista de Contatos</title>		
	</head>
	<body>

		<a href="index.php">Voltar para o site</a><br><br>
		<a href="listar_adm.php">Lista de Adiministradores</a><br><br>			
		<a href="registro.php">Registrar Novo Admin</a>


		<h1>Lista de Mensagens</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		$qnt_result_pg = 1;

		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_usuarios = "SELECT * FROM contatos LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "ID: " . $row_usuario['id'] . "<br><hr>";
			echo "Nome: " . $row_usuario['nome'] . "<br><hr>";
			echo "E-mail: " . $row_usuario['email'] . "<br><hr>";
			echo "Assunto: " . $row_usuario['assunto'] . "<br><hr>";
			echo "Mensagem: " . $row_usuario['mensagem'] . "<br><hr>";
			echo "Data de envio: " . $row_usuario['data'] . "<br><hr>";
			echo "<a href='editar.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
			echo "<a href='apagar.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
		}

		$result_pg = "SELECT COUNT(id) AS num_result FROM contatos";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);

		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		$max_links = 2;
		echo "<a href='listar.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='listar.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>			
	</body>
</html>