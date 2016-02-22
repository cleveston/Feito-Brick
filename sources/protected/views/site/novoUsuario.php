<?php
$this->pageTitle = Yii::app()->name . ' - Novo Usuário';

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
                <h3 style="margin: 0">Cadastro de Usuários</h3>
            </div>
            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'nome'); ?>
                <br>
                <?php echo $form->textField($model, 'nome', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'nome'); ?></span>
            </fieldset>

            <div style="clear: both"></div>
            <fieldset class="control-group" style="float: left">
                <br >
                <?php echo $form->labelEx($model, 'rg'); ?>
                <br>
                <?php
                $this->widget('CMaskedTextField', array(
                    'model' => $model,
                    'attribute' => 'rg',
                    'mask' => '9999999999',
                    'htmlOptions' => array('style' => 'width:200px')));
                ?>
                <span class="help-block"><?php echo $form->error($model, 'rg'); ?></span>
            </fieldset>
            <fieldset class="control-group" style="float: right">
                <br >
                <?php echo $form->labelEx($model, 'cpf'); ?>
                <br >
                <?php
                $this->widget('CMaskedTextField', array(
                    'model' => $model,
                    'attribute' => 'cpf',
                    'mask' => '999.999.999-99',
                    'htmlOptions' => array('style' => 'width:200px')));
                ?>
                <span class="help-block"><?php echo $form->error($model, 'cpf'); ?></span>
            </fieldset>
            <div style="clear: both"></div>
            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'datanasc'); ?>
                <br >
                <?php
                $this->widget('CMaskedTextField', array(
                    'model' => $model,
                    'attribute' => 'datanasc',
                    'mask' => '99/99/9999',
                    'htmlOptions' => array('style' => 'width:200px')));
                ?>            
                <span class="help-block"><?php echo $form->error($model, 'datanasc'); ?></span>
            </fieldset>
            <fieldset class="control-group" style="float: right">
                <br >
                <?php echo $form->labelEx($model, 'telefone'); ?>
                <br >
                <?php
                $this->widget('CMaskedTextField', array(
                    'model' => $model,
                    'attribute' => 'telefone',
                    'mask' => '(99)9999-9999',
                    'htmlOptions' => array('style' => 'width:200px')));
                ?>
                <span class="help-block"><?php echo $form->error($model, 'telefone'); ?></span>
            </fieldset>
            <div style="clear: both"></div>
            <br />

            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'estado'); ?>
                <br >
                <?php
                echo $form->dropdownlist($model, 'estado', array(
                    'AC' => 'AC',
                    'AL' => 'AL',
                    'AP' => 'AP',
                    'AM' => 'AM',
                    'BA' => 'BA',
                    'CE' => 'CE',
                    'DF' => 'DF',
                    'ES' => 'ES',
                    'GO' => 'GO',
                    'MA' => 'MA',
                    'MT' => 'MT',
                    'MS' => 'MS',
                    'MG' => 'MG',
                    'PA' => 'PA',
                    'PB' => 'PB',
                    'PR' => 'PR',
                    'PE' => 'PE',
                    'PI' => 'PI',
                    'RJ' => 'RJ',
                    'RN' => 'RN',
                    'RS' => 'RS',
                    'RO' => 'RO',
                    'RR' => 'RR',
                    'SC' => 'SC',
                    'SP' => 'SP',
                    'SE' => 'SE',
                    'TO' => 'TO'), array('empty' => '', 'style' => 'width:200px'));
                ?>
                <span class="help-block"><?php echo $form->error($model, 'estado'); ?></span>
            </fieldset>

            <fieldset class="control-group" style="float: right;">
                <br >
                <?php echo $form->labelEx($model, 'cidade'); ?>
                <br >
                <?php echo $form->textField($model, 'cidade', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'cidade'); ?></span>
            </fieldset>
            <div style="clear: both"></div>
            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'rua'); ?>
                <br >
                <?php echo $form->textField($model, 'rua', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'rua'); ?></span>
            </fieldset>

            <div style="clear: both"></div>
            <br />
            <fieldset class="control-group" style="float: left">
                <br >
                <?php echo $form->labelEx($model, 'email'); ?>
                <br >
                <?php echo $form->textField($model, 'email', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'email'); ?></span>
            </fieldset>
            <br />
            <br />
            <div style="clear: both"></div>
            <fieldset class="control-group" style="float: left;">
                <br >
                <?php echo $form->labelEx($model, 'senha'); ?>
                <br >
                <?php echo $form->passwordField($model, 'senha', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'senha'); ?></span>
            </fieldset>
            <fieldset class="control-group" style="float: right;">
                <br >
                <?php echo $form->labelEx($model, 'senhaConfirmacao'); ?>
                <br >
                <?php echo $form->passwordField($model, 'senhaConfirmacao', array('style' => 'width:200px')); ?>
                <span class="help-block"><?php echo $form->error($model, 'senhaConfirmacao'); ?></span>
            </fieldset>
            <div style="clear: both"></div>
            <div class="form-actions" style="width: 320px; float: right"> 
                <br />
                <button style="float: right" type="submit" class="button">Avançar   <i class="icon-arrow-right icon-white"></i></button>
                <br />
            </div>
            <br />
            <div style="clear: both"></div>
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