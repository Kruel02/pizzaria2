<?php
    require_once("./../Config/config.php");


    $Pizzabuscada = filter_input(INPUT_POST,'PizzaBuscada');
    var_dump ($Pizzabuscada);
if($Pizzabuscada){
$sql=$pdo->prepare("SELECT * FROM  pizzas WHERE NomePizza= :PizzaBuscada");
$sql -> bindValue(":PizzaBuscada", $Pizzabuscada);
$sql -> execute();

if($sql->rowCount()> 0){
  $dado = $sql->fetch(PDO::FETCH_ASSOC);
  
  var_dump($dado);

}



}
