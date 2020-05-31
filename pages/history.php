<?php include_once '../assets/bootstrap.php';?>
<?php 
    $historico = false; // definindo que o botão histórico não deve aparecer 
    include_once '../assets/navbar.php'; // incluindo a navbar
?>

<div class="container-fluid p-0 mb-0 col-12 shadow-sm">
    <h4 class="text-muted text-uppercase p-3">histórico de envio</h4>

    <div class="table-responsive-xl">
        <table class="table table-striped table-hover ">
            <thead>
                <tr class="bg-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Remetente</th>
                    <th scope="col">Destinatário</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Mensagem</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include_once '../src/showData.php'; // classe showData
                $show = new showData(); // executando o metodo construtor;
            ?>
            </tbody>
        </table>
    </div>
</div>