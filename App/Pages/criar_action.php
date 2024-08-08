<?php

 $NomePizza = filter_input(INPUT_POST,'NomePizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $ValorPizza = filter_input(INPUT_POST,'ValorPizza',FILTER_VALIDATE_FLOAT);
 $TamanhoPizza = filter_input(INPUT_POST, 'TamanhoPizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $DescricaoPizza = $_POST['DescricaoPizza'];

 echo "Dados enviados {$NomePizza}, {$ValorPizza}, {$TamanhoPizza}, e {$DescricaoPizza}";
var_dump($_POST);