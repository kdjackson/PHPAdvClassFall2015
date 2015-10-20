<?php


/**
 * Description of MessageClass
 *
 * @author 001348911
 */
class MessageClass implements IMessage{
    //put your code here
    
    protected $messages = array();
    
    public function addMessage($key, $msg){
        
        $this->messages[$key] = $msg;
        
    }
    
    public function removeMessage($key){
        
        unset($this->messages[$key]);
        
    }
    
    public function getAllMessages() {
    
        return $this->messages;
    
    }
    
    public function removeAllMessages() {
        $this->messages = array();
    }
}
