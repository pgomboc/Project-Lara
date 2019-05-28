<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

input[type=text], select {
  
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
button{
	
	  display: inline-block;
  cursor: pointer;
  text-align: center;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
 font-color:white;
 width:80px;
}
</style>
</head>
<body>
    <?php
        require 'connection.php';
        $sql = "SELECT * FROM tasks";
        $stmt = $pdo->query($sql);
       $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
       //var_dump($tasks);
       ?>
    
    <table> 
        <tr><th>IME</th>
            <th>Prezime</th>
            <th>Godina upisa</th>
            <th>Broj upisa</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
         <tr>
        <td>
        <?php foreach($tasks as $task): ?>
                <?= $task['name']?>
                 <br/>
        <?php endforeach; ?>
       
          </td>  
          <td>
          <?php foreach($tasks as $task): ?>
                <?= $task['lastname']?>
                <br/>
        <?php endforeach; ?>
          </td>
          <td><?php foreach($tasks as $task): ?>
                <?= $task['year']?>
                <br/>
        <?php endforeach; ?>
        </td>
        <td><?php foreach($tasks as $task): ?>
            <?= $task['num']?>
            <br/>
        <?php endforeach; ?>
        </td>
              <td>
            <?php foreach($tasks as $task): ?>
            <a href="edit.php?id=<?= $task['idtasks']?>" style="decoration:none;">
				    <button>Edit </button></a>
            <br/>
                    <?php endforeach; ?>
              </td>
			  <td><?php foreach($tasks as $task): ?>
        
                <button name="delete-user" id="delete_button" onClick="delete_row(<?=$task['idtasks']?>)" class="delete-button">
              Delete</button>
            <br/>
                    <?php endforeach; ?>
              </td>
          </tr>
    </table>
        <form method="POST" action ="home-form.php">
          
            <label for ="name">Ime:</label>
            <input type="text" name="name" id ="name" ><br>
            <p> <?php
                if(isset( $_GET['nameErr']))
                    echo $_GET['nameErr'];
                ?>
              </p>
            <label for ="lastname">Prezime:</label>
            <input type="text" name="lastname" id ="lastname" ><br>
              <p><?php
                if(isset( $_GET['lastnameErr']))
                    echo $_GET['lastnameErr'];
                ?>
            </p>
            
           <label for="year">Godina upisa</label>
           <input type="number" name="year" id ="year" ><br>
            <p><?php
                if(isset( $_GET['yearErr']))
                    echo $_GET['yearErr'];
                ?>
            </p>
            <label for="num">Broj upisa</label>
           <input type="number" name="num" id ="num" ><br>
            <p><?php
                if(isset( $_GET['numErr']))
                    echo $_GET['numErr'];
                ?>
              </p>
            <input type = "submit">
        </form>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>

</html>
</body>
</html>