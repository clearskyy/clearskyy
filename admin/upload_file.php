<!doctype html><html><head><? require "../crumpocolypse/ahead.php"; ?><title>file upload | clearskyy</title></head><body>

<div id="nexus">
	<div id="left-wrap">
		<p>&nbsp;</p>
		<?php
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 2100000)
			&& in_array($extension, $allowedExts))
			{
		
				if ($_FILES["file"]["error"] > 0)
				  {
					echo "Error: " . $_FILES["file"]["error"] . "<br>";
				  }
				else
				{
					echo "Upload: " . $_FILES["file"]["name"] . "<br />";
					echo "Type: " . $_FILES["file"]["type"] . "<br />";
					echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br />";
					echo "Temp file: " . $_FILES["file"]["tmp_name"]."<br />";
				  
					if (file_exists("upload/" . $_FILES["file"]["name"]))
					{
						echo $_FILES["file"]["name"] . " already exists. ";
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"../crumpocolypse/upload/" . $_FILES["file"]["name"]);
						echo "Stored at: " . "http://clearskyy.net/crumpocolypse/upload/" . $_FILES["file"]["name"];
					}
				  
				}
			}
			else
			{
				echo "Invalid file";
			}
		?>
	</div>
</div>
</body></html>