
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
	<title>Stranica za izmenu podataka</title>
</head>
<body>
	<?php 
	require 'connection.php';
	$id = $_GET['id'];
	$sql = "SELECT * FROM tasks WHERE idtasks = :id";
	$stmt = $pdo->prepare($sql);	
	$stmt->execute(['id'=> $id]);
	$tasks = $stmt->fetch(PDO::FETCH_ASSOC);
?>
 <form method="POST" action ="edit-sql.php">
          

            <label for ="name">Ime:</label>
            <input type="text" name="name" id ="name" value="<?php echo $tasks['name'] ?>" ><br>
            
            <label for ="lastname">Prezime:</label>
            <input type="text" name="lastname" id ="lastname" value="<?php echo $tasks['lastname'] ?>" ><br>
         
            
           <label for="year">Godina upisa</label>
           <input type="number" name="year" id ="year" value="<?php echo $tasks['year'] ?>"><br>
            
            <label for="num">Broj upisa</label>
           <input type="number" name="num" id ="num" value="<?php echo $tasks['num'] ?>" ><br>
            
			 <input type="hidden" name="id" value="<?php echo $tasks['idtasks']; ?>">
            <input type = "submit" value="Update">
        </form>
</body>
</html>