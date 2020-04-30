
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="
		width=device-width,initial-scale=1.0">
		<title>Artemis</title>
		<link rel="sortcut icon" href="imagens/logo-title.jpg" type="image/jpg" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<style>
		*{
			margin:0;
			padding: 0;
		}

		.dropdown:hover>.dropdown-menu{
			display: block;
		}

		.alert-info{
			height: 250px;
			max-width: 250px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 10%;
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

		#logo{
			max-width: 100%;
			max-height: 190px;
			margin-left: 200px;

			filter: alpha(opacity=65);
			z-index: 1;
		}
		p .artemis{
			font-family: Impact, fantasy;
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
.my-lg-0{
	margin-right: auto;
	margin-left: auto;
}

.continuarComprando{
	margin-right: auto;
	margin-left: auto;
	padding-top: 30px;
}

		</style>
	</head>
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
	<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Artemis</a>
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
			  			echo utf8_decode("Olá, "); echo utf8_decode("$username"); echo "!";
			  		}?>
			  	</p>
			</div>
		  <?php
		   if($username != "visitante"){
		  	 ?>
	      	<div class="alert alert-success" role="alert">
	      		<p>
	      			<?php
			  			echo utf8_decode("Olá, "); echo utf8_decode("$username"); echo "!";
			  }?>
			  	</p>
			</div>
	  </div>
</nav>


	

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
	
</html>
<?php

 if (!isset($_SESSION["logado"])){
 	?>
 	
	 <div class="alert alert-info" role="alert"><?php 
	 echo utf8_decode("FAÇA"); echo' <a href="login.php">LOGIN</a> OU <a href = "cadastro.php">CRIE UMA CONTA.</a>';?>
	</div><?php
}else{
	
if(!isset($_SESSION['itens'])){

$_SESSION['itens'] = array();
$_SESSION['idprod'] = array();

}
/*adiciona*/

if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
	
$idProdutos = $_GET['id'];

if(!isset($_SESSION['itens'] [$idProdutos])){
	
$_SESSION['itens'] [$idProdutos] = 1;
}else{
$_SESSION['itens'] [$idProdutos] += 1;
}

}

/*exibe*/
if(count($_SESSION['itens']) == 0){
	?><div class="alert alert-info" role="alert"><?php
echo 'Carrinho Vazio. Clique <a href="produto.php">AQUI</a> para comprar!';?>
</div><?php

}else{
	
?><div class="modal-content">
	<h1>Seu carrinho de compras</h1>
<hr/>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Produto</th>
      <th scope="col"><?php echo utf8_decode("Preço");?></th>
      <th scope="col">Quantidade</th>
      <th scope="col">Total</th>
      <th scope="col">Excluir Produto</th>
    </tr>
  </thead>
  <tbody>
  	<?php
$conexao = new PDO ('mysql:host=localhost; dbname=produtos', "root", "");
foreach($_SESSION['itens'] as $idProdutos => $quantidade) {

	

$_SESSION['idprod'] = $idProdutos;

$select = $conexao -> prepare("SELECT * FROM produtos WHERE id=?");
$select -> bindParam(1,$idProdutos);
$select -> execute();
$produtos = $select -> fetchALL();
$total = $quantidade * $produtos[0]["preco"];
?>

    <tr>
<td class="nome"> <?php echo utf8_decode($produtos[0] ["nome"]). '</td>
<td class="valor">BTC '. number_format($produtos[0] ["preco"],2,",",".").'</td>
<td class="quantidade">'.$quantidade. '</td>
<td class="valor">BTC '. number_format($total,2,",",".").'</td>
<td><a class="btn btn-danger" role="button" href = "remover.php?remover=carrinho&id='.$idProdutos.'"> Excluir</a>';?></td>
    
<?php 



$_SESSION['quant'] = $quantidade;
$_SESSION['valor'] = $total;

}


?>
</tr>
  </tbody>
</table>
<form action ="finalizar.php" method = "post" class="form-inline my-2 my-lg-0">
	    	<!-- <input class="search" type="text" name="search" placeholder="Procurar" required> -->
	      
	      <button class="btn btn-success" type="submit">Finalizar pedido</button>
</form><br/>

<?php
echo '<a href = "produto.php" class="continuarComprando"> Clique aqui para continuar comprando</a>';



}

?>


<?php
}
 
?>

</div>