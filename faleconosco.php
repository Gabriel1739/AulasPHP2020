<?php

session_start();

?>


<div class="container">
    <h3>Fale Conosco</h3>

    <?php
    if(isset($_SESSION['msg'])){
    	echo $_SESSION['msg'];
    	unset($_SESSION['msg']);
    }
    ?>
     
	<form method="POST" action="dados.php">
		<label>Nome:</label>
		<input type="text" class="form-control" name="nome" placeholder="Digite seu nome...">
		<label>Email:</label>
		<input type="email" class="form-control" name="email" placeholder="Digite seu email...">
		<label>Assunto:</label>
		<input type="text" class="form-control" name="assunto" placeholder="Digite o assunto...">
		Mensagem:<textarea class="form-control" name="mensagem" rows="5" cols="10"></textarea><br>
		<button type="submit" class="btn btn-primary">Enviar Mensagem</button>
	</form> 


</div>