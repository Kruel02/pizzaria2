<?php
require_once("./../config/config.php");

$dado = [];

if (isset($_GET['IdPizza'])) {
    $IdPizza = filter_input(INPUT_GET, "IdPizza");

    if ($IdPizza) {
        $sql = $pdo->prepare('SELECT * FROM pizzas WHERE IdPizza=:IdPizza');
        //$sql = $pdo->prepare('UPDATE pizzas SET NomePizza = :NomePizza Valor = :valorPizza, Tamanho = :tamanhoPizza, Descrição = :descricaoPizza WHERE IdPizza = :IdPizza');
        $sql->bindValue(':IdPizza', $IdPizza);

        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            $dado = $sql->fetch(PDO::FETCH_ASSOC);
        }
    } elseif (empty($sql->rowCount())) {
        echo "Não foi";
        header("Location: Gerenciaralt.php");

        exit;
    }
}

if($_POST['btn-action'] ==='Alterar')
{
    $sql = $pdo->prepare('UPDATE pizzas SET NomePizza = :NomePizza, Valor = :valorPizza, Tamanho = :tamanhoPizza, Descrição = :descricaoPizza WHERE IdPizza = :IdPizza');
    $sql->bindValue(':IdPizza', $IdPizza);
    $sql->bindValue(':NomePizza', $_POST['NomePizza']);    
    $sql->bindValue(':Valor', $_POST['Valor']);   
    $sql->bindValue(':Tamanho', $_POST['Tamanho']);   
    $sql->bindValue(':Descrição', $_POST['Descrição']);   
    $sql->execute();
    header("Location: Gerenciaralt.php");
    exit;

}
elseif($_GET["btn-action"]=== "Voltar")
{
    header("Location: Gerenciaralt.php");
    exit;



}

?>



<form action="./Atualizar_Action.php" method="post">
    <div class="form-item">
        <label for="IdPizza">Id da Pizza</label>
        <input type="text" name="IdPizza" id="IdPizza" value=<?= isset($_GET['IdPizza']) ?  $_GET['IdPizza'] : ""; ?>>


    </div>
    <div class="form-item">
        <label for="nome-pizza">Nome da Pizza:</label>
        <input type="text" name="NomePizza" id="nome-pizza" value=<?= isset($dado['NomePizza']) ? $dado["NomePizza"] : ""; ?>>
    </div>
    <div class="form-item">
        <label for="Valor">Valor R$:</label>
        <input type="text" name="Valor" id="valor-pizza" value=<?= isset($dado['Valor']) ? $dado["Valor"] : ""; ?>>
    </div>
    <div class="form-item">
        <label for="Tamanho">Tamanho:</label>
        <input type="text" name="Tamanho" id="tamanho-pizza" value=<?= isset($dado['Tamanho']) ? $dado["Tamanho"] : ""; ?>>
    </div>
    <div class="form-item">
        <label for="descricao-pizza">Descrição:</label>
        <textarea name="Descrição" id="Descrição" cols="50" rows="10" <?= isset($dado['Descrição']) ? $dado["Descrição"] : ""; ?>></textarea>
    </div>
    <div>
        <input type="submit" name="btn-action" value="Alterar" <?php $action="Alterar"?>> 
        <input type="submit" name="btn-action" value="Voltar">
    </div>
</form>