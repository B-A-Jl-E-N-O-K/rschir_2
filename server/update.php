<html lang="en">
<head>
<title>Update student page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<form method="post" action="<?php $_PHP_SELF ?>" name="updateForm">
    ID в БД:  <input type="text" name="ID" /><br />
    <p>
    Новые данные <br />
    Имя:  <input type="text" name="name" /><br />
    Фамилия: <input type="text" name="surname" /><br />
    Средний балл: <input type="text" name="averageMark" /><br />
    </p>
    <input type="submit" name="submit" value="Обновить запись о студенте" />
</form>

<?php

if( isset($_POST['ID']) )
    {
        $ID = $_POST['ID'];
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $averageMark = $_POST['averageMark'];

        
        
        $conn = mysqli_connect("db", "user", "password", "appDB");
        if ($conn->connect_error) {
            die("Connection failed: "
                . $conn->connect_error);
        }
        

        $sql = $conn->query("UPDATE students SET namee = '$name', surname = '$surname', averageMark = $averageMark WHERE ID = $ID");
          
        echo '<h3>Вы изменили запись о студенте!</h3>';
        echo 'ID: ', $ID, '<br/>';
        echo 'Имя: ', $name, '<br/>';
        echo 'Фамилия: ', $surname, '<br/>';
        echo 'Средний балл: ', $averageMark, '<br/>';

        
         
        // Close connection
        mysqli_close($conn);
    }
?>

</body>
</html>