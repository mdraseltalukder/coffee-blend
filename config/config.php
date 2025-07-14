<!--build php connection -->
 <?php 
 $serverName="localhost";
 $username="root";
 $password="";
 $databaseName="coffee_blend";

//  conn with oop

 $conn = new mysqli($serverName, $username, $password, $databaseName);
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
 
 ?>