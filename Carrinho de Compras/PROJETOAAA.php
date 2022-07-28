<!DOCTYPE html>
<html>
     <head>

<title>Seu Carrinho de Compras</title>

<style type="text/css"> *{margin: 0;padding: 0; box-sizing: border-box;}

h2.title{
    background-color:#069;
    width:100%;
    padding:20px;
    text-align: center;
    color:white;
}

.carrinho-container{ 
    display: flex; 
    margin-top:10px;
}

.produto{
width:33.3%; 
padding: 0 30px;
}
.produto img{ max-width: 100%;              
  }
  .produto a{ display: block; 
    background-color:#5fb382; 
    text-align: center;
padding:10px; 
color:white;
text-decoration: none;

}
</style>
</head>
</body>

<h2 class="title">Seu Carrinho de Compras</h2>
<div class="carrinho-container">
    <?php

$items = array(['nome' => 'Curso 1', 'imagem' => 'Broca.jpg', 'preco' => '200'],

['nome' => 'Curso 2', 'imagem' => 'Martelo.jpg', 'preco'=>'100'], ['nome' => 'Curso 3', 'imagem' => 'Maçarico.jpg', 'preco'=>'400']);

foreach ($items as $key => $value) {

?>

<div class="produto">

<img src="<?php echo $value['imagem'] ?>" /> <a href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho!</a>

</div><!--produto-->

<?php
    }
?>

</div><!--carrinho-container-->

<?php

if(isset($_GET['adicionar'])){

//vamos adicionar ao carrinho. 
$idProduto = (int) $_GET['adicionar'];

if(isset($items[$idProduto])){

if(isset($_SESSION['carrinho'][$idProduto])){ $_SESSION['carrinho'][$idProduto]['quantidade']++;

}else{

$_SESSION['carrinho'][$idProduto] = array( 'quantidade' => 1, 'nome'=>$items[$idProduto]['nome'], 'preco'=>$items [$idProduto]['preco']);

} echo '<script>alert("0 item foi adicionado ao carrinho.");</script>';

}else{

die('Você não pode adicionar um item que não existe.');

}

}

?>

</body>
</html>
