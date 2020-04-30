<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<meta name="viewport" content="
		width=device-width,initial-scale=1.0">
		<title>Cadastrando</title>
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
		.col-md-4{
			padding-top: 30px;
		}

		.modal-content{
			margin-top: 20px;
			margin-right: auto;
			margin-left: auto;
			max-width: 80%;
			
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
$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
mysqli_select_db($conexao, $banco) or die (mysqli_error());


$email = $_POST['email'];
$sql = "select * from usuario where email='$email'";
$query = mysqli_query($conexao, $sql); 
$busca = mysqli_num_rows($query); 
if (($busca)=='0'){
	
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$endereco=$_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = mysqli_query($conexao, "INSERT INTO usuario(nome, sobrenome, endereco, telefone, email, senha)
VALUES ('$nome', '$sobrenome', '$endereco', '$telefone', '$email', '$senha')");

echo "<center><h1>Cadastro realizado com sucesso! </h1></center>";

echo '<a href = "produto.php"> Voltar as compras.</a>';
mysqli_close($conexao);

  
} else {?>

<div class="alert alert-danger" role="alert" style=" width: 30%; text-align: center;  
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    margin-right: 50%;
    margin-left: auto;">
    <?php echo utf8_decode("Já existe um usuário cadastrado com esse e-mail."); ?><a href="cadastro.php"> Tente novamente.</a>
</div>
   <?php
}

?>


</body>
</html>
