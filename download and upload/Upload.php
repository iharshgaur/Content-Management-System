<!DOCTYPE html>
<?php
@session_start();

define('DB_SERVER','localhost');
define('DB_USER','harsh');
define('DB_PASS','harsh123');
define('DB_NAME','aca_cms');
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if (mysqli_connect_errno()){

	echo "Failed to connect to MYSQL: ".mysqli_connect_error();
}

if($_SERVER['REQUEST_METHOD']=='POST')
{ 
	$name=$_FILES['Notes']['name'];
	$name123=$_FILES['Notes']['tmp_name'];
	//echo $name123;
	$filesize= $_FILES['Notes']['size'];
	$EverthingOk=0;
	if ($filesize > 100000000)
		{
			echo "<script> alert(\"FILE SIZE LARGER THAN 100 MB\")</script>";
			$EverthingOk=1;
		}	
		$target_dir="docs/";
		$target_file=$target_dir.basename($_FILES["Notes"]["name"]);
		//echo $filesize;
		//echo $target_file;
	if(file_exists($target_file))
		{
			echo "<script> alert(\"FILE AREADY EXISTS\")</script>";
			$EverthingOk=1;
		}

	if($EverthingOk==0)
	{
		if(@move_uploaded_file($name123, $target_file))
		{

			echo "<script> alert(\"FILE UPLOADED\")</script>";

		}
		else {
			echo "<script> alert(\"FILE NOT UPLOADED\")</script>";

				}
	}
	else 	{
		echo "<script> alert(\" FILE NOT UPLOADED\")</script>";

			}


	if($EverthingOk==0)
	{
		$Query="INSERT INTO Notes (FileName) VALUES('$name')";
		if(mysqli_query($connection,$Query))
			{echo "<script> alert(\"saved\")</script>";
			}

	}
	else {
		echo "<script> alert(\"FILE NOT UPLOADED\")</script>";
	}
	}

  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>
  		FILE UPLOAD
  	</title>
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  </head>
  <body>
  	<form method="POST" name="FileUpload" enctype="multipart/form-data">
  		<table>
  			<tr>
  				<td>
  					<input type="file" class ="form-control" id="NotesID" name="Notes" >
  				</td>
  				<td>
  					<input type="button" class="btn bg-primary" onclick="Validation()" value="UPLOAD">
  				</td><span style="color:red">ONLY PDF's, DOC's,PPT's AND ZIP's ARE ALLOWED</span>
  			</tr>
  		</table>
  	</form>
  </body>
  </html>

  <script type="text/javascript">
  	
  	function Validation()
		{
			var file=document.getElementById('NotesID').value;
			var SplitFile=file.split('.');
			if(SplitFile[1]!='pdf' && SplitFile[1]!='doc' && SplitFile[1]!='zip' && SplitFile[1]!='docx')
				{
					alert("Please Upload pdf, doc, ppt or zips only");
					return false;
					}
			else
				{
					document.FileUpload.submit();

					
					}

		}


  </script>