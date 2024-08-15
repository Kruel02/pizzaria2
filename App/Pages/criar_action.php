<?php

use Money\Currency;
use Money\Money;

    require_once("./../Config/config.php");

  
 //setlocale(LC_MONETARY,"pt-BR");
 $_POST['ValorPizza'] = floatval(str_replace(',','.', $_POST['ValorPizza']));
 var_dump($_POST['ValorPizza']);
 $_POST['ValorPizza'] = floatval(number_format($_POST['ValorPizza'],3,'.', ','));
 var_dump($_POST['ValorPizza']);
 $ValorPizza =  floatval($_POST['ValorPizza']);
 var_dump($ValorPizza);
 $ValorPizza = floatval(str_replace('.','' , $ValorPizza ));
 //$ValorPizza = filter_input(INPUT_POST, 'ValorPizza',FILTER_VALIDATE_FLOAT);
 var_dump($ValorPizza);


 $NomePizza = filter_input(INPUT_POST,'NomePizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $TamanhoPizza = filter_input(INPUT_POST, 'TamanhoPizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $DescricaoPizza = $_POST['DescricaoPizza'];

 

 //$ValorPizza = number_format(str_replace(',', '.',  $_POST['ValorPizza']), 3, '','');
 

 
//  $ValorPizza = floatval($ValorPizza);
//  var_dump($ValorPizza);
 

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
  

