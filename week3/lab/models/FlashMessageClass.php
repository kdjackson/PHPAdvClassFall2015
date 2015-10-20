<?php

/**
 * Description of FlashMessageClass
 *
 * @author 001348911
 */
class FlashMessageClass extends MessageClass {
    //put your code here
    
    public function __construct() {
        
        if (!isset($_SESSION['flashmessages']) ){
        $_SESSION['flashmessages'] = array();
        }
        
        $this->messages = $_SESSION['flashmessages'];
    }
    
    public function addMessage($key, $msg) {
        parent::addMessage($key, $msg);
        $this->setFlashMessages();
    }
    
    public function removeMessage($key) {
        parent::removeMessage($key);
        $this->setFlashMessages();
    }
    
    public function getAllMessages() {
        $messages = $_SESSION['flashmessages'];
        $this->removeAllMessages();
        return $this->messages;
    
    }
    
    public function removeAllMessages() {
        parent::removeAllMessages();
        $this->setFlashMessages();
    }
    
    private function setFlashMessages() {
        $_SESSION['flashmessages'] = $this->messages;       
    } 

    
}
