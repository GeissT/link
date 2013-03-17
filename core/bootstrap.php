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
            echo 'It doesn\'t exist';
        }
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
        $this->_controllerName = $name;
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
