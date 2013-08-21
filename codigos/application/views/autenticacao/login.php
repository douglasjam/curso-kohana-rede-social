<div id="titulo">
    Login
</div>
<div id="corpo">
    <?php
    if (Session::instance()->get('mensagem') != NULL) {
        echo '<div id="notificacao">';
        echo Session::instance()->get_once('mensagem');
        echo '</div>';
    }
    ?>
    <form action="login" method="POST">
        
        <label for="email">E-mail: </label>
        <input type="text" name="email" value="" /><br />
        
        <label for="senha">Senha: </label>
        <input type="password" name="senha" value="" /><br />
        
        <input type="submit" value="Login" />
        <a href="<?php echo URL::base() . 'cadastrar'; ?>">Cadastre-se</a>
    </form>
</div>