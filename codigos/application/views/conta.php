<div id="titulo">
    Conta
</div>
<div id="corpo">
    <?php
    if (Session::instance()->get('mensagem') != NULL) {
        echo '<div id="notificacao">';
        echo Session::instance()->get_once('mensagem');
        echo '</div>';
    }
    ?>
    <form action="conta/alterar" method="POST">

        <label for="id">ID: </label>
        <input type="text" name="id" value="<?php echo $usuario->id; ?>"  disabled /><br />

        <?php
        echo form::label('nome', 'Nome: ');
        echo form::input('nome', $usuario->nome) . '<br />';

        echo form::label('email', 'E-mail: ');
        echo form::input('email', $usuario->email) . '<br />';

        echo form::label('senha', 'Senha: ');
        echo form::password('senha', $usuario->senha) . '<br />';

        echo form::submit('alterar', 'Alterar');

        echo form::close();
        ?>
</div>