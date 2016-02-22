<div class="well foto"  style="float: left;width: 720px;padding: 25px">
    <legend >
        <h2 style="font-size: 30px; color: #555"><?php echo '<?php'; ?> echo Yii::t('app', 'Novo') . ' ' . GxHtml::encode($model->label()); ?></h2></legend>
    <?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>  
</div>
<div style="clear: both"></div>
