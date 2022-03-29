<?php
class Controller {

    var $dataArray = array();
    var $layout = 'default';
    var $post_data = array();

    

    function __construct() {
        $this->dataArray = array_merge($this->dataArray, array('page' => array('pageName' => strtolower(get_class($this)))));

        if(isset($_POST)) {
            $this->post_data = $_POST;
            echo "<script>console.log('DEBUG POST: " . json_encode($this->data) . "');</script>";
        }
        if(isset($this->models)) {
            foreach($this->models as $m) {
                $this->loadModel($m);
            }
        }
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