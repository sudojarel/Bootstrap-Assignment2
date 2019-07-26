<?php
session_start();
include("database_connect.php");
?>
<?php 
if(isset($_POST['update'])){
	$userupdate =" update USER SET
					username='$_POST[name]',
					fname='$_POST[fname]',
					lname='$_POST[lname]',
					email='$_POST[email]'
			WHERE id='$_SESSION[userID]'";		
	mysql_query($userInsert);
	
	$sqlSelect="SELECT * FROM stuent WHERE id='$lastID'";
	$records=mysql_query($sqlSelect);
	$counnt = mysql_num_rows($records);
	
	if($count ==1){
		$field=mysql_fetch_array($records);
		
		$_SESSION['userID'] = $field['userID'];
		$_SESSION['username'] = $field['username'];
		$_SESSION['fname'] = $field['fname'];
		$_SESSION['lname'] = $field['lname'];
		$_SESSION['email'] = $field['email'];
		
		echo"<script
		langauge=Javascript>document.location.href='profile.php'</script>";
	}
	else{
		echo "Not sucessful.";
	}
?>
<form>	
Name<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
FirstName<input type="text" name="username" value="<?php echo $_SESSION['fname']; ?>">
LastName<input type="text" name="username" value="<?php echo $_SESSION['lname']; ?>">
Email<input type="text" name="username" value="<?php echo $_SESSION['email']; ?>">

<input type="submit" name="sub" value="update">

</form>
	