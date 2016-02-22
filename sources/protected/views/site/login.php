<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Entrar';
?>
<div class="wrapper">
    <div class="border"></div>
    <br />
    <article>
        <div class="page-header" style="margin-bottom: 10px">
            <h3 style="margin: 0">Entrar</h3>
        </div>
        <br>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('style' => 'width:300px')
                ));
        ?>
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
        <br>
        <br>
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
        <br>
        <br>
        <div class="form-actions" style="width: 320px; float: right"> 
            <br />
            <button style="float: right" type="submit" class="button">Entrar   <i class="icon-arrow-right icon-white"></i></button>
            <br />
        </div>
        <div style="clear: both"></div>
        <?php $this->endWidget(); ?>
        <div style="clear: both"></div>
    </article>
    <aside class="sidebar">
        <h3>Cafeteira Elétrica</h3>
        <img src="images/cafe.jpg" width="280" alt="" />
        <p>Nada melhor do que um cafezinho de manhã cedo, ou para acompanhar o lanche do final da tarde. Mas se você está sempre na famosa "correria", essa cafeteira é sua parceira para sempre lhe servir um café quentinho.
            Com a Cafeteira TSK 223 NKS você terá um café pronto em minutos
            <a href="" class="right" style="padding-top:7px"><strong>Continue Lendo &raquo;</strong></a></p>
    </aside>
    <div class="border2"></div>
</div>