public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('*'),
				'expression'=>'Yii::app()->user->user[\'tipousuario\'] == 'administradorGeral'',
				),
	
			array('deny', 
				'users'=>array('*'),
				),
			);
}
