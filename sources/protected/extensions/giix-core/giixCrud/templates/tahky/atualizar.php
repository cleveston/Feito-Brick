<div class="well foto"  style="float: left;width: 720px;padding: 25px">
    <legend ><h2 style="font-size: 30px; color: #555"><?php echo '<?php'; ?> echo Yii::t('app', 'Atualizar') . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h2></legend>
    <?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>
</div>
<div style="clear: both"></div>