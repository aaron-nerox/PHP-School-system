<?Php 

    abstract class Loader{

        public function getInstance($path,$className){
            $fullPath = "../$path/$className.php";
            require_once($fullPath);
            $this->$className = new $className();
        }

        public function InstatiateDB($name){
            $fullPath = "$name.php";
            require_once($fullPath);
            $this->$name = new $name();
        }
    }