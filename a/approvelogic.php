<?php
include_once('../config.php');
include_once('../config.php');
?>
 
	<?php

	$repoid = file_get_contents('../student/Repositories/'.$my_id['.Repository ID.txt']);
    //Repositories/'.$all_r['repositoryID'].'/.index.php
	$student_ID = file_get_contents('../student/Repositories/Student ID.txt');

	$r_query = $conn->query("SELECT * from projects where repositoryID = '$repoid'");
	$r_row = $r_query->fetch_assoc();

	$st_query = $conn->query("SELECT * from students where account_id = '$student_ID'");
	$st_row = $st_query->fetch_assoc();

 
?>
	 <?php
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
 
		}

	// Output
	 
		echo '<tr class="'.$class.'">';
			echo '<td><a href="./'.$namehref.'"'.$favicon.' class="name">'.$name.'</a></td>';
			echo '<td><a href="./'.$namehref.'">'.$extn.'</a></td>';
			//	 echo '<a href="../student/Repositories/?f='.$namehref.'" style = "background-color: #f1a804;">Delete</a>';
    echo '<div><a href="../student/Repositories/'.$namehref['0'].'/.index.php" style = "color: #dddddd; font-weight: bold;">'.'</a></div>';
						
			echo '</td>';
		echo '</tr>';
	   }
	}
	?>

	 
