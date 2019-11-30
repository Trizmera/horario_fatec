<?php require "../inc/cabecalho.php"; ?>

<section class="conteudo">
            <p class="breadcrumb"><a href="index.php">Home</a> / Usuários</p>
            <hr>
            
            <h2>Professores</h2>
            <p>Administração de usuários.</p>
            <p><a href="prof-insere.php" class="inserir">Inserir novo usuário</a></p>
            
            <table>
                <thead>
                    <tr>
                        <th>RA:</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th colspan="2">Operações</th>
                    </tr>
                </thead>

                <tbody>

<?php 
    require_once "../config/Professor.php";

    $professor = new Professor();

    $x = $professor->lerProf();

    while($dados = mysqli_fetch_assoc($x)){
?>
                <tr>
                    <td><?=$dados["ra"]?></td>
                    <td><?=$dados["nome"]?></td>
                    <td><?=$dados["email"]?></td>
                    <td><?=$dados["tipo"]?></td>
                    <td>
                        <a class="atualizar" href="prof-atualiza.php?id=<?=$dados['id']?>" >
                        Atualizar
                        </a>
                    </td>
                    <td>
                        <a class="excluir" href="prof-exclui.php?id=<?=$dados['id']?>" >
                        Excluir
                        </a>
                    </td>
                </tr>

<?php
    }
?>
            </tbody>
        </table>
    </section>

<?php require "../inc/rodape.php"; ?>