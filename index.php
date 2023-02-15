<?php 
require 'config.php';

$lista_habitos = [];
$sql = $pdo->query("SELECT * FROM lista_habitos WHERE status = 'A'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <title>Lista Hábitos</title>
</head>
<body>
    
    <div class="center">
        <h1>Lista de Hábitos</h1>
        <hr>
        <p>Cadastre aqui os hábitos que você tem que vencer para melhorar sua vida!</p>
        <?php 
        if($sql->rowCount() > 0) {
            $lista_habitos = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table>
            <?php foreach($lista_habitos as $habito): ?>
                    <tr>
                        <td><?= $habito['id'];?></td>
                        <td><?= $habito['nome'];?></td>
                        <td>
                            <a href="vencer_habito.php?id=<?php echo $habito['id'];?>" class="vencer">Vencer</a>
                            <a href="desistir_habito.php?id=<?php echo $habito['id'];?>" class="desistir">Desistir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php 
        } else {
            ?>
            <p>Você não possui hábitos cadastrados!</p> 
            <p>Comece já a mudar sua vida!</p> 
            <?php
        }
            ?>
    
        <a class="novo_habito" href="novo_habito.php">Cadastrar Hábito</a>
    </div>

</body>
</html>















