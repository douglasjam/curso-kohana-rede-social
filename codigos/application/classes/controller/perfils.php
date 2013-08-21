<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Perfils extends Template_Padrao {

    public function action_index() {

        $this->action_listagem();
    }

    public function action_perfil() {

        $id = Session::instance()->get('usuario');

        $usuario = ORM::factory('usuario', $id);
        $mensagens = ORM::Factory('mensagem')
                ->where('usuario_id_rem', '=', $id)
                ->or_where('usuario_id_dest', '=', $id)
                ->order_by('datcad', 'asc')
                ->order_by('id', 'asc')
                ->find_all();

        $view = View::factory('perfil/meu');
        $view->set('usuario', $usuario);
        $view->set('mensagens', $mensagens);

        $this->template->content = $view;
    }

    public function action_ver() {

        $id = Request::current()->param('id');

        $usuario = ORM::factory('usuario', $id);
        $mensagens = ORM::Factory('mensagem')
                ->where('usuario_id_rem', '=', $id)
                ->or_where('usuario_id_dest', '=', $id)
                ->order_by('datcad', 'asc')
                ->order_by('id', 'asc')
                ->find_all();

        $view = View::factory('perfil/ver');
        $view->set('usuario', $usuario);
        $view->set('mensagens', $mensagens);

        $this->template->content = $view;
    }

    public function action_listagem() {

        $usuarios = ORM::Factory('usuario')
                ->find_all();

        $view = View::factory('perfil/listagem');
        $view->set('usuarios', $usuarios);

        $this->template->content = $view;
    }

    public function action_excluir() {

        $id = $this->request->param('id', NULL);
        $mensagem = ORM::Factory('mensagem', $id);
        $mensagem->delete();
        Session::instance()->set('mensagem', 'Mensagem excluída com sucesso!');

        Request::$current->redirect($this->request->referrer());
    }

    public function action_comentar() {

        $id = Session::instance()->get('usuario');
        $usuario = ORM::Factory('usuario', $id);

        if ($_POST['mensagem'] == '') {
            Session::instance()->set('mensagem', 'A mensagem não pode ser em branco');
        } else {

            $mensagem = ORM::Factory('mensagem');
            $mensagem->remetente = $usuario;
            $mensagem->destinatario = ORM::factory('usuario', $_POST['id_destinatario']);
            $mensagem->mensagem = $_POST['mensagem'];
            $mensagem->save();

            Session::instance()->set('mensagem', 'Mensagem enviada com sucesso!');
        }

        Request::$current->redirect($this->request->referrer());
    }

}