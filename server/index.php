<html lang="en">
<head>
<title>Main table page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Таблица студентов</h1>
<table>
    <tr><th>Id</th><th>Name</th><th>Surname</th><th>AverageMark</th></tr>
<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM students");
foreach ($result as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['namee']}</td><td>{$row['surname']}</td><td>{$row['averageMark']}</td></tr>";
}
?>
</table>
<h3>Ссылки на страницы работы с БД:</h3>
<p><a href="create.php">Добавление записи</a></p>
<p><a href="read.php">Чтение записи</a></p>
<p><a href="update.php">Изменение записи</a></p>
<p><a href="delete.php">Удаление записи</a></p>
</body>
</html>