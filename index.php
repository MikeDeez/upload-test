<?php
	
	#1. Load Libraries
	require_once 'form.lib.php';
	require_once 'upload.lib.php';
	require_once 'url.lib.php';

	#2. Logic
	// print_r($_POST);

	# If any files were uploaded
	if($_FILES){
		# get the temp name and the filename
		$tmp      = $_FILES['file']['tmp_name'][0];
		$filename = $_FILES['file']['name'][0];
		# then move the files into the "uploads" folder
		move_uploaded_file($tmp, 'uploads/'.$filename);

		# redirect to the newly uploaded file
		URL::redirect('uploads/'.$filename);
	}

	#3. Load Views(After PHP tag)

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload files with PHP</title>
</head>
<body>
	<h1>Upload files with PHP</h1>
	<?=Form::open_upload()?>
		<?=Form::max_file_size()?>
		<div class="form-group">
			<?=Form::label('file', 'File:')?>
			<?=Form::file()?>
		</div>
		<?=Form::submit()?>

	<?=Form::close()?>
</body>
</html>