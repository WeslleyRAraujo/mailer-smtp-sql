<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
        if($historico == false){
            echo "<a class='navbar-brand text-warning' href='../index.php' title='HomePage'>";
        }else{
            echo "<a class='navbar-brand text-warning' href='index.php' title='HomePage'>";
        }
    ?>
    
        Mailer
    </a>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php
                    if(isset($index)){
                        include 'conf/MySqlConf.php';
                    }else{
                        include '../conf/MySqlConf.php';
                    }
                    
                    if($historico and $dataBaseStatus){
                        $result = $dbh->query("select * from email");
                        $total;
                        $i = 1;
                        $return_row = false;
                        foreach($result as $value){
                            $total = $i++;
                            $return_row = true;
                        }
                        if($return_row == false){
                            $total = 0;
                        }
                        echo "<a type='button' class='btn btn-primary' href='pages/history.php'>
                            Histórico <span class='badge badge-dark'>{$total}</span>
                            </a>"
                        ;
                    }
                ?>
                
            </li>
        </ul>
    </div>

    <span class="navbar-text pr-3">
    <?php
        if(isset($index)){
            include 'conf/MySqlConf.php';
        }else{
            include '../conf/MySqlConf.php';
        }
        

        if($dataBaseStatus){
            echo "<a class='text-success' title='Você está online'>ONLINE</a>";
        }else{
            echo "<a class='text-danger' title='Verifique se as credenciais do seu banco de dados está correta'>OFFLINE</a>";
        }
        ?>
    </span>
        
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal">
        Configuração
    </button>
        
    <div class="modal fade" id="modal" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>WIKI MAILER</h5>
                </div>
                <div class="modal-body">
                    <h4>Faça esta configuração antes de usar o MAILER</h4>

                    <p>
                        O MAILER é um projeto simples para enviar e-mail's, 
                        em localhost terá que ser feito uma alteração nas configurações de segurança do seu gmail 
                        ou cliente de e-mail para que ele dê acesso a aplicativos menos seguros, afinal, 
                        o seu localhost não é autenticado.
                    </p>

                    <p>Para o gmail ative a opção deste link: <a href="https://myaccount.google.com/lesssecureapps" target="_blank">https://myaccount.google.com/lesssecureapps</a>.</p>

                    <p>
                        O MAILER funciona com o protocolo SMTP (Simple Mail Transfer Protocol),
                        para saber mais sobre acesse o link:
                        <a href="https://en.wikipedia.org/wiki/Simple_Mail_Transfer_Protocol" target="_blank">
                            https://en.wikipedia.org/wiki/Simple_Mail_Transfer_Protocol
                        </a>
                    </p>
                    <hr>
                    <h4>STATUS <a class="text-danger">OFFLINE</a>: </h4>
                    <p> O status offline indica algum erro no arquivo <a class="text-danger">MySqlConf.php</a>, 
                    provavelmente a senha do seu banco não está correta.
                    </p>
                    <p>Verifique se a base de dados 'mailer' foi criada, caso não tenha sido 
                    execute o script da pasta <a class="text-primary">sql</a>, verifique também o usuário e 
                    o nome da base de dados caso tenha sido alterado.
                    </p>
                    
                    <p><strong>O MAILER É APENAS PARA FINS DIDÁTICOS.</strong></p>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</nav>