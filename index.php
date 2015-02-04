<?php 

$host = "br-cdbr-azure-south-a.cloudapp.net";
$user = "b33f81945fc541";
$pwd = "a2536739";
$db = "gatopolisphpdb";

$conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql_select = "SELECT * FROM user_test";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
	foreach($registrants as $registrant) {
		echo $registrant['name']."<br />";
	}
}


?>