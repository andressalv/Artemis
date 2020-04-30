<?php
	session_start();
	
$host = "localhost";
$user = "root";
$pass = "";
$banco = "produtos";
$conexao = mysqli_connect ($host, $user, $pass) or die (mysqli_error());

      mysqli_select_db($conexao, $banco) or die (mysqli_error());
     
     if (!isset($_SESSION["logado"])){
 	 $username = "visitante";
     }else{
     $userid = $_SESSION['id'];

     $sql = mysqli_query($conexao, "SELECT nome FROM usuario WHERE id = '$userid'");
     $row = mysqli_fetch_array($sql);
     $username = $row['nome'];
		
	 }
		
?>
<html>
<head>
<meta charset="utf-8">
		<meta name="viewport" content="
		width=device-width,initial-scale=1.0">
		<title> Registro </title>
		<link rel="sortcut icon" href="imagens/logo-title.jpg" type="image/jpg" />
		<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<style>
hr{
	background: white;
}
	
	
	*{
			margin:0;
			padding: 0;
		}

		.dropdown:hover>.dropdown-menu{
			display: block;
		}

		.modal-content{
			margin-top: 20px;
			margin-right: auto;
			margin-left: auto;
			max-width: 80%;
			
		}

		.table{
			max-width: 80%;
			margin-top: 20px;
			margin-right: auto;
			margin-left: auto;
		}

		.nome{
			max-width: 80px;
		}

		.quantidade{
			
			margin-left: 25px;
		}
		.valor{
			max-width: 80px;
		}
		.data{
			max-width: 80px;
		}

		p{
			margin-top: auto;
			
		}
		.alert-warning{
			margin-top: auto;
			margin-bottom: auto;
			max-height: 40px;
					}
		.alert-success{
			margin-top: auto;
			margin-bottom: auto;
			max-height: 40px;
		}
		.busca{
			margin-right: 100px !important;
		}

		.alert-info{
			height: 250px;
			max-width: 250px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 10%;
		}

		
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Menu</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home <span class="glyphicon glyphicon-home"> </span></a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="produto.php">Produtos<span class="sr-only">(current)</span></a>
	      </li>
	      
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Categorias
	        </a>
	         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="armadura.php">Armaduras</a>
	          <a class="dropdown-item" href="armas.php">Armas Raras</a>
	          
	        </div>
	        <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Minha Conta
	        </a>
	         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="login.php">Login</a>
	          <a class="dropdown-item" href="cadastro.php">Criar conta</span></a>
	          <a class="dropdown-item" href="historico.php"><?php echo utf8_decode("Histórico");?></a>
	          <a class="dropdown-item" href="sair.php">Sair</a>
			 
	        
	          
	        </div>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="carrinho.php">Carrinho <span class="glyphicon glyphicon-user"></span></a>
			 
	      </li>

	    </ul>
	    <div class="busca">
	    <form action ="pesquisa.php" method = "post" class="form-inline my-2 my-lg-0">
	    	<!-- <input class="search" type="text" name="search" placeholder="Procurar" required> -->
	      <div class="campobusca"><input class="form-control mr-sm-2" type="text" name="search" placeholder="Produto" required></div>
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
		</div>
	    <?php
		
	      if($username == "visitante"){
	      ?>
	      	<div class="alert alert-warning" role="alert">
	      		<p>
	      			<?php
			  			echo utf8_decode("Olá "); echo utf8_decode($username); echo "!";
			  		}?>
			  	</p>
			</div>
		  <?php
		   if($username != "visitante"){
		  	 ?>
	      	<div class="alert alert-success" role="alert">
	      		<p>
	      			<?php
			  			echo utf8_decode("Olá "); echo utf8_decode($username); echo "!";
			  }?>
			  	</p>
			</div>
	  </div>
</nav>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "produtos";
$conexao = mysqli_connect ($host, $user, $pass) or die (mysqli_error());

mysqli_select_db($conexao, $banco) or die (mysqli_error());

if (!isset($_SESSION["logado"])){
 	?>
 	<style>.modal-content{display: none;}
 		   .alert-info{display: block;}
 	</style>
 	<div class="alert alert-info" role="alert"><?php
	echo utf8_decode("FAÇA"); echo' <a href="login.php">LOGIN</a> OU <a href = "cadastro.php">CRIE UMA CONTA.</a>';?>
	</div><?php
}else{
$userid = $_SESSION['id'];

$sql1 = mysqli_query($conexao, "SELECT nome FROM usuario WHERE id = '$userid'");
$row = mysqli_fetch_array($sql1);
$nome = $row['nome'];




$sql = mysqli_query ($conexao, "SELECT * FROM pedido WHERE id_cliente = '$userid' order by data desc") or die (mysqli_error());

$row = mysqli_num_rows($sql);
if ($row == 0){ ?>
	<div class="comprar">
	<div class="alert alert-warning" role="alert"> <?php
	echo 'Você ainda não comprou com a gente. <a href="produto.php">Clique aqui</a> para comprar!';
	?> </div></div><?php
}else{
?>
<div class="modal-content">
<h1><?php echo utf8_decode("Histórico de compras de "); echo utf8_decode("$username"); ?></h1>
<hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Total</th>
      <th scope="col">Data da Compra</th>
    </tr>
  </thead>
  <tbody>
<?php
 while($rows = mysqli_fetch_assoc($sql)) {
	 
     $prodid = $rows["id_produto"];
	 $result = mysqli_query ($conexao, "SELECT * FROM produtos WHERE id = '$prodid'");
     $row = mysqli_fetch_array($result);
	 $prodnome = $row['nome'];
	 $prodvalor = $row['preco'] * $rows["quant"];
	 $data = $rows["data"];
	 ?>

    <tr>
      <td class="nome"> <?php
	  echo utf8_decode($prodnome); ?></td>
      <td class="quantidade"><?php echo "      " . $rows["quant"];?></td>
      <td class="valor"><?php echo 'BTC ' . number_format($prodvalor, 2, '.', ','); ?></td>
      <td class="data"><?php echo date('d/m/Y',strtotime($data)); ?></td>
    </tr>


<?php	 
 }
 ?>
   </tbody>
</table>
<?php echo '<center><a class="btn btn-primary" role="button"  href = "produto.php">Voltar as compras</a></center>';
 }
}

?>
</div>
</body>
</html>