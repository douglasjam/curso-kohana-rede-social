<div id="titulo">
    Meu Perfil
</div>
<div id="corpo">
    
     <?php
    if (Session::instance()->get('mensagem') != NULL) {
        echo '<div id="notificacao">';
        echo Session::instance()->get_once('mensagem');
        echo '</div>';
    }
    ?>
    
    <b>Nome: </b> <?php echo $usuario->nome; ?><br />
    <b>E-mail: </b><?php echo $usuario->email; ?><br />
    <b>Mensagens</b>

    (Exibindo <?php echo $usuario->mensagens->find_all()->count(); ?> mensagens)
    <br /><br />

    <table>
        <thead>
        <th width="100">Data</th>
        <th width="100">De</th>
        <th width="100">Para</th>
        <th>Mensagem</th>
        <th width="100">Ação</th>
        </thead>
        <?php
        $i = 0;
        foreach ($mensagens as $mensagem) {
            $i++;
            ?>
            <tbody>
                <tr class="<?php echo $i % 2 == 0 ? "impar" : "par"; ?>">
                    <td><?php echo $mensagem->datcad; ?></td>
                    <td><?php echo html::anchor(URL::base() . 'perfils/ver/' . $mensagem->remetente, $mensagem->remetente->getPrimeiroNome()); ?></td>
                    <td><?php echo html::anchor(URL::base() . 'perfils/ver/' . $mensagem->remetente, $mensagem->destinatario->getPrimeiroNome()); ?></td>
                    <td><?php echo $mensagem->mensagem; ?></td>
                    <td class="center"><?php echo html::anchor(URL::base() . 'perfil/excluir/' . $mensagem->id, 'Excluir'); ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>

