<?php
    require_once("./../config/config.php");
    //require_once("./../Pages/Partials/Header.php");
   
     $dado=[];
  



  If($_POST['btn-action']==="Excluiu")
  { 
    if($Pizzabuscada)
    {
      $sql=$pdo->prepare("DELETE FROM  pizzas WHERE NomePizza = PizzaBuscada");
      $sql->bindValue(":PizzaBuscada", $Pizzabuscada);
      $sql->execute();

    }
    else
    {
        header("Location: Gerenciar.php");
        exit;


    }
    echo "Excluiu";
  }
  elseif ($_POST['btn-action']=== "Alterar") 
  {
  echo "Alterou";
  }
  elseif ($_POST["btn-action"]=== "Buscar")
  {
    echo "Buscou";
    $Pizzabuscada = filter_input(INPUT_POST,'PizzaBuscada');
    
if($Pizzabuscada){
$sql=$pdo->prepare("SELECT * FROM  pizzas WHERE NomePizza = :PizzaBuscada");
var_dump ($Pizzabuscada);

$sql -> bindValue(":PizzaBuscada", $Pizzabuscada);
$sql -> execute();


if($sql->rowCount()> 0){
  $dado = $sql->fetch(PDO::FETCH_ASSOC);
  setcookie("PizzaNuscada", $Pizzabuscada,  time()+3600);
 
  var_dump($dado);

}
}

// else{
// header("Location: gerenciar.php");
// exit;
// }

  }

    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pizza</title>  
</head>
<body>
    <main>
        <form action="./gerenciar_action.php" method="post">
          
            <div class="form-item">
                <label for="nome-pizza">Nome da Pizza:</label>
                <input type="text" name="nomePizza" id="nome-pizza" value=
                <?=isset($dado['NomePizza']) ?  $dado['NomePizza']: "";?>>
                <!-- a chave do array nomePizza é o nome da coluna que veio do BD-->
            </div>
            <div class="form-item">
                <label for="valor-pizza">Valor R$:</label>
                <input type="text" name="valorPizza" id="valor-pizza" value=
                <?=isset($dado['Valor']) ? $dado["Valor"] : "";?>>
            </div>
            <div class="form-item">
                <label for="tamanho-pizza">Tamanho:</label>
                <input type="text" name="tamanhoPizza" id="tamanho-pizza" value=
                <?=isset($dado['Tamanho']) ? $dado["Tamanho"] : "";?>>
            </div>
            <div class="form-item">
                <label for="descricao-pizza">Descrição:</label>
                <textarea name="descricaoPizza" id="descricao" cols="50" rows="10"><?=isset($dado['Descrição']) ? $dado["Descrição"] : "";?>
                </textarea>
            </div>
            <div>
                <input type="submit"  name="btn-action" value="Alterar">
                <input type="submit" name="btn-action" value="Excluir">
            </div>
        </form>
    </main>    
</body>
</html>