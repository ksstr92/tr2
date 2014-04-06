<?php
session_start();
//LOGIN
include($_SERVER['DOCUMENT_ROOT']."/config.php");

$iml=$_POST['email'];
$pwd=$_POST['pwd'];

//CHECK MAIL FORMAT
if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@sunway.edu.my/', $iml)&&!preg_match('/^[a-z0-9&\'\.\-_\+]+@imail.sunway.edu.my/', $iml))
{
	$_SESSION['err']='Invalid Email Address';
	header("Location:http://trades.hep88.com/login.php?err=1");
}
else if($pwd=="")
{
	$_SESSION['err']='Incorrect Password';
	header("Location:http://trades.hep88.com/login.php?err=1");
}
else
{
	$sql= 'SELECT * FROM tbl_usr WHERE Email = "'.$iml.'" AND Password= "'.md5($pwd).'"';
	mysql_query($sql) or die(mysql_error());

	$result = mysql_query($sql)or die(mysql_error());			
	if(mysql_num_rows($result)==0)
	{
		$_SESSION['err']='Incorrect Password/Email combination';
		header("Location:http://trades.hep88.com/login.php?err=1");
	}
	else
	{
		$row=mysql_fetch_array($result);
		if($row['Valid']!='yes')
		{
			$_SESSION['err']='Account is not Active <a href=#>Find out why</a>';
			header("Location:http://trades.hep88.com/login.php?err=1");
		}
		else if($row['Status']!='yes')
		{
			$_SESSION['err']='Account is not Active <a href=#>Find out why</a>';
			header("Location:http://trades.hep88.com/login.php?err=1");
		}
		else
		{
			session_start();
			if(isset($_POST['rmb']))
			{	
				echo "cooke";
				setCookie("rmb", md5($row['Email'].$row['Name']), time() +3600);
			}
			$_SESSION['SID']=$row['SID'];
			$_SESSION['N']=$row['Name'];
			header("location:http://trades.hep88.com");
		}
	}
}
?>
 