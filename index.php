<!doctype html>
<html lang="pt-br">
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">

    <title>Sobre PRF</title>
  </head>

  <body>
      <?php 
      include_once("db.php");
      include_once("topo.php");   
      include_once("header.php");
      if(empty($_SERVER["QUERY_STRING"])){
                $var = "conteudo.php";
                include_once("$var");
      }else{
                $pg = $_GET['pg'];
                include_once("$pg.php");
            }
      include_once("rodape.php");
      ?>
      
      <p>&nbsp;</p>

    <script src="node_modules\jquery\dist\jquery.js"></script>
    <script src="node_modules\popper.js\dist\popper.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
  </body>
</html>