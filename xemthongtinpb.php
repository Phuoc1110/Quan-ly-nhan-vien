<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Phòng ban</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dulieu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM phongban";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "<table>";
    echo "<tr><th>Mã Phòng Ban</th><th>Tên Phòng Ban</th><th>Mô tả</th><th>Xem Nhân Viên</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['IDPB'] . "</td>";
        echo "<td>" . $row['Tenpb'] . "</td>";
        echo "<td>" . $row['MoTa'] . "</td>";
        echo "<td><a href='xemnhanvien.php?idpb=" . $row['IDPB'] . "'>xxx</a></td>";
        echo "</tr>";
    }
    echo "</table>";

} catch(PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}

$conn = null;
?>

</body>
</html>
