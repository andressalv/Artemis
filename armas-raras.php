<?php include_once("conexao.php");
$nome = "rara";
$result_produtos = "SELECT * FROM produtos WHERE categoria LIKE'%".$nome."%'";
$resultado_produtos = mysqli_query($conn, $result_produtos);
$conexao = new PDO ('mysql:host=localhost; dbname=produtos', "root", "");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="
		width=device-width,initial-scale=1.0">
		<title>Armaduras</title>
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

		footer{
			margin-top: 30px;
		}

		
		.card-deck{
			padding-top: 10px;
		}

		.modal-content{
			margin-top: 20px;
			margin-right: auto;
			margin-left: auto;
			max-width: 80%;
			
		}
		.col-md-4{
			padding-top: 30px;
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
	          <a class="dropdown-item" href="armas.php">Armas</a>
	          <a class="dropdown-item" href="#">Armas Raras</a>
	          
	        </div>
	        <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Minha Conta
	        </a>
	         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="login.php">Login</a>
	          <a class="dropdown-item" href="cadastro.php">Criar conta</span></a>
	          <a class="dropdown-item" href="historico.php">Histórico</a>
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
		
		
	      if($username == "visitante"){
	      ?>
	      	<div class="alert alert-warning" role="alert">
	      		<p>
	      			<?php
			  			echo "Olá, " ; echo $username; echo "!";
			  		}?>
			  	</p>
			</div>
		  <?php
		   if($username != "visitante"){
		  	 ?>
	      	<div class="alert-success" role="alert">
	      		<p>
	      			<?php
			  			echo "Olá, " ; echo $username; echo "!";
			  }?>
			  	</p>
			</div>
	  </div>
</nav>
			
			<div class="modal-content">

		
	
			<div class="page-header">
				<h1>Armaduras</h1>
				<hr>
			</div>

			<div class="card-deck">
			<?php $cont = 1; ?>
			<div class="row">
				<?php while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){
					if(($cont % 5) == 0){
							?> <br/> <br> <?php
						}?>
					<div class="col-sm-6 col-md-4">
					<div class="card">
							<figure class="produto"><img class="card-img-top" src="<?php echo utf8_encode($rows_produtos['imagem']); ?>" alt="..."></figure>
							<div class="card-body">
								<div class="caption text-center">
								<a href="detalhes.php?id_produtos=<?php echo $rows_produtos['id']; ?>"><h5 class="card-title"><?php echo utf8_encode($rows_produtos['nome']); ?></h5></a>
									<h5 class="card-title">BTC <?php echo utf8_encode($rows_produtos['preco']); ?></h5>
      							
      							<a class="btn btn-primary" role="button" href="detalhes.php?id_produtos=<?php echo $rows_produtos['id']; ?>">Ver Produto</a>
      						</div>
    						</div>
					</div>
					</div>	
				<?php $cont = $cont + 1; } ?>
			</div>
			</div>
		</div>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>