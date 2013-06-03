<?php

/**
 * 
 */
class Application_Form_User extends Zend_Form {

    public function init() {
        $this->setName('form_user');

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Логин')
                ->setRequired(TRUE)
                ->addValidator('NotEmpty')
                ->addValidator('Alnum')
                ->addFilter('StringTrim')
                ->addFilter('StripTags');

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Пароль')
                ->setRequired(TRUE)
                ->addValidator('Alnum')
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty');

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

        $this->addElements(array($username, $password, $email, $name, $surname, $submit,));
    }

}

