<html lang="en">
<head>
<title>Add student page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<form method="post" action="<?php $_PHP_SELF ?>" name="createForm">
    Имя:  <input type="text" name="name" /><br />
    Фамилия: <input type="text" name="surname" /><br />
    Средний балл: <input type="text" name="averageMark" /><br />
    <input type="submit" name="submit" value="Создать запись о студенте" />
</form>

<?php

if( isset($_POST['name']) )
    {
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $averageMark = $_POST['averageMark'];

        
        
        $conn = mysqli_connect("db", "user", "password", "appDB");
        if ($conn->connect_error) {
            die("Connection failed: "
                . $conn->connect_error);
        }
        

        $sql = $conn->query("INSERT INTO students (namee, surname, averageMark) VALUES ('$name', '$surname', $averageMark)");
          
        echo '<h3>Вы отправили запись о студенте!</h3>';
        echo 'Имя: ', $name, '<br/>';
        echo 'Фамилия: ', $surname, '<br/>';
        echo 'Средний балл: ', $averageMark, '<br/>';

        
         
        // Close connection
        mysqli_close($conn);
    }
?>

</body>
</html>