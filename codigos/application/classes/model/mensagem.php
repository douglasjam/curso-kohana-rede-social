
<?php

class Model_Mensagem extends ORM {

    protected $_table_name = 'mensagens';
    
    protected $_belongs_to = array(
        'remetente' => array(
            'model' => 'usuario',
            'foreign_key' => 'usuario_id_rem',
        ),
        'destinatario' => array(
            'model' => 'usuario',
            'foreign_key' => 'usuario_id_dest',
        ));
    
    protected $_created_column = array('column' => 'datcad', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'datalt', 'format' => 'Y-m-d H:i:s');

    public function getPrimeiroNome() {
        return substr($this->nome, 0, strpos($this->nome, ' '));
    }

}

?>
