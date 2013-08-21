
<?php

class Model_Usuario extends ORM {

    protected $_table_name = 'usuarios';
    
    protected $_has_many = array(
        'mensagens' => array(
            'model' => 'mensagem',
            'foreign_key' => 'usuario_id_dest',
        ),
    );
    
    protected $_created_column = array('column' => 'datcad', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'datalt', 'format' => 'Y-m-d H:i:s');

    public function getPrimeiroNome() {
        return substr($this->nome, 0, strpos($this->nome, ' '));
    }
    
    public function isValid(){
        
        $qtde = ORM::Factory('usuario')
                ->where('email', '=', $this->email)
                ->find_all()
                ->count();
        if($qtde >= 2)
            return false;
        
        return true;
    }

}

?>
