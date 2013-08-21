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
    <form action="cadastrar" method="POST">
        
    <label for="nome">Nome: </label>
    <input type="text" name="nome" value="" /><br />
    
    <label for="email">E-mail: </label>
    <input type="text" name="email" value="" /><br />
    
    <label for="senha">Senha: </label>
    <input type="password" name="senha" value="" /><br />
    
    <input type="submit" value="Cadastrar" />
    <a href="<?php echo URL::base() . 'login'; ?>">Login</a>
</form>
</div>