<div id="titulo">
    Usuários
</div>
<div id="corpo">

    <?php
    if (Session::instance()->get('mensagem') != NULL) {
        echo '<div id="notificacao">';
        echo Session::instance()->get_once('mensagem');
        echo '</div>';
    }
    ?>

    Exibindo <?php echo $usuarios->count(); ?> usuários
    <table>
        <thead>
        <th>Nome</th>
        <th width="100">Ação</th>
        </thead>
        <?php
        $i = 0;
        foreach ($usuarios as $usuario) {
            $i++;
            ?>
            <tbody>
                <tr class="<?php echo $i % 2 == 0 ? "impar" : "par"; ?>">
                    <td><?php echo $usuario->nome; ?></td>
                    <td class="center"><?php echo html::anchor(URL::base() . 'perfils/ver/' . $usuario->id, 'Ver Perfil'); ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>

