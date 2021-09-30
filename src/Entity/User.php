<?php
namespace Dylan\ComposerTp ;

class User{

    private $_email;
    private $_password;
    private $_role;

    
    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
    }

    public function hydrate(array $ligne)
    {
        foreach($ligne as $key => $value){
            $method = 'set_'($key);
            if (method_exists($this, $method)) {
                $this->$method($value); // on appel une methode qui est dans la variable donc on ajoute un $
            }
        }
    }
    /**
     * Get the value of _email
     */ 
    public function get_email()
    {
        return $this->_email;
    }

    /*
      Set the value of _email
     
      @return  self
      */
    public function set_email($_email)
    {
        $this->_email = $_email;

        return $this;
    }

    
    public function get_role()
    {
        return $this->_role;
    }

    
    public function set_role($_role)
    {
        $this->_role = $_role;

        return $this;
    }
}