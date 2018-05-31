<?php

echo '<html><head><title>Welocome to Guestbook</title></head><body>Comment here';
echo '<form method = \'POST\' action = \'#\'>';
echo '<textarea name = \'txtComment\' rows = \'10\' cols = \'75\' required></textarea></br></br>
Name <input type = \'text\' name=\'txtName\' required></br></br>
<input type = \'submit\'name = \'btnComment\' value = \'Comment\'></submit></form>';
echo '</body></html>';

$server = 'localhost';
$un = 'root';
$pw = '';
$db = 'Comments';
$con = mysqli_connect($server,$un,$pw,$db);
$sql = "SELECT username,comment FROM userdata";
	$result = $con->query($sql);
	$com = "";
	if ($result->num_rows > 0) 
	{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        $com .= $row["username"]." : ".$row["comment"]."\n";
    }
    echo "<textarea name = 'txtComment' rows = '10' cols = '75' readonly maxlength='1000'>$com</textarea></br>";
   	}
if(isset($_POST['btnComment']))
{
	$comment = $_POST['txtComment'];
	$user = $_POST['txtName'];
	//userdata table contains username, comment and timestamp
	//$sql = 'select comment from userdata WHERE username = $user';
	$stmt = $con->prepare("insert into userdata(username,comment) values(?,?)");
	$stmt->bind_param("ss", $user, $comment);

	$stmt->execute();
	$stmt->close();
	$con->close();
	header("Refresh:0");
}
?>