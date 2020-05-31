<?php

    class showData{
        function __construct(){
            $this->show();
        }

        private function show(){

            include '../conf/MySqlConf.php';

            if($dataBaseStatus){
                
                $result = $dbh->query("select * from email");

                $i = 0;

                foreach($result as $value){
                    ?>
                        <tr>
                            <th scope="row" class="text-muted">
                                <?php
                                    echo $i+= 1; ?>
                            </th>
                            <td class="text-primary">
                                <?php echo $value['remetente']; ?>
                            </td>
                            <td class="text-success">
                                <?php echo $value['destinatario']; ?>
                            </td>
                            <td>
                                <?php echo $value['assunto']; ?>
                            </td>
                            <td>
                                <?php echo strip_tags($value['mensagem']); ?>
                            </td>
                            <td>
                                <form action="../src/removeData.php">
                                    <button class="btn btn-danger" type="submit" value="<?php echo $value['id_email']; ?>" name="excluir">excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            }
            
        }
    }

?>