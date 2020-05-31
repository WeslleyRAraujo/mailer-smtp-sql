<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAILER</title>
    <?php 
        include_once 'assets/bootstrap.php';
    ?>
</head>
<body class="bg-light">
    
    <?php 
    $historico = true; // variavel responsavel por indicar se o botão de histórico irá ou não aparecer
    $index = true; // variavel que indica retorno para o index.php
    include_once 'assets/navbar.php';  // incluindo a navbar
    include 'conf/MySqlConf.php'; //

    /**
     * caso a banco de dados retornar true
     * os inputs e botões ficarão disponiveis
     * caso contrario
     * os inputs e botões ficarão indisponiveis
     */
    if($dataBaseStatus){
        $input = null;
        $button = null;
    }else{
        $input = 'readonly';
        $button = 'disabled';
    }
    ?>
    <div class="container-fluid p-5">

    <h5 class="text-muted pb-4 text-uppercase">Preencha o formulário para enviar um e-mail</h5>
        
        <form class="needs-validation" method="POST" action="src/email.php">
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="text-primary">Remetente</label>
                    <input type="email" class="form-control" name="remetente" placeholder="you@gmail.com" required <?php echo $input; ?>>
                    <small class="form-text text-muted">Digite o e-mail que será usado para enviar a mensagem.</small>
                </div>
                <div class="form-group col-md-6">
                    <label class="text-success">Destinatário</label>
                    <input type="email" class="form-control" name="destinatario" placeholder="friend@gmail.com" required <?php echo $input; ?>>
                    <small class="form-text text-muted">Digite o e-mail que irá receber a mensagem.</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="text-primary">Senha</label>
                    <input type="password" class="form-control" name="senha" required <?php echo $input; ?>>
                    <small class="form-text text-muted">senha do seu e-mail.</small>
                </div>
                <div class="form-group col-md-6">
                    <label class="text-success">Assunto</label>
                    <input type="text" class="form-control" name="assunto" placeholder="Digite algo legal :)" required <?php echo $input; ?>>
                    <small class="form-text text-muted">assunto do e-mail.</small>
                </div>
            </div>

            <div class="form-group">
                <label class="text-success">Mensagem</label>
                <textarea class="form-control" name="mensagem" maxlength="600" required <?php echo $input; ?>></textarea>
                <small class="form-text text-muted" required>
                    Digite a mensagem que irá ser enviada.
                    <div class="text-info">Se digitar em tags html será enviado conforme a formatação, 
                    caso não seja possível enviar com formatação html será enviado apenas o texto.</div>
                </small>
            </div>

            <button type="submit" class="btn btn-success" <?php echo $button; ?>>Enviar</button>
        </form>
    </div>
</body>
</html>