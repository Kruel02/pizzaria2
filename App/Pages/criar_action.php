<?php
    require_once("./../Config/config.php");

 
 $_POST['ValorPizza'] = str_replace(',','.', $_POST['ValorPizza']);
 var_dump($_POST['ValorPizza']); 
 $NomePizza = filter_input(INPUT_POST,'NomePizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $ValorPizza = filter_input(INPUT_POST, 'ValorPizza',FILTER_VALIDATE_FLOAT);
 var_dump($ValorPizza);
 $TamanhoPizza = filter_input(INPUT_POST, 'TamanhoPizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $DescricaoPizza = $_POST['DescricaoPizza'];
 

  if($NomePizza && $ValorPizza && $TamanhoPizza)
  {
     $sql = $pdo->prepare("INSERT INTO pizzas (IdUsuario, NomePizza, PathFoto, Valor, Tamanho, Descrição) VALUES 
     (:IdUsuario,:NomePizza,:PathFoto,:Valor,:TamanhoPizza,:DescricaoPizza);") ;
   var_dump($sql);
   var_dump($pdo);
    $sql->bindValue(":IdUsuario", 1);
    $sql->bindValue(":NomePizza", $NomePizza) ;
    $sql->bindValue(":TamanhoPizza", $TamanhoPizza) ;
    $sql->bindValue(":DescricaoPizza", $DescricaoPizza) ;
    $sql->bindValue(":Valor", $ValorPizza) ;
    $sql->bindValue(":PathFoto", "https://www.pizzaprime.com.br/wp-content/uploads/2019/10/massa-de-pizza.jpeg") ;
    $sql->execute();
    header("Location: ./../index.php");
  
    exit();
    
  }
  else{
   echo"Não foi";


  }
  

