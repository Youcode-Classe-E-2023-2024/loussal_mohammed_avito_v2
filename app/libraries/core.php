<?php
    /*
     * App Core Class
     * Creates URL & loads core controller
     * URL FORMAT - /controller/method/params
     */
    class core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];
        public function __construct()
        {
            $this->getUrl();
        }

        public function getUrl() {
            echo $_GET['url'];
        }
    }


?>
