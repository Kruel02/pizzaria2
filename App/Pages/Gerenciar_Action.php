<?php
require_once("./../config/config.php");
//require_once("./../Pages/Partials/Header.php");

$dado = [];




if ($_POST['btn-action'] === "Excluir") {
    if (isset($_COOKIE["PizzaBuscada"])) {
        $sql = $pdo->prepare("DELETE FROM  pizzas WHERE NomePizza = :PizzaBuscada");
        $sql->bindValue(":PizzaBuscada", $_COOKIE["PizzaBuscada"]);
        $sql->execute();
        setcookie("PizzaBuscada", "", time() - 3600);
        header("Location: Gerenciar.php");
    } else {
        echo " não Excluiu";
        header("Location: Gerenciar.php");

        exit;
    }
} elseif ($_POST['btn-action'] === "Alterar") {

    if (isset($_COOKIE['PizzaBuscada'])) {
        $sql = $pdo->prepare('UPDATE pizzas SET  Valor = :valorPizza, Tamanho = :tamanhoPizza, Descrição = :descricaoPizza WHERE NomePizza = :PizzaBuscada');
        $sql->bindValue(":PizzaBuscada", $_COOKIE["PizzaBuscada"]);
        $sql->bindValue(":valorPizza", $_POST["valorPizza"]);
        $sql->bindValue(":tamanhoPizza", $_POST["tamanhoPizza"]);
        $sql->bindValue(":descricaoPizza", $_POST["descricaoPizza"]);
        $sql->execute();
       
        // header("Location: Gerenciar.php");
        echo "Alterou";
    } else {
        echo "Não foi";
        header("Location: Gerenciar.php");

        exit;
    }
} elseif ($_POST["btn-action"] === "Buscar") {
    echo "Buscou";
    $Pizzabuscada = filter_input(INPUT_POST, 'PizzaBuscada');


    if ($Pizzabuscada) {
        $sql = $pdo->prepare("SELECT * FROM  pizzas WHERE NomePizza = :PizzaBuscada");
        var_dump($Pizzabuscada);

        $sql->bindValue(":PizzaBuscada", $Pizzabuscada);
        $sql->execute();


        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch(PDO::FETCH_ASSOC);
            setcookie("PizzaBuscada", $Pizzabuscada,  time() + 3600);

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
                <input type="text" name="nomePizza" id="nome-pizza" value=<?= isset($_POST['IdPizza']) ?  $_POST['IdPizza'] : ""; ?>>
                <input type="submit" name="btn-action" value="Buscar">

                <input type="hidden" name="" id="">
                <!-- a chave do array nomePizza é o nome da coluna que veio do BD-->
            </div>
            <div class="form-item">
                <label for="valor-pizza">Valor R$:</label>
                <input type="text" name="valorPizza" id="valor-pizza" value=<?= isset($dado['Valor']) ? $dado["Valor"] : ""; ?>>
            </div>
            <div class="form-item">
                <label for="tamanho-pizza">Tamanho:</label>
                <input type="text" name="tamanhoPizza" id="tamanho-pizza" value=<?= isset($dado['Tamanho']) ? $dado["Tamanho"] : ""; ?>>
            </div>
            <div class="form-item">
                <label for="descricao-pizza">Descrição:</label>
                <textarea name="descricaoPizza" id="descricao" cols="50" rows="10"><?= isset($dado['Descrição']) ? $dado["Descrição"] : ""; ?>
                </textarea>
            </div>
            <div>
                <input type="submit" name="btn-action" value="Alterar">
                <input type="submit" name="btn-action" value="Excluir">
            </div>
        </form>
    </main>
</body>

</html>