<?php
/**
 * Bootstrap Class
 **/
class Bootstrap
{
    private $_url = null;
    private $_controller = null;
    private $_defaultController = 'welcome';
    private $_controllerName = null;
    private $_controllerPath = null;
    private $_controllerClass = null;
    
    public function init() {
        $this->getUrl();
        // Debugging
        print_r($this->_url);

        $this->setControllerName($this->_url[0]);
        $this->setControllerPath();

        if (file_exists($this->_controllerPath)) {
            require $this->_controllerPath;
            $this->initController();
        } else {
            $this->showDefaultController();
            return;
        }

        $this->checkMethods();
    }

    private function showDefaultController() {
        $this->_controllerName = 'HomeController';
        $this->_controllerPath = APP_PATH . 'controllers/'. $this->_controllerName  .'.php';
        require $this->_controllerPath;
        $this->initController();
    }

    private function checkMethods() {

    }

    private function throwError() {
        echo 'An error occured...';
    }

    private function getUrl() {
        $this->_url = $_GET['url'];
        $this->_url = rtrim($this->_url, '/');
        $this->_url = explode('/', $this->_url); 
    }
    
    private function setControllerName($name = null) {
        if (!$name) {
            return;
        }
        $this->_controllerName = ucfirst($name) . 'Controller';
    }

    private function setControllerPath() {
        if (!$this->_controllerName) {
            return;
        }
        $this->_controllerPath = APP_PATH . 'controllers/' .  $this->_controllerName . '.php';
    }

    private function initController() {
        $this->_controller = new $this->_controllerName;
    }
}
?>