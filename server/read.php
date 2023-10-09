<html lang="en">
<head>
<title>Read student page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<form method="post" action="<?php $_PHP_SELF ?>" name="readForm">
    Имя:  <input type="text" name="name" /><br />
    Фамилия: <input type="text" name="surname" /><br />
    Средний балл: <input type="text" name="averageMark" /><br />
    <input type="submit" name="submit" value="Найти студентов" />
</form>

<h1>Таблица студентов</h1>
<table>
    <tr><th>Id</th><th>Name</th><th>Surname</th><th>AverageMark</th></tr>

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
        
        $sql1 = [];
        if(!empty($_POST['name'])){
            $sql1[] = "namee = '$name'";
        }
        if(!empty($_POST['surname'])){
            $sql1[] = "surname = '$surname'";
        }
        if(!empty($_POST['averageMark'])){
            $sql1[] = "averageMark = $averageMark";
        }
        $sql2 = implode(' AND ', $sql1);

        $sql = $conn->query("SELECT * FROM students WHERE $sql2");

        if ($sql->num_rows > 0)
        {
            foreach ($sql as $row){
                echo "<tr><td>{$row['ID']}</td><td>{$row['namee']}</td><td>{$row['surname']}</td><td>{$row['averageMark']}</td></tr>";
            }
        }
        else
        {
            echo "<tr><td>Нет совпадений</td><td>Нет совпадений</td><td>Нет совпадений</td><td>Нет совпадений</td></tr>";
        }
        
        mysqli_close($conn);
    }
?>
<table>         
</body>
</html>