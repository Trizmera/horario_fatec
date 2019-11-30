<?php   

    $id = $_GET['id'];

    require_once "../config/Professor.php";

    $professor = new Professor();
    $professor->setId($id);

    $professor->excluirProf();

    echo "<p class=\"mensagem\">Usuário excluído com sucesso!</p>";

    header("location:professores.php");