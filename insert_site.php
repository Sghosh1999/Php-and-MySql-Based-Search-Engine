<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		body{
			margin:0;
			padding:0;
			font-family: sans-serif;
			background-color:#34495e; 
		}
		.box{
			width: 300px;
			padding: 40px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			background-color: #191919;
			text-align: center;
		}
		.box h1{
			color: white;
			text-transform: uppercase;
			font-weight: 500;

		}
		 .box input[type = "text"],.box input[type="file"]{

		 	border:0;
		 	background:none;
		 	display: block;
		 	margin: 20px auto;
		 	text-align: center;
		 	border: 2px solid #3498db;
		 	padding:14px 10px;
		 	width: 200px;
		 	outline: none;
		 	color: white;
		 	border-radius: 24px;
		 	transition: 0.25s;


		 }

		 .box input[type = "text"]:focus,.box input[type="file"]:focus{
		 	width:280px;
		 	border-color: #2ecc71;
		 }
      .box input[type = "submit"]{

		 	border:0;
		 	background:none;
		 	display: block;
		 	margin: 20px auto;
		 	text-align: center;
		 	border: 2px solid  #2ecc71;
		 	padding:14px 40px;
		    cursor: pointer;
		 	outline: none;
		 	color: white;
		 	border-radius: 24px;
		 	transition: 0.25s;


		 }
		   .box input[type = "submit"]:hover{

		 	background-color:  #2ecc71;


		 }

		 

	</style>
</head>
<body>

	<form class="box" action="insert_site.php" method="POST" enctype="multiport/form-data">
		 <h1>Insert Site Details</h1>

		 <input type="text" name="site_title" placeholder="Site Title">
		 <input type="text" name="site_link" placeholder="Site Link">
		 <input type="text" name="site_keywords" placeholder="Site Keywords ">
		 <input type="text" name="site_desc" placeholder="Site Description">
		
		 <input type="submit" name="submit" value="ADD SITE">
		
     </form>

</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "search";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


 


   if(isset($_POST['submit']))

   {
       $site_title = $_POST['site_title'];
       $site_link = $_POST['site_link'];
       $site_keywords = $_POST['site_keywords'];
       $site_desc = $_POST['site_desc'];

       if($site_title=='' || $site_link==''|| $site_keywords=='')
       {
            
         echo "<script>alert('Please fill all the fields!')</script>";
         exit();
       }

    

      // Create connection
              else{
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} 

					$sql = "INSERT INTO sites (site_title, site_link, site_keywords, site_desc)
					VALUES ('$site_title', '$site_link', '$site_keywords','$site_desc');";


				  if ($conn->multi_query($sql) === TRUE) 
					    {
					    echo "<script>alert('Data Inserted Successfully')</script>";
					    } 

					   else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					        }
				}
      }

?>