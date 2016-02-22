<div class="well foto"  style="float: left;width: 720px;padding: 25px">
    <h2 style="font-size: 30px; color: #555; margin-bottom: 15px"><?php echo '<?php'; ?> echo Yii::t('app', 'Ver') . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h2>
    <div class="form-actions" style="margin: 0 0 10px 0" >
        <div style="float: left">
            <a href="<?php echo '<?php echo Yii::app()->createUrl(\'administracao/' . $this->class2name($this->modelClass) . '/index\') ?>'; ?>" class="btn btn-small"><strong><i class="icon-chevron-left"></i>  Todas <?php echo $this->class2name($this->modelClass) ?></strong></a>   
        </div>
        <div style="clear: both"></div>
    </div>
    <div style="width: 400px">
        <?php echo "<?php"; ?> $this->widget('ext.bootstrap.widgets.BootDetailView',array(
        'data'=>$model,
        'nullDisplay'=>'Vazio',
        'attributes'=>array(
        <?php
        foreach ($this->tableSchema->columns as $column)
            echo $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n";
        ?>
        ),
        )); ?>
        <?php foreach (GxActiveRecord::model($this->modelClass)->relations() as $relationName => $relation): ?>
            <?php if ($relation[0] == GxActiveRecord::HAS_MANY || $relation[0] == GxActiveRecord::MANY_MANY): ?>

                <h3><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relationName; ?>')); ?></h3>
                <table style="max-width: 760px" class="table table-condensed table-bordered">
                    <tbody style="width: 760px">
                        <?php echo "<?php\n"; ?>
                        foreach($model-><?php echo $relationName; ?> as $relatedModel) {
                        echo GxHtml::openTag('tr');
                        echo GxHtml::openTag('td', array('style'=>'width:760px'));
                        echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('<?php echo strtolower($relation[1][0]) . substr($relation[1], 1); ?>/ver', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
                        echo GxHtml::closeTag('td');
                        echo GxHtml::closeTag('tr');
                        }
                        <?php echo '?>'; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>