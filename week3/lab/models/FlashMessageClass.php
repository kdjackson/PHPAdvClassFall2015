<?php

/**
 * Description of FlashMessageClass
 *
 * @author 001348911
 */
class FlashMessageClass extends MessageClass {
    //put your code here
    //constructor function
    public function __construct() {
        //if session is not already set, set
        if (!isset($_SESSION['flashmessages']) ){
        $_SESSION['flashmessages'] = array();
        }
        
        $this->messages = $_SESSION['flashmessages'];
    }
    //access the addMessage function then go to setFlashMessages function
    public function addMessage($key, $msg) {
        parent::addMessage($key, $msg);
        $this->setFlashMessages();
    }
    //access the removeMessage function then go to setFlashMessages function
    public function removeMessage($key) {
        parent::removeMessage($key);
        $this->setFlashMessages();
    }
    //show messages variable as caught in the session(when added in add flash message,
    //when page is refreshed access the removAllMessages functions, then return the empty array
    public function getAllMessages() {
        $messages = $_SESSION['flashmessages'];
        $this->removeAllMessages();
        return $messages;
    
    }
    //access removeAllMessages function then go to setFlashMessages function
    public function removeAllMessages() {
        parent::removeAllMessages();
        $this->setFlashMessages();
    }
    //show what is in the session variable
    private function setFlashMessages() {
        $_SESSION['flashmessages'] = $this->messages;       
    } 
    
}
