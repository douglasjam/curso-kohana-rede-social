<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?php echo I18n::$lang ?>">
    <head>
        <title><?php echo $title ?></title>
        <?php
        foreach ($styles as $file => $type)
            echo HTML::style($file, array('media' => $type)), PHP_EOL;
        ?>
        <?php
        foreach ($scripts as $file)
            echo HTML::script($file), PHP_EOL;
        ?>
    </head>
    <body>
        <div id="geral">
            <div id="topo">
                <?php echo html::image('media/imagens/logo.png') ?>
                <div id="login">
                    <?php
                    if (Session::instance()->get('usuario') == NULL)
                        echo html::anchor (URL::base() . 'login', 'Entrar');
                    else
                        echo html::anchor(URL::base() . 'logout', 'Sair');
                    ?>
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li><?php echo html::anchor(URL::base(),'Inicio'); ?></li>
                    <li><?php echo html::anchor(URL::base() . 'conta','Minha Conta'); ?></li>
                    <li><?php echo html::anchor(URL::base() . 'perfil','Meu Perfil'); ?></li>
                    <li><?php echo html::anchor(URL::base() . 'perfils','Outros Perfis'); ?></li>
                </ul>
            </div>
            <div id="conteudo">		
<?php echo $content ?>			
            </div>
            <div id="rodape"> 
                Curso Kohana © UITBOOK - Aplicação de Rede Social<br />
            </div>
    </body>
</html>