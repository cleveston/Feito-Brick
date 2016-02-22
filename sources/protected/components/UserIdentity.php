<?php

class UserIdentity extends CUserIdentity {

    private $_id;

    public function authenticate() {
        $record = Usuario::model()->find("email = :id", array(':id' => $this->username));

        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($record->senha !== md5($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $record->idusuario;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}

?>