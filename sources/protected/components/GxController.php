<?php

abstract class GxController extends CController {

//Layout
    public $layout = '//layouts/main';
    public $menu = array();
    public $breadcrumbs = array();

    //Soma dias na data
    protected static function somaData($dias, $data = null) {
        if ($data == null) {
            $data = date('Y-m-d');
        }
        $ano = substr($data, 0, 4);
        $mes = substr($data, 5, 2);
        $dia = substr($data, 8, 2);
        $dia += $dias;
        return date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $ano));
    }

    protected static function subtraiData($dias, $data = null) {
        if ($data == null) {
            $data = date('Y-m-d');
        }
        $ano = substr($data, 0, 4);
        $mes = substr($data, 5, 2);
        $dia = substr($data, 8, 2);
        $dia -= $dias;
        return date("d/m/Y", mktime(0, 0, 0, $mes, $dia, $ano));
    }

    //Formata data
    protected function formataData($data, $padrao = true) {
        setlocale(LC_TIME, 'pt_BR.utf8');
        if ($padrao)
            return strftime("%d de %B", strtotime($data));
        else
            return strftime("%d de %B de %Y", strtotime($data));
    }

    //Pega o Ip do cliente
    public static function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    //Palavra primeira letra maiuscula, menos de, do, da , dos, das, des, di, ids, em, etc...
    public function special_ucwords($string) {

        $retorno = array();
        $string = strtolower(trim(preg_replace("/\s+/", " ", $string)));
        $palavras = explode(" ", $string);

        foreach ($palavras as $palavra) {
            if (!preg_match("/^([dn]?[aeiou][s]?|em)$/i", $palavra))
                $palavra = ucfirst($palavra);
            $retorno[] = $palavra;
        }
        return implode(" ", $retorno);
    }

    //Verifica versao navegador
    public function getNavegador() {
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
            $browser_version = $matched[1];
            $browser = 'IE';
        } elseif (preg_match('|Opera/([0-9].[0-9]{1,2})|', $useragent, $matched)) {
            $browser_version = $matched[1];
            $browser = 'Opera';
        } elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
            $browser_version = $matched[1];
            $browser = 'Firefox';
        } elseif (preg_match('|Chrome/([0-9\.]+)|', $useragent, $matched)) {
            $browser_version = $matched[1];
            $browser = 'Chrome';
        } elseif (preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
            $browser_version = $matched[1];
            $browser = 'Safari';
        } else {
            // browser not recognized!
            $browser_version = 0;
            $browser = 'other';
        }
        return array('browser' => $browser, 'versao' => $browser_version);
    }

    public function loadModel($key, $modelClass) {

        // Get the static model.
        $staticModel = GxActiveRecord::model($modelClass);

        if (is_array($key)) {
            // The key is an array.
            // Check if there are column names indexing the values in the array.
            reset($key);
            if (key($key) === 0) {
                // There are no attribute names.
                // Check if there are multiple PK values. If there's only one, start again using only the value.
                if (count($key) === 1)
                    return $this->loadModel($key[0], $modelClass);

                // Now we will use the composite PK.
                // Check if the table has composite PK.
                $tablePk = $staticModel->getTableSchema()->primaryKey;
                if (!is_array($tablePk))
                    throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));

                // Check if there are the correct number of keys.
                if (count($key) !== count($tablePk))
                    throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));

                // Get an array of PK values indexed by the column names.
                $pk = $staticModel->fillPkColumnNames($key);

                // Then load the model.
                $model = $staticModel->findByPk($pk);
            } else {
                // There are attribute names.
                // Then we load the model now.
                $model = $staticModel->findByAttributes($key);
            }
        } else {
            // The key is not an array.
            // Check if the table has composite PK.
            $tablePk = $staticModel->getTableSchema()->primaryKey;
            if (is_array($tablePk)) {
                // The table has a composite PK.
                // The key must be a string to have a PK separator.
                if (!is_string($key))
                    throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));

                // There must be a PK separator in the key.
                if (stripos($key, GxActiveRecord::$pkSeparator) === false)
                    throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));

                // Generate an array, splitting by the separator.
                $keyValues = explode(GxActiveRecord::$pkSeparator, $key);

                // Start again using the array.
                return $this->loadModel($keyValues, $modelClass);
            } else {
                // The table has a single PK.
                // Then we load the model now.
                $model = $staticModel->findByPk($key);
            }
        }

        // Check if we have a model.
        if ($model === null)
            throw new CHttpException(404, Yii::t('giix', 'The requested page does not exist.'));

        return $model;
    }

    //Validar formulario via ajax
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax'])) {
            if (Yii::app()->getRequest()->getIsAjaxRequest() && (($form === null) || ($_POST['ajax'] == $form))) {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

    protected function getRelatedData($form, $relations, $uncheckValue = '') {
        if ($uncheckValue === null)
            throw new InvalidArgumentException(Yii::t('giix', 'giix cannot handle automatically the POST data if "uncheckValue" is null.'));

        $relatedPk = array();
        foreach ($relations as $relationName => $relationData) {
            if (isset($form[$relationName]) && (($relationData[0] == GxActiveRecord::HAS_MANY) || ($relationData[0] == GxActiveRecord::MANY_MANY)))
                $relatedPk[$relationName] = $form[$relationName] === $uncheckValue ? null : $form[$relationName];
        }
        return $relatedPk;
    }

}