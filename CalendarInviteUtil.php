<?php

class CalendarInviteUtil{
    
    private $calendarInviteManagerObj;
    
    private function __construct(){
        $this->calendarInviteManagerObj = new CalendarInviteManager();
    } 
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
        }

        return self::$instance;
    }
    
}
