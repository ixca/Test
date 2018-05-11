<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClearString {
    private $stringItem;
    private $arrChar;

    public function __construct() {
        $this->arrChar = array('(', ')', '\'', "´", '<', '>', '"', '[', ']', '{', '}',  " \"","select","SELECT","WHERE","where","Select","Where");
    }
    
    public function getValue($a) {
        $this->stringItem = trim($a);
        $this->removeTags();
        $this->stringItem = filter_var($this->stringItem, FILTER_SANITIZE_STRING);
        return $this->stringItem;
    }

    private function removeTags() {
        foreach ($this->arrChar as $item) {
            $this->stringItem = str_replace($item, '', $this->stringItem);
        }
        $this->stringItem = trim($this->stringItem);
		
    }
    public function __destruct() {
        $this->stringItem = null;
        $this->arrChar = null;
    }

}


/* way to use */
/* 
Codeigniter
$this->load->library('clearstring'); //Generating
$myVar = "<''uuser[]()"; //this variable will be clean
$myVar = $this->clearstring->getValue($myVar); // this will return uuser 

pure php
$myVar = "<''uuser[]()";
$obj = new ClearString();
$obj->getValue($myVar);// retornara esto  uuser */
?>