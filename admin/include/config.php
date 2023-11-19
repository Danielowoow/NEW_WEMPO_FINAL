<?php
define('DB_SERVER','srv1181.hstgr.io');
define('DB_USER','u519463083_admin');
define('DB_PASS' ,'Megustalapera123.');
define('DB_NAME', 'u519463083_db_wempo');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>