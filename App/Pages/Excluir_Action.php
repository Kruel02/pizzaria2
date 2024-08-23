<?php
require_once("./../config/config.php");


if (isset($_GET['IdPizza'])) {
    $IdPizza = filter_input(INPUT_GET, "IdPizza");

    if ($IdPizza) {

        $sql = $pdo->prepare("DELETE FROM  pizzas WHERE IdPizza = :IdPizza");
        $sql->bindValue(":IdPizza", $IdPizza);
        $sql->execute();

        header("Location: Gerenciaralt.php");
        exit;
    }
} elseif (empty($_GET['IdPizza'])) {
    header("Location:Gerenciaralt.php");
    exit;
}
