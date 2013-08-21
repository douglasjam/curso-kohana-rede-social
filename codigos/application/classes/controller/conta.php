<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Conta extends Template_Padrao {

    public function action_index() {

        $id = Session::instance()->get('usuario');
        $usuario = ORM::factory('usuario', $id);

        $view = View::factory('conta');
        $view->set('usuario', $usuario);

        $this->template->content = $view;
    }

    public function action_alterar() {

        $id = Session::instance()->get('usuario');
        $usuario = ORM::Factory('usuario', $id);

        unset($_POST['id']);

        $usuario->values($_POST);
        $usuario->save();

        Session::instance()->set('mensagem', 'Conta alterada!');
        $this->request->redirect(URL::base() . 'conta');
    }

}