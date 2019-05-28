<?php

include "connection.php";

if (isset($_POST['delete_row'])) {
        $row_no = $_POST['row_id'];
       
        $stmt = $pdo->prepare("
                  DELETE FROM tasks
                  WHERE idtasks=:id;
     ");
    
    $stmt->execute([
        'id' =>$row_no
    ]);
        echo "success";
        exit;
    }
   
    ?>