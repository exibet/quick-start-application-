<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->headTitle('Главная', 'PREPEND');

        $user = new Application_Model_User();
        $this->view->users = $user->getAllusers();

        $id = $this->_getParam('id');
        $user = new Application_Model_User($id);
        $this->view->user = $user;



        $form = new Application_Form_Login();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $user = new Application_Model_User();
                if ($user->authorize($form->getValue('username'), $form->getValue('password'))) {
                    $this->_helper->redirector('index');
                } else {
                    $this->view->error = 'Неверные данные авторизации';
                }
            }
        }

        $this->view->form = $form;
    }

     public function logoutAction() {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_helper->redirector('/');
    }
    /* public function loginAction()
      {
      $form = new Application_Form_Login();

      if ($this->getRequest()->isPost()) {
      if ($form->isValid($this->getRequest()->getPost())) {
      $user = new Model_User();
      if ($user->authorize($form->getValue('username'), $form->getValue('password'))) {
      $this->_helper->redirector('login');
      } else {
      $this->view->error = 'РќРµРІРµСЂРЅС‹Рµ РґР°РЅРЅС‹Рµ Р°РІС‚РѕСЂРёР·Р°С†РёРё.';
      }
      }
      }

      $this->view->form = $form;
      } */
}

