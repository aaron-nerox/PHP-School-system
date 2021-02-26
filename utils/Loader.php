<?Php 
    abstract class Loader{

        public function getInstance($path,$className){
            $fullPath = $_SERVER['DOCUMENT_ROOT']."/projettdw/$path/$className.php";
            require_once($fullPath);
            $this->$className = new $className();
        }

        public function InstatiateDB($name){
            $fullPath = "$name.php";
            require_once($fullPath);
            $this->$name = new $name();
        }

        public static function loadClassInstance($path,$className){
            $fullPath = $_SERVER['DOCUMENT_ROOT']."/projettdw/$path/$className.php";
            require_once($fullPath);
            return new $className();
        }

        public static function loadStyleSheets($parent){
            echo 
            '<link rel="stylesheet" href="'.$parent.'style/mainStyle.css">
            <link rel="stylesheet" href="'.$parent.'style/footerStyle.css">
            <link rel="stylesheet" href="'.$parent.'style/headerStyle.css">
            <link rel="stylesheet" href="'.$parent.'style/diapoStyle.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="'.$parent.'style/menuStyle.css">
            <link rel="stylesheet" href="'.$parent.'style/profileStyle.css">
            <link rel="stylesheet" href="'.$parent.'style/formStyle.css">
            <link rel="stylesheet" href="'.$parent.'style/articleStyle.css">';
        }
    }