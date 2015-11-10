<?php
if (!defined("CMS_VERSION")) { header("HTTP/1.0 404 Not Found"); die(""); }

if (!class_exists("commandIncLibchart")) {
    class commandIncLibchart extends driverCommand {

        public static function runMe(&$params, $debug = true) {
            $path = driverCommand::run('modGetPath', array(
                'name' => 'pharinix_mod_libchart'
            ));
            $path = $path['path'];
            
            if (!is_dir('var/libchart')) {
                mkdir('var/libchart');
            }
            
            include_once($path.'drivers/classes/libchart.php');
        }

        public static function getHelp() {
            return array(
                "package" => "pharinix_mod_libchart",
                "description" => __("Import libchart library."), 
                "parameters" => array(), 
                "response" => array(),
                "type" => array(
                    "parameters" => array(), 
                    "response" => array(),
                ),
                "echo" => false
            );
        }
        
        public static function getAccess($ignore = "") {
            $me = __FILE__;
            return parent::getAccess($me);
        }
        
        public static function getAccessFlags() {
            return driverUser::PERMISSION_FILE_ALL_EXECUTE;
        }
    }
}
return new commandIncLibchart();