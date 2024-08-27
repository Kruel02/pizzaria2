<?php
require_once("./../config/config.php");
$sql = $pdo -> query("SELECT * FROM pizzas");
$sql -> execute();
if($sql-> rowCount()>0) 
{$dados = $sql->fetchAll(PDO::FETCH_ASSOC);


}
    ?>




<table id="tabela-gerenciar">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Tamanho</th>
        <th>Descricao</th>
        <th>Ações</th>
    </tr>

    <?php  
    
    foreach($dados as $key => $Value):?>
    <tr>
    <td><?php echo (int)$Value['IdPizza']?></td>
       <?php var_dump($Value['IdPizza'])?> 
        <td><?php echo $Value['NomePizza']?></td>
        <td><?php echo $Value['Valor']?></td>
        <td><?php echo $Value['Tamanho']?></td>
        <td><img src='<?php  echo $value['PathFoto'] ?>' alt="Imagem da pizza muçarela"></td>
        <td><?php echo $Value['Descrição']?></td>
        <td>
            <a href="./Atualizar_Action.php?IdPizza=<?php echo $Value['IdPizza']?>">Editar</a>
            <span>|</span>
            <a href="./Excluir_Action.php?IdPizza=<?php echo $Value['IdPizza']?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach;?>
    
</table>
