<?php


require_once "./config/config.php";
require "./../App/Pages/Partials/Header.php";
$sql = $pdo -> query("SELECT * FROM pizzas");
$sql -> execute();
if($sql-> rowCount()>0) 
{$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <section class="pizza-cards">
    <?php
    foreach($dados as $key => $value):?>
    
        
        <div class="cards-area__card">
                        <img class="cards-area__image" src="<?php echo $value['PathFoto'];?> " alt="Imagem da pizza muçarela">
                        <button class="cards-area__botao-add">
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                        <span class="cards-area__preco"><?php echo $value['Valor']; ?></span>
                        <span class="cards-area__titulo"><?php echo $value['NomePizza']; ?></span>
                        <p class="cards-area__descricao"><?php echo $value['Descrição'] ;?></p>
                    </div>
                    
    
        
     <?php endforeach; ?>
    
    
    </section>
    


 <?php
}
?>
   



<?php
require "./../App/Pages/Partials/Carrinho.php";

require "./../App/Pages/Partials/Footer.php";
require "./../App/Pages/Partials/Modal.php";
?>



