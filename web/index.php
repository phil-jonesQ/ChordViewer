<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   </head>

	<body>
	<div class="jumbotron text-center">
	<h1>Chord Viewer</h1>
	<h2>Select A Song</h2>
	<?php

	// Function to get the meta files, extra the details and return an associated array
	function get_files() {

		// Define path
		$path = "assets_html/";
		// Create data array
		$data = array();
	
		// If files are found loop over all 
		if ($handle = opendir($path)) {
		
			while (false !== ($file = readdir($handle))) {

				// Ignore files we're not interested in
				if ('.' === $file) continue;
				if ('..' === $file) continue;

				// If the file is a meta file extract the contents and assign to our data array
				if (strpos($file, '.meta') !== false) {
				
					$meta_data = file_get_contents('' . $path . '' .  $file . '');
					$meta_elements = explode(",", $meta_data);
                			$title = $meta_elements[0];
					$file_name = $meta_elements[1];
					$file_name = str_replace(array("\n", "\t", "\r"), '', $file_name);
					//echo $file_name;
					//echo $title;
					$data += [$title => $file_name];

				}

				// Otherwise skip over the file
				else
			
				{	
			
					continue;
			
				}


			}	
		
			// Close all open files
			closedir($handle);
		
	
		}

		// return the arry
		return $data;

}

$meta_files=get_files();
array_multisort($meta_files);

// Debug
//print_r ($meta_files);

// Generate the dynamic links
foreach ($meta_files as $title => $file_name) {
	echo '<h2>';
	echo '<a href="assets_html/' . $file_name . '">' . $title . '</a>';
	echo '<br>';
	echo '</h2>';
}

?>


	<p>The following are songs with lyrics and the chord above each lyric - Click on a link to view the song...</p>
	</div>
	</body>
</html>

