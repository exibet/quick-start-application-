<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload() {
        $moduleLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH));

        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace(array('Mylib_'));

        return $moduleLoader;
    }
    
    protected function _initPlugins()
	{
		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin(new Application_Plugin_Acl());
	}


    protected function _initViewHelpers() {

        //Шаблон вывода страницы
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        //Мета даные
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8')
                ->appendName('description', 'Using view helpers in Zend_view');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Quick-start');

        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $view->identity = false;
        } else {
            $view->identity = Zend_Auth::getInstance()->getIdentity();
        }
    }

    protected function _initEmail() {
        $email_config = array(
            'auth' => 'login',
            'username' => 'exibeter',
            'password' => '631coloboc779',
            'ssl' => 'tls'
        );
        $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $email_config);
        Zend_Mail::setDefaultTransport($transport);
    }

}

?>