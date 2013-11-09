<?php
$host="codethesolution.com"; //replace with database hostname 
$username="drivemethere"; //replace with database username 
$password="hackathon123!"; //replace with database password 
$db_name="drivemethere"; //replace with database name


$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "select * from Users"; 
$result = mysql_query($sql);
//echo $result;
$json = array();

if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['Users'][]=$row;
}
}
mysql_close($con);
echo json_encode($json); 
?> 