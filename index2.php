<!DOCTYPE html>
	<html>
	<head>
		<title>Php crud</title>
	</head>
	<body>

		<?php 
		
			$mysqli=new mysqli('localhost','root','','crud') or die(mysql_error(mysqli));

			$result=$mysqli->query("select * from data") or die(mysql_error($mysqli));

		?>
		<div>
			<table>
				<tr>
					<th>Name</th>
					<th>Email</th>

				</tr>
				<?php while($row=$result->fetch_assoc()):?>
				<tr>
					<td><?php echo $row['name'];?></td>

					<td><?php echo $row['email'];?></td>

					<td><a href="index.php?delete= <?php echo $row['id'];?>">delete</a></td>

					<td><a href="index2.php?edit= <?php echo $row['id'];?>">edit</a></td>
				</tr>
				<?php endwhile;?>

			</table>
		</div>
			

		
		<?php require_once 'index.php'?>
		
		<form method="post" action='index.php'>
			<input type="text" name="id" value="<?php echo $id ?>">
			<input type="text" name="name" value="<?php echo $name ?>">
			<input type="email" name="email" value="<?php echo $email ?>">
			<?php if($update==true):?>
			<button name="update" type="submit">update</button>
			<?php else:?>
			<button name="ok" type="submit">save</button>
			<?php endif;?>
		</form>
	
	</body>
	</html>	