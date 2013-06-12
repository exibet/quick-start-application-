<?php

class Application_Form_Login extends Zend_Form {

    public function init() {
        $this->setName('form_login');

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Логин');

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Пароль');

        
            
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Войти');

       
        

        $this->addElements(array($username, $password, $submit,));
    }

}


?>
