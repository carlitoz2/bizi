<?php

class User
{
    public $_pseudo;
    public $_password;

    function __construct($pseudo,$password){
        $this->_pseudo = $pseudo;
        $this->_password = $password;
    }
    


    /**
     * Get the value of _password
     * @param void
     * @return string
     */ 
    public function get_password()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */ 
    
    public function set_password($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of _pseudo
     * @param void
     * @return string
     */ 
    public function get_pseudo()
    {
        return $this->_pseudo;
    }

    /**
     * Set the value of _pseudo
     *
     * @return  self
     */ 
    public function set_pseudo($_pseudo)
    {
        $this->_pseudo = $_pseudo;

        return $this;
    }
}