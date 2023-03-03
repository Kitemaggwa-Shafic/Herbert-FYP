<?php
require '../../../student/inc/sessionzr.php';
require '../../../config.php';
?>
<!doctype html>
<html>
<head>
   <meta charset="UTF-8">
   <link rel="shortcut icon" href="./.favicon.ico">
   <title>Project Files Directory</title>

   <link rel="stylesheet" href="./.style.css">
   <script src="./.sorttable.js"></script>
</head>

<body>
<div id="container">
	<?php


	$repoid = file_get_contents('.Repository ID.txt');
	$student_ID = file_get_contents('.Student ID.txt');

	$r_query = $conn->query("SELECT * from projects where repositoryID = '$repoid'");
	$r_row = $r_query->fetch_assoc();

	$st_query = $conn->query("SELECT * from students where account_id = '$student_ID'");
	$st_row = $st_query->fetch_assoc();

	echo '<h1 style="color: blue; font-size: 16px;">'. $r_row['title'] .'</h1>';
	echo '<h2 style="color: grey; font-size: 14px;"> Rights to content management in this repository are reserved for '. $st_row['student_name'] .'</h2>';

echo '<p style = "text-align: center; margin: 10px 0; font-size: 12px;">'. $r_row['repositoryNotes'] .'</p>';

?>
	<table class="sortable" style = "font-size: 11px;">
	    <thead>
		<tr>
			<?php
				echo '<th style="background-color: blue;">File Name</th>';
				echo '<th style="background-color: blue;">Type</th>';
				echo '<th style="background-color: blue;">Size</th>';
				echo '<th style="background-color: blue;">Upload Date</th>';
				echo '<th style="background-color: blue;">Action</th>';
			?>
		</tr>
	    </thead>
	    <tbody><?php

	// Adds pretty filesizes
	function pretty_filesize($file) {
		$size=filesize($file);
		if($size<1024){$size=$size." Bytes";}
		elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
		elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
		else{$size=round($size/1073741824, 1)." GB";}
		return $size;
	}

 	// Checks to see if veiwing hidden files is enabled
	if($_SERVER['QUERY_STRING']=="hidden")
	{$hide="";
	 $ahref="./";
	 $atext="Hide";}
	else
	{$hide=".";
	 $ahref="./?hidden";
	 $atext="Show";}

	 // Opens directory
	 $myDirectory=opendir(".");

	// Gets each entry
	while($entryName=readdir($myDirectory)) {
	   $dirArray[]=$entryName;
	}

	// Closes directory
	closedir($myDirectory);

	// Counts elements in array
	$indexCount=count($dirArray);

	// Sorts files
	sort($dirArray);

	// Loops through the array of files
	for($index=0; $index < $indexCount; $index++) {

	// Decides if hidden files should be displayed, based on query above.
	    if(substr("$dirArray[$index]", 0, 1)!=$hide) {

	// Resets Variables
		$favicon="";
		$class="file";

	// Gets File Names
		$name=$dirArray[$index];
		$namehref=$dirArray[$index];

	// Gets Date Modified
		$modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
		$timekey=date("YmdHis", filemtime($dirArray[$index]));


	// Separates directories, and performs operations on those directories
		if(is_dir($dirArray[$index]))
		{
				$extn="Directory";
				$size="...";
				$sizekey="0";
				$class="dir";

			// Gets favicon.ico, and displays it, only if it exists.
				if(file_exists("$namehref/favicon.ico"))
					{
						$favicon=" style='background-image:url($namehref/favicon.ico);'";
						$extn="&lt;Website&gt;";
					}

			// Cleans up . and .. directories
				if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;"; $favicon=" style='background-image:url($namehref/.favicon.ico);'";}
				if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
		}

	// File-only operations
		else{
			// Gets file extension
			$extn=pathinfo($dirArray[$index], PATHINFO_EXTENSION);

			// Prettifies file type
			switch ($extn){
				case "png": $extn="PNG Image"; break;
				case "jpg": $extn="JPEG Image"; break;
				case "jpeg": $extn="JPEG Image"; break;
				case "svg": $extn="SVG Image"; break;
				case "gif": $extn="GIF Image"; break;
				case "ico": $extn="Windows Icon"; break;

				case "txt": $extn="Text File"; break;
				case "log": $extn="Log File"; break;
				case "htm": $extn="HTML Webpage"; break;
				case "html": $extn="HTML Webpage"; break;
				case "xhtml": $extn="HTML Webpage"; break;
				case "shtml": $extn="HTML Webpage"; break;
				case "php": $extn="PHP Script"; break;
				case "js": $extn="Javascript File"; break;
				case "css": $extn="Stylesheet"; break;

				case "pdf": $extn="PDF Document"; break;
				case "xls": $extn="Spreadsheet"; break;
				case "xlsx": $extn="Spreadsheet"; break;
				case "doc": $extn="Microsoft Word Document"; break;
				case "docx": $extn="Microsoft Word Document"; break;

				case "zip": $extn="ZIP Archive"; break;
				case "htaccess": $extn="Apache Config File"; break;
				case "exe": $extn="Windows Executable"; break;

				default: if($extn!=""){$extn=strtoupper($extn)." File";} else{$extn="Unknown";} break;
			}

			// Gets and cleans up file size
				$size=pretty_filesize($dirArray[$index]);
				$sizekey=filesize($dirArray[$index]);
		}

	// Output
	 
		echo '<tr class="'.$class.'">';
			echo '<td><a href="./'.$namehref.'"'.$favicon.' class="name">'.$name.'</a></td>';
			echo '<td><a href="./'.$namehref.'">'.$extn.'</a></td>';
			echo '<td sorttable_customkey="'.$sizekey.'"><a href="./'.$namehref.'">'.$size.'</a></td>';
			echo '<td sorttable_customkey="'.$timekey.'"><a href="./'.$namehref.'">'.$modtime.'</a></td>';
			echo '<td sorttable_customkey="'.$timekey.'">';
				if ($student_ID === $this_accID) {
					echo '<a href=".del.php?f='.$namehref.'" style = "background-color: #f1a804;">Delete</a>';
				} else {
					echo '<a href="./'.$namehref.'">...</a>';
				}
			echo '</td>';
		echo '</tr>';
	   }
	}
	?>

	    </tbody>
	</table>

</div>
</body>
</html>
