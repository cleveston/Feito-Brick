<?php
$this->pageTitle = Yii::app()->name . ' - Novo Produto';

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'usuario-form',
    'htmlOptions' => array('style' => 'padding-bottom: 3px'),
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'focus' => array($model, 'nome'),
    'htmlOptions' => array('style' => 'margin:0'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'inputContainer' => 'fieldset',
        'validatingCssClass' => 'warning',
        'errorCssClass' => 'error',
        'successCssClass' => 'success',
        'hideErrorMessage' => false,
    ),
        ));
?>
<div class="wrapper">
    <div class="border"></div>
    <br />
    <article>
        <Div  style="width: 500px">
            <div class="page-header" style="margin-bottom: 10px">
                <h3 style="margin: 0">Cadastro de Produto</h3>
            </div>
            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'nome'); ?>
                <br>
                <?php echo $form->textField($model, 'nome', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'nome'); ?></span>
            </fieldset>

            <fieldset class="control-group" style="float: right;">
                <br >
                <?php echo $form->labelEx($model, 'cat'); ?>
                <br >
                <?php echo $form->textField($model, 'cat', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'cat'); ?></span>
            </fieldset>
            <div style="clear: both"></div>
            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'preco'); ?>
                <br >
                <?php echo $form->textField($model, 'preco', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'preco'); ?></span>
            </fieldset>

            <div style="clear: both"></div>
            <br />
            <fieldset class="control-group" style="float: left">
                <br >
                <?php echo $form->labelEx($model, 'desc'); ?>
                <br >
                <?php echo $form->textArea($model, 'desc', array('style' => 'width:500px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'desc'); ?></span>
            </fieldset>
            <br />
            <button style="float: right" type="submit" class="button">Avançar   <i class="icon-arrow-right icon-white"></i></button>

            <div style="clear: both"></div>
            <br/>
            <?php $this->endWidget(); ?>
        </div>
    </article>
    <aside class="sidebar">
        <h3>Play Station 4</h3>
        <img src="images/play.jpg" width="280" alt="" />
        <p>Fotos de um suposto protótipo do controle do novo console de videogames PlayStation 4 (PS4),
            que deve ser apresentado pela Sony na próxima semana, vazaram na internet, informou o site The Verge nesta quinta-feira (14).
            <a href="" class="right" style="padding-top:7px"><strong>Continue Lendo &raquo;</strong></a></p>
    </aside>

</div>
<br />