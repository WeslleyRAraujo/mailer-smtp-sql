<?php

    class saveData{

        // metodo construtor
        function __construct($remetente, $destinatario, $assunto, $mensagem){

            $this->remetente = $remetente;
            $this->destinatario = $destinatario;
            $this->assunto = $assunto;
            $this->mensagem = $mensagem;

            $this->save();
        }

        public $remetente;
        public $destinatario;
        public $assunto;
        public $mensagem;

        // metodo para salvar as informações
        public function save(){
            include_once '../conf/MySqlConf.php'; // carregando as configurações do mysql

            $dbh->exec("insert into email(remetente, destinatario, assunto, mensagem) 
            values('{$this->remetente}','{$this->destinatario}','{$this->assunto}','{$this->mensagem}')");
        }
    }

?>