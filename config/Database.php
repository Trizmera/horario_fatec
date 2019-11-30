<?php
class Database {
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;

    protected $conexao;

    public function __construct(){
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "horario_fatec";

        $this->conexao = mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->senha,
            $this->banco
        );
        if( $this->conexao ){
            mysqli_set_charset($this->conexao, "utf8");
        } else {
            die("Erro: " .mysqli_connect_error());
        }
    }

    public function __destruct(){
        mysqli_close($this->conexao);
    }
}