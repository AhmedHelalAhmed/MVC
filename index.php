<?php

  // our site : http://mvc.local/home.php 
  
  
  //autoloading classes when needed
  include('./loader.php');
  $uri=$_GET['flag'];
  echo $uri;
  list($controller,$action)=explode('/',$uri);
  echo "caontroller $controller<br/>";
  echo "action $action<br/>";
  echo '</br/>in index file';
  

