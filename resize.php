<?php 
  // Check options at: http://www.white-hat-web-design.co.uk/blog/resizing-images-with-php/ 
	include('SimpleImage.php');
  
	// Choose current folder
	$handle = opendir(".");
	
	// Collection of extensions
	$mimes = array('jpg','jpeg','png','gif');
	
	// Resized file pre
	$prefix = '50_';
	
	// Scale Percentage
	$scale = 50;
	
	// ------------------------------------------------------------------------------------------
	// Read all the files in this folder
	while( ($file = readdir($handle)) !== false )
	{
		$ext = substr($file, strpos($file,'.')+1, strlen($file) );
		if( in_array( strtolower( $ext ), $mimes) &&  strpos($file,$prefix) === FALSE )
		{
			$image = new SimpleImage();
			$image->load($file);
			# chek options at: http://www.white-hat-web-design.co.uk/blog/resizing-images-with-php/
			$image->scale($scale); 
			$image->save($prefix.$file);
			// print the change
			echo $prefix.$file.', ';
		}
			
	}
	
	
	
?>