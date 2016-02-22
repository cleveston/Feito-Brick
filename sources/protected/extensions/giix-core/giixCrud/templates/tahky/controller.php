<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass; ?> {

<?php
$authpath = 'ext.giix-core.giixCrud.templates.default.auth.';
Yii::app()->controller->renderPartial($authpath . $this->authtype);
?>
public $layout='//layouts/paginaAdmin';

public function actionVer($id) {
$this->render('ver', array(
'model' => $this->loadModel($id, '<?php echo $this->modelClass; ?>'),
));
}

public function actionNovo() {
$model = new <?php echo $this->modelClass; ?>;

<?php if ($this->enable_ajax_validation): ?>
    $this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass) ?>-form');
<?php endif; ?>

if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
$model->setAttributes($_POST['<?php echo $this->modelClass; ?>']);
<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
    $relatedData = <?php echo $this->generateGetPostRelatedData($this->modelClass, 4); ?>;
<?php endif; ?>

<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
    if ($model->saveWithRelated($relatedData)) {
<?php else: ?>
    if ($model->save()) {
<?php endif; ?>
if (Yii::app()->getRequest()->getIsAjaxRequest())
Yii::app()->end();
else
$this->redirect(array('ver', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
}
}

$this->render('novo', array( 'model' => $model));
}

public function actionAtualizar($id) {
$model = $this->loadModel($id, '<?php echo $this->modelClass; ?>');

<?php if ($this->enable_ajax_validation): ?>
    $this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass) ?>-form');
<?php endif; ?>

if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
$model->setAttributes($_POST['<?php echo $this->modelClass; ?>']);
<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
    $relatedData = <?php echo $this->generateGetPostRelatedData($this->modelClass, 4); ?>;
<?php endif; ?>

<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
    if ($model->saveWithRelated($relatedData)) {
<?php else: ?>
    if ($model->save()) {
<?php endif; ?>
$this->redirect(array('ver', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
}
}

$this->render('atualizar', array(
'model' => $model,
));
}

public function actionDelete($id) {
if (Yii::app()->getRequest()->getIsPostRequest()) {
$this->loadModel($id, '<?php echo $this->modelClass; ?>')->delete();

if (!Yii::app()->getRequest()->getIsAjaxRequest())
$this->redirect(array('admin'));
} else
throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
}

public function actionIndex() {
$model = new <?php echo $this->modelClass; ?>('search');
$model->unsetAttributes();

if (isset($_GET['<?php echo $this->modelClass; ?>']))
$model->setAttributes($_GET['<?php echo $this->modelClass; ?>']);

$this->render('index', array(
'model' => $model,
));
}
}