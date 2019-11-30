<?php

    require_once "Database.php";

    class Professor extends Database {
        private $id;
        private $ra;
        private $nome;
        private $email;
        private $senha;
        private $tipo;

        public function getId() { return $this->id; }
        public function getRa() { return $this->ra; }
        public function getNome() { return $this->nome; }
        public function getEmail() { return $this->email; }
        public function getSenha() { return $this->senha; }
        public function getTipo() { return $this->tipo; }

        public function setId($valId) { $this->id = (int)$valId;  }

        public function setRa($valRa) {
            $this->ra = mysqli_real_escape_string(
                $this->conexao, $valRa);
        }

        public function setNome($valNome) {
            $this->nome = mysqli_real_escape_string(
                $this->conexao, $valNome);
        }

        public function setEmail($valEmail) {
            $this->email = mysqli_real_escape_string(
                $this->conexao, $valEmail);
        }

        public function setSenha($valSenha) {
            $this->senha = mysqli_real_escape_string(
                $this->conexao, $valSenha);
        }

        public function setTipo($valTipo) {
            $this->tipo = mysqli_real_escape_string(
                $this->conexao, $valTipo);
        }


        public function inserirProf() {
            $sql = "INSERT INTO professor (ra, nome, email, senha, tipo) VALUES ('{$this->ra}', '{$this->nome}','{$this->email}','{$this->senha}','{$this->tipo}')";
            $x = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $x;
        }

        public function lerProf() {
            $sql = "SELECT * FROM professor ORDER BY nome";
            $x = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $x;
        }

        public function lerUmProf() {
            $sql = "SELECT * FROM professor WHERE id = {$this->id}";
            $x = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $x;
        }

        public function atualizarProf() {
            $sql = "UPDATE professor SET ra = '{$this->ra}', nome = '{$this->nome}', email = '{$this->email}', senha = '{$this->senha}', tipo = '{$this->tipo}' WHERE id = {$this->id}";
            $x = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $x;
        }

        public function excluirProf() {
            $sql = "DELETE FROM professor WHERE id = {$this->id}";
            $x = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $x;
        }

        //Sha256
        public function codificarSenha($valSenha) {
            return hash("sha256", $valSenha);
        }


        //Login 
        public function buscarProf() {
            $sql = "SELECT * FROM professor WHERE ra = '{$this->ra}' AND senha = '{$this->senha}' ";
            $x = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $x;
        }

        public function verificarSenha($senhaNoForm, $senhaNoBanco) {
            if( $senhaNoForm == $senhaNoBanco ) {
                return $senhaNoBanco;
            } else {
                return $this->codificarSenha($senhaNoForm);
            }
        }
    }