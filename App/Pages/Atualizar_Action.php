<?php
require_once("./../config/config.php");

$dado = [];
$pathfotoAtual = ''; // Inicializa com um valor padrão

// Verifica se o ID da pizza foi fornecido via GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['IdPizza'])) {
    $IdPizza = intval($_GET['IdPizza']);
    var_dump($IdPizza);
    

    if ($IdPizza) {
        $sql = $pdo->prepare('SELECT * FROM pizzas WHERE IdPizza = :IdPizza');
        $sql->bindValue(':IdPizza', $IdPizza, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch(PDO::FETCH_ASSOC);
            $pathfotoAtual = $dado['PathFoto'] ?? ''; // Obtendo o valor atual de PathFoto
        } else {
            echo "Pizza não encontrada.";
            header("Location: Gerenciaralt.php");
            exit;
        }
    }
}

// Processa o formulário se o método for POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-action'])) {
    if ($_POST['btn-action'] === 'Alterar') {
        $ValorPizza = floatval($_POST['Valor']);
        $_POST['Valor'] = floatval(str_replace(',','.', $_POST['Valor']));
        
        $_POST['Valor'] = floatval(number_format($_POST['Valor'],3,'.', ','));
       
        $ValorPizza =  floatval($_POST['Valor']);
        
        $ValorPizza = floatval(str_replace('-','', $ValorPizza));
        $ValorPizza = floatval(str_replace('+','',  $ValorPizza));
       
        $IdPizza = intval($_POST['IdPizza']);
        var_dump($IdPizza);

        
        $sql = $pdo->prepare('UPDATE pizzas SET NomePizza = :NomePizza, Valor = :Valor, Tamanho = :Tamanho, Descrição = :Descrição WHERE IdPizza = :IdPizza');
        $sql->bindValue(':IdPizza', $IdPizza);
        $sql->bindValue(':NomePizza', $_POST['NomePizza'], PDO::PARAM_STR);
        $sql->bindValue(':Valor', $ValorPizza); // Trate como string para garantir formatação correta
      
        $sql->bindValue(':Tamanho', $_POST['Tamanho'], PDO::PARAM_STR);
        $sql->bindValue(':Descrição', $_POST['Descrição'], PDO::PARAM_STR);
        //$sql->bindValue(':PathFoto', $pathfotoAtual, PDO::PARAM_STR); // Usando o valor atual de PathFoto
        
       
        $sql->debugDumpParams();
        
       
        var_dump($_POST['NomePizza']);
        var_dump( $_POST['Valor']);
        var_dump( $_POST['Tamanho']);
        var_dump( $_POST['Descrição']);
        
        try {
            $sql->execute();
            header("Location: Gerenciaralt.php");
            exit;
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    } elseif ($_POST['btn-action'] === "Voltar") {
        header("Location: Gerenciaralt.php");
        exit;
    }
}
?>

<form action="./Atualizar_Action.php" method="post">
    <div class="form-item">
        <label for="IdPizza">Id da Pizza</label>
        <input type="number" name="IdPizza" id="IdPizza" value="<?= isset($dado['IdPizza']) ? $dado['IdPizza'] : ''; ?>" readonly>
    </div>
    <div class="form-item">
        <label for="nome-pizza">Nome da Pizza:</label>
        <input type="text" name="NomePizza" id="nome-pizza" value="<?= isset($dado['NomePizza']) ? $dado['NomePizza'] : ''; ?>">
    </div>
    <div class="form-item">
        <label for="Valor">Valor R$:</label>
        <input type="text" name="Valor" id="valor-pizza" value="<?= isset($dado['Valor']) ? number_format($dado['Valor'], 2, ',', '.') : ''; ?>">
    </div>
    <div class="form-item">
        <label for="Tamanho">Tamanho:</label>
        <input type="text" name="Tamanho" id="tamanho-pizza" value="<?= isset($dado['Tamanho']) ? $dado['Tamanho'] : ''; ?>">
    </div>
    <div class="form-item">
        <label for="descricao-pizza">Descrição:</label>
        <textarea name="Descrição" id="descricao-pizza" cols="50" rows="10"><?= isset($dado['Descrição']) ? $dado['Descrição'] : ''; ?></textarea>
    </div>
    <div>
        <input type="submit" name="btn-action" value="Alterar">
        <input type="submit" name="btn-action" value="Voltar">
    </div>
</form>
