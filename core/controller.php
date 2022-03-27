<?php
class Controller {

    var $dataArray = array();
    var $layout = 'default';

    

    function __construct() {
        $this->dataArray = array_merge($this->dataArray, array('page' => array('pageName' => strtolower(get_class($this)))));
    }

    function set($data){
        $this->dataArray = array_merge($this->dataArray, $data);
    }

    function render($filename) {
        extract($this->dataArray);
        ob_start();
        require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
        $content_for_layout = ob_get_clean();
        if($this->layout==false){
            echo $content_for_layout;
        }else{
            require(ROOT.'views/layout/'.$this->layout.'.php');
        }
    }

    function loadModel($name){
        require_once(ROOT.'models/'.strtolower($name).'.php');
        $this->$name = new $name();
    }
}
?>