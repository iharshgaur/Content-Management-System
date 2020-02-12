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
	$query="SELECT * FROM UploadFile";
	$result=mysqli_query($connection,$query);
	$numrow=mysqli_num_rows($result);

  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>
  		Download Uploaded File
  	</title>
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  </head>
  <body>
  	<form method="POST" name="FileUpload" enctype="multipart/form-data">
  		<table class="table table-hover">
  			
  				<?php 
  					for($i=0;$i<$numrow;$i++)
  					{
  						$arr=mysqli_fetch_assoc($result);
  						$fileName=$arr['FileName'];
  						echo "<tr><td><a href=\"docs/$fileName\">$fileName</a></td></tr>";
  					}
  				 ?>
  			
  		</table>
  	</form>
  </body>
  </html>

  <script type="text/javascript">
  	
  	function Validation()
		{
			var file=document.getElementById('UploadFileID').value;
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