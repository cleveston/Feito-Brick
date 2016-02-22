<?php

class WebUser extends CWebUser {

    private $_user;

    public function getUser() {
        if ($this->isGuest)
            return;
        else if ($this->_user === null) {
            $this->_user = Usuario::model()->findbypk($this->id);
        }
        return $this->_user;
    }

    public function getNomeUsuario() {
        if ($this->isGuest)
            return;
        else if ($this->_user === null) {
            $this->_user = Usuario::model()->findbypk($this->id);
        }
        return $this->_user->nome;
    }

}

?>
