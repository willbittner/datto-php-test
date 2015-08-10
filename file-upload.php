
/**
 * Created by PhpStorm.
 * User: williambittner
 * Date: 8/7/15
 * Time: 6:22 PM
 */
<?php
echo("Howdy")
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "CHecking for post method";
if ($_SERVER["REQUEST_METHOD"] == "POST") {



	// collect value of input field
	$name = $_REQUEST['fileName'];
	$words = array();
	$highLetter = '';
	$highLetterCount = 0;
	$letterCount = array();
	if (empty($name)) {
		echo "Name is empty";
	} else {
		echo "Opening file: " + $name + " In PHP";
	}
	$fh = fopen($name, 'r');
	$value = '';
	$curWords = array();
	while ($fh.fread($val,1)) {
		preg_replace('[:punct:]');
		if (preg_match('/^[A-Z0-9]{4,64}$/i', $subject)) {
			$curWords.array_push($value);
			 $letterCount[$value] += 1;


			if ($letterCount[$value] > $highLetterCount) {
				$highLetterCount = $letterCount[$value];
				$highLetter = $value;
				echo "New leader!! : " + $value;
			}
		} elseif(preg_match('[:punct:]')) {
			echo "Punct - we screed up with regex";

		}
		elseif (preg_match('[:space:]')) {
			echo "Space - new word";
			$words.array_push($curWords);
			echo "New word: " + $curWords;
			$curWords = array();

		}
		else
		{
			echo "oh shit I screwed up";
		}
		//foreach($vword $words)
	}

}
?>