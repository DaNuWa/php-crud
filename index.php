<?php

$name='';
$email='';
$id='';

$update=false;
$mysqli=new mysqli('localhost','root','','crud') or die(mysql_error(mysqli));
if(isset($_POST['ok']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mysqli->query("insert into data (name,email) values('$name','$email')") or die(mysql_error(mysqli));
}

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$mysqli->query("delete from data where id='$id';")or die(mysql_error(mysqli));
}

if(isset($_GET['edit']))
{
	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("select id, name,email from data where id='$id';")or die(mysql_error(mysqli));

	$row=$result->fetch_assoc();
	$name=$row['name'];
	$email=$row['email'];
	$id=$row['id'];
}

if(isset($_POST['update']))
{

	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mysqli->query("update data set name='$name',email='$email' where id='$id'") or die(mysql_error(mysqli));

}


?>

