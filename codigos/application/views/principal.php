<div id="titulo">
    Principal
</div>
<div id="corpo">
    <?php
    if (Session::instance()->get('mensagem') != NULL) {
        echo '<div id="notificacao">';
        echo Session::instance()->get_once('mensagem');
        echo '</div>';
    }
    ?>
    Bem vindo <?php echo $usuario->nome; ?>.<br/><br/>
    Seu último acesso foi <?php echo $usuario->ultimoAcesso; ?>
</div>