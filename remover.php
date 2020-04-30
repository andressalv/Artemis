<?php 

session_start();
$idProdutos = $_GET['id'];
IF(isset($_GET['remover']) && $_GET['remover'] == "carrinho"){
	$idProdutos = $_GET['id'];
	unset($_SESSION['itens'] [$idProdutos]);
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=carrinho.php"/>';
}

