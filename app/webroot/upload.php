<?php
if(!empty($_FILES)){
	$ext = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);
	$randomLetters = $rand = substr(md5(microtime()),rand(0,26),6);
	$filename = "$randomLetters.$ext";
	$target_file = 'img/ckfiles/' . $filename;
	$ckfiles = 'http://'.$_SERVER['HTTP_HOST'].'/relishone/'.$target_file;
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["upload"]["tmp_name"]);
	if($check !== false) {
	    $uploadOk = 1;
	} else {
	    echo "<script>alert('File is not an image.');</script>";
	    $uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "<script>alert('Sorry, file already exists.');</script>";
	    $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["upload"]["size"] > 500000) {
	    echo "<script>alert('Sorry, your file is too large. file should be less or equals to 500kb');</script>";
	    $uploadOk = 0;
	}

	// Allow certain file formats
	if($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif" ) {
	    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
	    $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "<script>alert('Sorry, your file was not uploaded. Dont forget to set CHMOD writable permission (0777) to imageuploader folder on your server.');</script>";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
	        if(isset($_GET['CKEditorFuncNum'])){
	            $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
	            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$ckfiles', '');</script>";
	        }
	    } else {
	        echo "<script>alert('Sorry, there was an error uploading your file - ".$target_file." - Dont forget to set CHMOD writable permission (0777) to imageuploader folder on your server.');</script>";
	    }
	}
	//Back to previous site
	if(!isset($_GET['CKEditorFuncNum'])){
	    header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}