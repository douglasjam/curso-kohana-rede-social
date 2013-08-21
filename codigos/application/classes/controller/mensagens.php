<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Mensagens extends Template_Padrao {

    public function action_index() {

        $mensagens = ORM::factory('mensagem')
                ->find_all();

        $this->template->content = var_dump($mensagens);
    }
}