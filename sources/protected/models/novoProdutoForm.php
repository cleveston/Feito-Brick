<?php

class novoProdutoForm extends CFormModel {

    public $nome;
    public $cat;
    public $desc;
    public $preco;

    public function rules() {
        return array(
            array('nome, cat', 'required', 'message' => 'Preencha este campo.'),
            array('desc, preco, telefone', 'safe'),
        );
    }

    public function attributeLabels() {
        return array(
            'nome' => 'Nome',
            'desc' => 'Descrição',
            'cat' => 'Categoria',
            'preco' => 'Preço'
        );
    }

}
