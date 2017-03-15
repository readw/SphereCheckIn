<?php
    class App
    {   
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];
        
        public function __construct(){
            $url = $this->parseUrl();
            
            if (file_exists($_SERVER['DOCUMENT_ROOT']."/App/Controller/".$url[0].".php")) {
                $this->controller = $url[0];
                unset($url[0]);
            }
            
            require_once($_SERVER['DOCUMENT_ROOT']."/App/Controller/".$this->controller.".php");
            $this->controller = new $this->controller;
            
            if (isset($url[1])){
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
            
            $this->params = $url ? array_values($url) : [];
            unset($url);
            call_user_func_array([$this->controller, $this->method], $this->params);
            
            
        }
        
        protected function parseUrl(){
            if (isset($_GET['url'])) {
                return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
        }
    }
?>