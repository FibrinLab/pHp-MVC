<?php

    namespace app\core;

    class Router {
        protected $route = [];
        public Request $request;

        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public function get($path, $function) {
            $this->route['get'][$path] = $function;
        }

        public function resolve() {
            $path = $this->request->getPath();
            $method = $this->request->getMethod();

            $callback = $this->route[$method][$path] ?? false;
            if($callback === false) {
                echo "Function not found";
                exit;
            }
            echo call_user_func($callback);
        }
    }