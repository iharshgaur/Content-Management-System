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
  $query="SELECT * FROM Tutorials";
  $result=mysqli_query($connection,$query);
  $numrow=mysqli_num_rows($result);
  include('sidebar.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tutorials</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="assets/css/main.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="assets/css/sidebar.css">
</head>
<body>
  <div id="content">
    <div class="container-fluid">
      <div style="text-align: center;">
        <form method="POST" name="FileUpload" enctype="multipart/form-data">
          <table class="col-8 table table-hover table-bordered notices" style="margin-right: auto; margin-left: auto;">
            <thead>
            <tr>
              <th scope="col">Sl. No</th>
              <th scope="col">Name</th>
            </tr>
            </thead>
              <?php 
                for($i=0;$i<$numrow;$i++)
                {
                  $c=$i+1;
                  $arr=mysqli_fetch_assoc($result);
                  $fileName=$arr['FileName'];
                  echo "<tr><td>$c</td><td><a href=\"download and upload/docs/$fileName\">$fileName</a></td></tr>";
                }
               ?>
          </table>
    </form>
      </div> 
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
    
    function Validation()
    {
      var file=document.getElementById('TutorialsID').value;
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