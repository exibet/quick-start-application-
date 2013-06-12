<?php

class Application_Form_Registration extends Zend_Form {

    public function init() {
        $this->setName('form_registration');

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Логин')
                ->setRequired(TRUE)
                ->addValidator('NotEmpty')
                ->addValidator('Alnum')
                /*->addValidator('Db_NoRecordExists', FALSE, array(
                    'table' => 'users',
                    'field' => 'username'
                ))*/
                ->addFilter('StringTrim')
                ->addFilter('StripTags');

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Пароль')
                ->setRequired(TRUE)
                ->addFilter('StripTags')
                ->addValidator('NotEmpty');

        
        $password_confirm = new Zend_Form_Element_Password('password_confirm');
        $password_confirm->setLabel('Подтвирждение пароля')
                ->setRequired(TRUE)
                ->addFilter('StripTags')
                ->addValidator('NotEmpty')
                ->addValidator('identical', false, array('token' => 'password'));



        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
                ->setRequired(TRUE)
                ->addValidator('EmailAddress')
                ->addValidator('NotEmpty')
                ->addFilter('StringTrim')
                ->addFilter('StripTags');

        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Ваше имя')
                ->addValidator('NotEmpty')
                ->addFilter('StringTrim')
                ->addFilter('StripTags');

        $surname = new Zend_Form_Element_Text('surname');
        $surname->setLabel('Ваша фамилия')
                ->addValidator('NotEmpty')
                ->addFilter('StringTrim')
                ->addFilter('StripTags');

        $submit = new Zend_Form_Element_submit('Подтвердить');

        $this->addElements(array($username, $password, $password_confirm, $email, $name, $surname, $submit,));
    }

}

?>
