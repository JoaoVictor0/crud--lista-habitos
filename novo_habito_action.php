<?php 
require 'config.php';
$name = filter_input(INPUT_POST, 'name');

if($name) {
    // VERIFICANDO SE JÁ EXISTE O NOME DO HÁBITO CADASTRADO
    $sql = $pdo->prepare("SELECT * FROM lista_habitos WHERE nome = :nome");
    $sql->bindValue(':nome', $name);
    $sql->execute();

    if($sql->rowCount() === 0) {

        $sql = $pdo->prepare("INSERT INTO lista_habitos (nome) VALUES (:nome)");
        $sql->bindValue(':nome', $name);
        $sql->execute();

        header("Location: index.php");
        exit;

    } else {
        header("Location: novo_habito.php");
        exit;
    }
} else {
    header("Location: novo_habito.php");
    exit;
}