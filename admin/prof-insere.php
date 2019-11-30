<?php require "../inc/cabecalho.php"; ?>

    <section class="conteudo">
        <p class="breadcrumb">
            <a href="index.php">Inicio</a> /
            <a href="professores.php">Professores</a> /
            Cadastrar
        </p>
        <hr>
        <h2>Cadastrar Professor</h2>
        <form action="" method="post" id="form-inserir" name="form-inserir">
            <p>
                <label for="ra">RA:</label><br>
                <input type="text" id="ra" name="ra" >
            </p>

            <p>
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" >
            </p>

            <p>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" >
            </p>

            <p>
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="password" >
            </p>

            <p>
                <label for="tipo">Tipo:</label><br>
                <select name="tipo" id="tipo">
                    <option value="Concurso">Concurso</option>
                    <option value="Contrato">Contrato</option>
                    <option value="Outro">Outro</option>
                </select>
            </p>

            <button id="inserir" name="inserir">Cadastrar Professor</button>
        </form>

<?php 
    if( isset($_POST['inserir']) ){
        if( !empty($_POST['ra']) || !empty($_POST['email']) || !empty($_POST['senha']) ){
            require_once "../config/Professor.php";
            
            $professor = new Professor();

            $professor->setRa($_POST["ra"]);
            $professor->setNome($_POST["nome"]);
            $professor->setEmail($_POST["email"]);
            $professor->setSenha($professor->codificarSenha($_POST["senha"]));
            $professor->setTipo($_POST["tipo"]);
            

            $professor->inserirProf();

            header("location:professores.php");
            
        } else {

            echo "<p class=\"mensagem\">Preencha os campos obrigatórios!</p>";
            
        }
    }
?>

    </section>

<?php require "../inc/rodape.php"; ?>