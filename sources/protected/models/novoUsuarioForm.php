<?php

class novoUsuarioForm extends CFormModel {

    public $nome;
    public $datanasc;
    public $rg;
    public $cpf;
    public $telefone;
    public $email;
    public $senha;
    public $senhaConfirmacao;
    public $rua;
    public $cidade;
    public $estado;

    public function rules() {
        return array(
            array('nome, datanasc, email, rg, cpf, senha, senhaConfirmacao, rua, cidade, estado', 'required', 'message' => 'Preencha este campo.'),
            array('email', 'email', 'message' => '{attribute} inválido'),
            array('rg, cpf, telefone', 'safe'),
            array('nome, rua, cidade', 'length', 'max' => '254', 'tooShort' => 'Máximo 200 carácteres'),
            array('estado', 'length', 'max' => '2', 'tooShort' => 'Minímo 2 caracteres'),
            array('datanasc', 'date', 'message' => '{attribute} inválido', 'format' => 'dd/mm/yyyy'),
            array('senha', 'length', 'min' => '4', 'tooShort' => 'Mínimo 4 caracteres'),
            array('senhaConfirmacao', 'compare', 'compareAttribute' => 'senha', 'message' => '{attribute} não confere'),
        );
    }

    public function attributeLabels() {
        return array(
            'nome' => 'Nome Completo',
            'idpadrinho' => 'Código do Padrinho',
            'datanasc' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'rg' => 'RG',
            'cpf' => 'CPF',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'email' => 'E-mail',
            'senha' => 'Senha',
            'senhaConfirmacao' => 'Confirmação de Senha',
            'rua' => 'Logradouro',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'num' => 'Número',
            'complemento' => 'Complemento',
            'cep' => 'CEP',
            'banco' => 'Banco',
            'agencia' => 'Agência',
            'conta' => 'Conta'
        );
    }

}
