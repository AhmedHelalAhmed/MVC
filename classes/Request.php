<?php
  class Request
  {
    
    private $get,$post;
    
    public function___construct()
    {
      static $session_isopen=false;
      if($session_isopen==false)
      {
        $session_start();
        $session_isopen=true;
      }
      $this->get=$_GET;
      $this->post=$_POST;
      unset($_GET,$_POST);
    }
    
    public function get($var)
    {
      if(isset($this->get[$var])) return $this->get[$var];
      return null;
    }
    
    public function post($var)
    {
      if(isset($this->post[$var])) return $this->post[$var];
      return null;
    }
    
    public function session($var,val=null)
    {
        if($val!=null)$_SESSION[$var]=$val;
        if(isset($_SESSION[$var])) return $_SESSION[$var];
        return null;
    }
    
    public function uri($index)
    {
      $uri=$this->get('flag');
      if(!$uri)$uri='home/index';
      $uri_item=explode('/',$uri);
      if(isset($uri_item[$index])) return $uri_item[$index];
      return null;
    }
    
  }

