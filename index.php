
<?php
$endPoint = array_key_exists('PATH_INFO',$_SERVER)?$_SERVER['PATH_INFO']:"";
if(array_key_exists($endPoint,$webRoutes)){
	  $fileTobeLoaded = $webRoutes[$endPoint];
	  //echo $fileTobeLoaded;
	  //var_dump(file_exists(__DIR__.'/'.$fileTobeLoaded))
	  $path = __DIR__.'/'.$fileTobeLoaded;
	if(file_exists(__DIR__.'/'.$fileTobeLoaded)){
		require_once $path;
		
	}else{
		exit(basename($fileTobeLoaded,'.php')."<b>Files does not Exist,Go and Create It.</b>");
	}
}else{  
	if(basename($_SERVER['PHP_SELF']) == basename(__FILE__)){
		if(array_key_exists('DEFAULT_ROUTE',$webRoutes)){
			require_once __DIR__.'/'.$webRoutes['DEFAULT_ROUTE'];
		}
	}else{
		//This is Custom Error Code.
		ob_clean();
		if(array_key_exists('404_ERROR_ROUTE',$webRoutes)){
			require_once __DIR__.'/'.$webRoutes['404_ERROR_ROUTE'];
		}
		exit();
		//exit('<h1>404,Page Not Found</h1>');
	}
}
//print_r($webRoutes);
  //include_once __DIR__.'/gallery.php';
  // print_r(get_included_files());
  // echo "</pre>";
 
 //exit(); //To stop/Remove Footer execution.....
?>