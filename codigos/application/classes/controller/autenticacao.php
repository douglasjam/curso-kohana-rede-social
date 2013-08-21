<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Autenticacao extends Template_Padrao {

    public function action_login() {

        // verifica se o usuário está logado ou se o posto é nulo
        if (Session::instance()->get('usuario') != NULL) {

            // Já logado vai para index
            $this->request->redirect(URL::base());
        } else if (!$_POST) {

            // Nao logado e sem POST, exibe form
            $view = View::Factory('autenticacao/login');
            $this->template->content = $view;
        } else {

            // Não logado e POST submetido, valida login
            $email = $_POST['email'];

            $usuario = ORM::Factory('usuario')
                            ->where('email', '=', $email)
                            ->where('senha', '=', $_POST['senha'])->find();

            if ($usuario->id) {
                
                // atualiza o ultimo acesso
                $usuario->ultimoAcesso = date('Y-m-d H:i:s');
                $usuario->save();
                
                Session::instance()->set('usuario', $usuario->id);
                $this->request->redirect(URL::base());
            } else {
                Session::instance()->set('mensagem', 'E-mail ou senhas inválidos!');
                $this->request->redirect(URL::base() . 'login');
            }
        }
    }

    public function action_logout() {

        if (Session::instance()->get('usuario') != NULL) {
            // TODO: Adicionar no log que o usuário saiu
            Session::instance()->destroy();
            Session::instance()->set('mensagem', 'Usuário desconectado!');
        }

        $this->request->redirect(URL::base() . 'login');
    }

    public function action_cadastrar() {

        // verifica se o usuário está logado ou se o posto é nulo
        if (Session::instance()->get('usuario') != NULL) {

            // Já logado vai para index
            $this->request->redirect(URL::base());
        } else if (!$_POST) {

            // Nao logado e sem POST, exibe form
            $view = View::Factory('autenticacao/cadastrar');
            $this->template->content = $view;
        } else {

            $usuario = ORM::Factory('usuario');
            $usuario->values($_POST);

            // verifica se usuaário é válido
            if (!$usuario->isValid()) {
                Session::instance()->set('mensagem', 'Este endereço de e-mail já está sendo usado!');
                $this->request->redirect(URL::base() . 'cadastrar');
            } else {

                // dados ok
               
                $usuario->save();

                Session::instance()->set('mensagem', 'Usuário cadastrado com sucesso!');
                $this->request->redirect(URL::base() . 'login');
            }
        }
    }

}
