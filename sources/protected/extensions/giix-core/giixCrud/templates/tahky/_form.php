<div style="width: 400px">

    <?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

    <?php echo '<?php '; ?>
    $form = $this->beginWidget('GxActiveForm', array(
    'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
    'enableAjaxValidation' => <?php echo $ajax; ?>,
    'clientOptions' => array(
    'inputContainer' => 'fieldset',
    'validatingCssClass' => 'warning',
    'errorCssClass' => 'error',
    'successCssClass'=>'success',
    'hideErrorMessage'=>false,
    ),

    ));
    <?php echo '?>'; ?>
    <?php foreach ($this->tableSchema->columns as $column): ?>
        <?php if (!$column->autoIncrement): ?>
            <fieldset class="control-group">
                <?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
                <?php echo "<?php " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
                <span class="help-inline"><?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?></span>
            </fieldset>       
        <?php endif; ?>
    <?php endforeach; ?>
    <!--
    <?php foreach ($this->getRelations($this->modelClass) as $relation): ?>
        <?php if ($relation[1] == GxActiveRecord::HAS_MANY || $relation[1] == GxActiveRecord::MANY_MANY): ?>
                                                                      <label><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relation[0]; ?>')); ?></label>
            <?php echo '<?php ' . $this->generateActiveRelationField($this->modelClass, $relation) . "; ?>\n"; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    -->
    <div class="form-actions">
        <div style="float: left">
            <a href="<?php echo '<?php echo Yii::app()->createUrl(\'administracao/' . $this->class2name($this->modelClass) . '/index\') ?>'; ?>" class="btn btn-small"><strong><i class="icon-chevron-left"></i>  Todas <?php echo $this->class2name($this->modelClass) ?></strong></a>   
        </div>
        <div style="float: right">
            <button type="submit" class="btn btn-success btn-large"><strong><?php echo "<?php echo \$model->isNewRecord ? 'Inserir' : ' Salvar' ?>"; ?>  <i class="icon-arrow-down icon-white"></i></strong></button> 
        </div>
        <div style="clear: both"></div>
    </div>     
    <?php echo "<?php \$this->endWidget();?>"; ?>
</div>