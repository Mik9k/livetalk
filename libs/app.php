<?php

class App{
    private function __construct() {
        
        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = trim($url, '/'); //CLEAN URL STRING OF SLASHES OF BOTHWAYS
        //CUT STRING PER SLASHES, FIRST VALUE = CONTROLLER, SECOND VALIUE = METHOD
        $url = explode('/',$url);
        
        if(empty($url[0])){
            require_once $this->homeController;
            $controller = new Feed();
            $controller->loadModel('feed');
            $controller->render();
            exit();
        }

        $controllerFile = 'controllers/'.$url[0].'.php';

        //CHECK IF CONTROLLER FILE EXISTS, IF EXISTS THEN CHECK IF URL GOT A METHOD
        if(file_exists($controllerFile)){
            require_once $controllerFile;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //IF METHOD EXISTS CHECK IF URL GOT PARAMETERS
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        $nparams = sizeof($url) - 2;

                        $params = [];
                        for ($i=0; $i < $nparams; $i++) { 
                            array_push($params, $url[$i + 2]);
                        }
                        //USING PHP VARIABLES LIKE VARIABLES CALL A METHOD
                        $controller->{$url[1]}($params); 
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    //METHOD DOESNT EXISTS
                    //$controller = new Errors();
                    echo 'Method doesnt exists';
                }
            }else{
                //NO METHOD REQUESTED
                $controller->render();
            }
        }else{
            //CONTROLLER DOESNT EXISTS
            //$controller = new Errors();
            echo '404';
        }
    }

    private $homeController = 'controllers/feed.php'; //DEFAULT CONTROLLER

    static function Initialize(){
       if(App::$app == NULL){
           App::$app = new App();
           return App::$app;
       }
       return App::$app;

    }

    private static $app = NULL;
}

?>