<?php
    require "../inc/cabecalho.php";

    $id = $_GET['id'];

    require_once "../config/Professor.php";

    $professor = new Professor();
    $professor->setId($id);

    $x = $professor->lerUmProf();

    $dados = mysqli_fetch_assoc($x);
?>

<section class="conteudo">
        <p class="breadcrumb">
            <a href="index.php">Inicio</a> /
            <a href="professores.php">Professores</a> /
            Atualizar
        </p>
        <hr>
        <h2>Atualizar Professor</h2>
        <form action="" method="post" id="form-atualizar" name="form-atualizar">
            <input type="hidden" name="id" value="<?=$dados['id']?>">
            <p>
                <label for="ra">RA:</label><br>
                <input type="text" id="ra" name="ra" value="<?=$dados['ra']?>" >
            </p>

            <p>
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" value="<?=$dados['nome']?>" >
            </p>

            <p>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?=$dados['email']?>" >
            </p>

            <p>
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="password" value="<?=$dados['senha']?>" >
            </p>

            <p>
                <label for="tipo">Tipo:</label><br>
                <select name="tipo" id="tipo" value="<?=$dados['tipo']?>">
                    <option value=""></option>
                    <option value="Concurso">Concurso</option>
                    <option value="Contrato">Contrato</option>
                    <option value="Outro">Outro</option>
                </select>
            </p>

            <button id="atualizar" name="atualizar">Atualizar Professor</button>
        </form>

<?php
    if( isset($_POST['atualizar'])) {
        if( !empty($_POST['ra']) || !empty($_POST['email']) || !empty($_POST['senha']) ) {

            $professor->setRa($_POST["ra"]);
            $professor->setNome($_POST["nome"]);
            $professor->setEmail($_POST["email"]);
            $professor->setTipo($_POST["tipo"]);
            $professor->setSenha($professor->verificarSenha($_POST['senha'], $dados['senha']));

            $professor->atualizarProf();

            header("location:professores.php");
        }
    }
?>
    </section>
<?php require "../inc/rodape.php"; ?>