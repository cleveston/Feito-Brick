
<?php
echo "<?php\n";
?>
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').slideToggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="well foto" style="background: white;padding: 10px;margin: auto; width: 750px">
    <div style="margin: 10px 0 20px 0;width: 500px;">
        <div style="width: auto;float: left;padding-right: 10px; border-right: 1px solid #ccc">
            <h2 class="" style="font-size: 35px; color: #555; margin-left: 0px"><?php echo $this->class2name($this->modelClass); ?></h2>
        </div>
        <div style="float: left;margin: 10px 0 0 10px">
            <div class="btn-group">
                <a style="font-size: 17px" href="<?php echo '<?php echo Yii::app()->createUrl(\'administracao/' . $this->class2name($this->modelClass) . '/novo\') ?>'; ?>"><strong>Novo</strong></a>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    <?php echo GxHtml::link(Yii::t('app', 'Busca Avançada'), '#', array('class' => 'search-button', 'style'=>'font-size:13px;font-weight:bold;margin-bottom:5px')); ?>
    <div class="well foto search-form" style="display: none">
        <?php echo "
        <?php   \$this->renderPartial('_search', array('model' => \$model,
        )); ?>"
        ?>
    </div>
    <div>
        <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.BootGridView',array(
        'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'emptyText' => 'Não foi encontrado nenhum resultado!',
        'summaryText'=>'Mostrando {start}-{end} de {count} resultados',
        'nullDisplay' => 'Vazio',
        'filterPosition' => 'body',

        'columns'=>array(
        <?php
        $count = 0;
        foreach ($this->tableSchema->columns as $column) {
            if ($column->autoIncrement)
                continue;
            if (++$count == 4)
                echo "\t\t/*\n";
            echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column) . ",\n";
        }
        if ($count >= 4)
            echo "\t\t*/\n";
        ?>
        array(
        'class'=>'bootstrap.widgets.BootButtonColumn',
        'updateButtonLabel'=>'Atualizar',
        'updateButtonUrl'=>'Yii::app()->createUrl("administracao/<?php echo $this->class2name($this->modelClass) ?>/atualizar", array("id" => $data-><?php echo $this->tableSchema->primaryKey; ?>))',
        'viewButtonLabel'=>'Ver',
        'viewButtonUrl'=>'Yii::app()->createUrl("administracao/<?php echo $this->class2name($this->modelClass) ?>/ver", array("id" => $data-><?php echo $this->tableSchema->primaryKey; ?>))',
        'deleteButtonLabel'=>'Excluir',
        'deleteConfirmation'=>'Tem certeza que deseja excluir?',
        'deleteButtonUrl'=>'Yii::app()->createUrl("administracao/<?php echo $this->class2name($this->modelClass) ?>/delete", array("id" => $data-><?php echo $this->tableSchema->primaryKey; ?>))',
        'htmlOptions'=>array('style'=>'width:55px'),
        ),
        ),
        )); ?>
        <div style="clear: both"></div>
    </div>
</div>
