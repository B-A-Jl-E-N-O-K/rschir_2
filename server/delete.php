<html lang="en">
<head>
<title>Delete student page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<form method="post" action="<?php $_PHP_SELF ?>" name="deleteForm">
    ID в БД:  <input type="text" name="ID" /><br />
    <input type="submit" name="submit" value="Удалить запись о студенте" />
</form>

<?php

if( isset($_POST['ID']) )
    {
        $ID = $_POST['ID'];
        
        
        $conn = mysqli_connect("db", "user", "password", "appDB");
        if ($conn->connect_error) {
            die("Connection failed: "
                . $conn->connect_error);
        }
        
        
        $sql = $conn->query("DELETE FROM students WHERE ID = $ID");
        
        if($sql == True)
        {
            echo '<h3>Вы удалили запись о студенте!</h3>';
            echo 'ID: ', $ID, '<br/>';
        }
        else
        {
            echo "Error: " . $conn->error;
        }

        
             
        // Close connection
        mysqli_close($conn);
    }
?>

</body>
</html>