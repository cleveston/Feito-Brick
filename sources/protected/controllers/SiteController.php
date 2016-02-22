<?php

class SiteController extends GxController {

    public function actionIndex() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actionSobre() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('sobre');
    }

    public function actionProdutos() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('produtos');
    }

    public function actionProduto1() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('produto1');
    }

    public function actionProduto2() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('produto2');
    }

    public function actionProduto3() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('produto3');
    }

    public function actionProduto4() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('produto4');
    }

    public function actionNovoUsuario() {
        $form = new novoUsuarioForm();
        $this->performAjaxValidation($form, 'usuario-form');

        if (isset($_POST['novoUsuarioForm'])) {

            $form->attributes = $_POST['novoUsuarioForm'];

            if ($form->validate()) {
                $usuario = new Usuario();

                $usuario->nome = strip_tags($form->nome);
                $usuario->datanasc = $form->datanasc;
                $usuario->rg = $form->rg;
                $usuario->cpf = $form->cpf;
                $usuario->email = strip_tags($form->email);
                $usuario->senha = md5($form->senha);
                $usuario->estado = strip_tags($form->estado);
                $usuario->cidade = strip_tags($form->cidade);
                $usuario->rua = strip_tags($form->rua);
                $usuario->telefone = $form->telefone;

                if ($usuario->save()) {
                    $model = new LoginForm();
                    $model->username = $usuario->email;
                    $model->password = $form->senha;

                    if ($model->login()) {
                        Yii::app()->user->setFlash('success', 'Sucesso! Seu Código Êxodo foi enviado para seu e-mail.');
                        $this->redirect(Yii::app()->createUrl('usuario/meusDados'), false);
                    }
                } else
                    $this->render('novoUsuario', array('model' => $form));
            }
        } else {
            $this->render('novoUsuario', array('model' => $form));
        }
    }

    public function actionMeusProdutos() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('meusProdutos');
    }

    public function actionNovoProduto() {
        $form = new novoProdutoForm();
        $this->performAjaxValidation($form, 'produto-form');
        if (isset($_POST['novoUsuarioForm'])) {
            
        } else {
            $this->render('novoProduto', array('model' => $form));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /*
     * Displays the contact page
     */

    public function actionContato() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionEntrar() {
        $model = new LoginForm;

// if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

// collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
// validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
// display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionSair() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}