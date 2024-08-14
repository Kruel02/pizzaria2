<?php

use Money\Currency;
use Money\Money;

    require_once("./../Config/config.php");

  
 setlocale(LC_MONETARY,"pt-BR");
 $NomePizza = filter_input(INPUT_POST,'NomePizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $ValorPizza = filter_input(INPUT_POST, 'ValorPizza',FILTER_VALIDATE_FLOAT);
 //var_dump($ValorPizza);
 $TamanhoPizza = filter_input(INPUT_POST, 'TamanhoPizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $DescricaoPizza = $_POST['DescricaoPizza'];

 $ValorPizza = number_format(str_replace([',', '.'], ['', '.'], $_POST['ValorPizza']), 2, '.', ',');
 var_dump($ValorPizza);

 $ValorPizza = number_format($ValorPizza, 2, ",", ".");
 var_dump($ValorPizza);
 $ValorPizza = floatval(str_replace(',', '.',  $ValorPizza));
 var_dump($ValorPizza);

// $Formatter = new NumberFormatter('pt-BR', NumberFormatter::CURRENCY);
 

 
 

 

  if($NomePizza && $ValorPizza && $TamanhoPizza)
  {
     $sql = $pdo->prepare("INSERT INTO pizzas (IdUsuario, NomePizza, PathFoto, Valor, Tamanho, Descrição) VALUES 
     (:IdUsuario,:NomePizza,:PathFoto,:Valor,:TamanhoPizza,:DescricaoPizza);") ;
       $sql->bindValue(":IdUsuario", 1);
    $sql->bindValue(":NomePizza", $NomePizza) ;
    $sql->bindValue(":TamanhoPizza", $TamanhoPizza) ;
    $sql->bindValue(":DescricaoPizza", $DescricaoPizza) ;
    $sql->bindValue(":Valor", $ValorPizza) ;
    $sql->bindValue(":PathFoto", "https://www.pizzaprime.com.br/wp-content/uploads/2019/10/massa-de-pizza.jpeg") ;
    $sql->execute();
    //header("Location: ./../index.php");
    
    exit();
    
  }
  else{
   echo"Não foi";


  }
  

