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
	.contact-form{
		margin-left: auto;
		margin-right: auto;
		background: rgba(0,0,0, .6);
		color: white;
		margin-top: 50px;
		padding: 20px;
		-webkit-box-shadow: 0px 0px 10px 3px grey;
		-moz-box-shadow: 0px 0px 10px 3px grey;
		box-shadow: 0px 0px 10px 3px grey;
		max-width: 70%;
	}
	.contact-form .link{
		margin-right: auto;
		margin-left: auto;
		
	}

	.contact-form h1{
		margin-right: auto;
		margin-left: auto;
		
	}

	.col-md-6{
		margin-right: auto;
		margin-left: auto;
	}
	
	*{
			margin:0;
			padding: 0;
		}

		.dropdown:hover>.dropdown-menu{
			display: block;
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
			margin-right: 200px !important;
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


	
	
				
				
				<form action= "cadastrando.php" method = "post" class="container contact-form">
					<h1>Registro</h1>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nome</label>
								
								
								<input type = "text" name = "nome" class="form-control" placeholder="Digite seu nome" />
							</div>
							<div class="form-group">
								<label>Sobrenome</label>
								<input type = "text" name = "sobrenome" class="form-control" placeholder="Digite seu sobrenome"/>
							</div>
							<div class="form-group">
								<label><?php echo utf8_decode("Endereço");?></label>
								<input type = "text" name = "endereco" class="form-control" placeholder="<?php echo utf8_decode("Digite seu endereço");?>"/>
							</div>
							<div class="form-group">
								<label>Telefone</label>
								<input type = "text" name = "telefone" class="form-control" placeholder="Digite seu telefone"/>
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input type = "text" name = "email" class="form-control" placeholder="Digite seu e-mail"/>
							</div>
							<div class="form-group">
								<label>Senha</label>
								<input type = "password" name = "senha" class="form-control" placeholder="Digite sua senha"/>
							</div>
							<div class="form-group">
								<input type = "submit" class="btn btn-primary btn-block" value = "Registrar" />
							</div>
						</div>
					</div>

				</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>


