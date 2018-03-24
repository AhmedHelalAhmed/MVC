<?php
//

/**
 * 
 * @name SPL_autoloader_register
 * @param function with no name 
 * @brief call automatic when there is class  or file required not loaded
 * @see http://php.net/manual/en/language.oop5.autoload.php
 */

spl_autoload_register
(
	function($file_name)
	{
		//file_name=class_name
    $class_dirs=
    [
    './classes',
    './controllers',
    './models',
    './views'
    ];
    foreach($class_dirs as $dir)
    {
      $file_to_include="{$dir}/{$file_name}.php";
      if(is_file($file_to_include))
      {
        include($file_to_include);
        return;
      }
    }
    var_dump("ERROR || loader.php || The file >>>".$file_name."<<< not exist");
	}

);


function route($request)
{
  $controller=$request->uri(0);
  $action=$request->uri(1);
  
  if(!class_exists($controller)||iscallable($controller,$action))
  {
  $controller='BadRequest';
  $action='not_found';  
  }
  $ctrl=new $controller($request);
  call_user_func_array([$ctrl,$action],[]);
}
