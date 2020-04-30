
<?php include_once("conexao.php");
$nome = $_POST['search'];
$result_produtos = "SELECT * FROM produtos WHERE nome LIKE'%".$nome."%'";
$resultado_produtos = mysqli_query($conn, $result_produtos);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pesquisa</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
		*{
			margin:0;
			padding: 0;
		}
		.menu{
			position: fixed;
			top: 0;
			rigth: 0;
			width: 100%;
			height: 50px;
			background-color: #222;
			font-family: 'Arial';
			z-index: 1;
		}
		.menu ul{
			list-style: none;
			position: relative;
		}
		.menu ul li{
			width: 150px;
			float:left;
		}
		.menu a{
			padding: 15px;
			display: block;
			text-decoration: none;
			text-align: center;
			background-color: #222;
			color: #fff;
		}
		.menu ul ul{
			position: absolute;
			visibility: hidden;
			z-index: 2;
		}
		.menu ul li:hover ul{
			visibility: visible;
		}
		.menu a:hover{
			background-color: #f4f4f4;
			color: #555;
		}
		.menu ul ul li{
			float: none;
			border-bottom: solid 1px #ccc;
		}
		.menu ul ul li a{
			background-color: #069;
		}
		label[for="bt_menu"]{
			padding: 5px;
			background-color: #222;
			color: #fff;
			font-family: 'Arial';
			text-align: center;
			font-size: 30px;
			cursor: pointer;
			width: 50px;
			height: 50px;
		}
		#bt_menu{
			position: fixed;
			display: none;
			z-index: 5;
		}
		label[for="bt_menu"]{
			display: none;
		}
		@media(max-width: 850px){
			label[for="bt_menu"]{
			display: block;
			z-index: 2;
			position: fixed;
			top: 0;
			rigth: 0;
			}
			#bt_menu:checked ~ .menu{
				margin-left: 0;
				
			}
			.menu{
				margin-top: 0px;
				margin-left: -100%;
				transition: all .4s;
				
			}
			.menu ul li{
				width: 100%;
				float: none;
			}
			.menu ul ul{
				position: static;
				overflow: hidden;
				max-height: 0;
				transition: all .4s;
			}
			.menu ul li:hover ul{
				height: auto;
				max-height: 200px;
				
			}
			form{
				text-align: center;
			}
			
		}
		form{
			width: 300px;
			margin: 0px auto;
			background-color: #222;
			color: #fff;
			position: relative;
		}
		.search{
		padding: 8px 15px;
		border: 0px dashed #fff;
		background-color: #221;
		margin: 5px auto;
		color: #fff;
		}
		.buttomsearch{
			position: relative;
			padding: 6px 15px;
			
			background-color: #f0ffff;
			color: #363036
		}
		.buttomsearch:hover{
			background-color: #363036;
			color: #f0ffff;
			
		}
		</style>
	</head>
	<body>
		<nav class="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="produto.php">Produtos</a>
				<ul>
					<li><a href="armadura.php">Armaduras</a></li>
					<li><a href="#">Armas Raras</a></li>
					<li><a href="#">Canhão</a></li>
					<li><a href="#">Drone</a></li>
				</ul>
			</li>
			<li><a href="#">Minha Conta</a>
				<ul>
				
					<li><a href="login.php">Login</a></li>
					<li><a href="cadastro.php">Criar Conta</a></li>
					
					
					
				</ul>
			</li>
			<li><a href="#">Carrinho</a></li>
			<li>
			<form action ="pesquisa.php" method = "post"> 
				<input class="search" type="text" name="search" placeholder="Procurar" required> 
				<input class="buttomsearch" type="submit" value="Ok">
			</form>
			</li>
		</ul>
		
	</nav>

	
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Pesquisa</h1>
			</div>
			<div class="row">
				<?php while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="<?php echo $rows_produtos['imagem']; ?>" alt="...">
							<div class="caption text-center">
								<a href="detalhes.php?id_produtos=<?php echo $rows_produtos['id']; ?>"><h3><?php echo $rows_produtos['nome']; ?></h3></a>
								<?php echo'
								<a href="carrinho.php?add=carrinho&id='. $rows_produtos['id'].' ">Adicionar ao carrinho</a>';
								?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>