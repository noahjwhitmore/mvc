<?php

// App core class
// Creates URL and loads the core controller
// URL Format: /controller/method/param1/param2
class Core {
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        //print_r($this->getUrl());
        $url = $this->getUrl();

        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // Require controler
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate
        $this->currentController = new $this->currentController;

        // Check for second param in URL, action
        if (isset($url[1])) {
            // Check if method exists in controller
            if(method_exists( $this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}