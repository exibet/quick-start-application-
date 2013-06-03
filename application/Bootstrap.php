<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initViewHelpers() {

        //Шаблон вывода страницы
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        //Мета даные
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Quick-start');
    }

}

