<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Principal extends Template_Padrao {

    public function action_index() {

        $id = Session::instance()->get('usuario');
        $usuario = ORM::factory('usuario', $id);

        $view = View::factory('principal');
        $view->set('usuario', $usuario);
        $view->render();


        $this->template->content = $view;
    }

}

// End Welcome
