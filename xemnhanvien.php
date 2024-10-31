<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Nhân viên theo Phòng ban</title>
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

    $idpb = isset($_GET['idpb']) ? $_GET['idpb'] : '';

    if ($idpb) {
        $sql = "SELECT * FROM nhanvien WHERE IDPB = :idpb";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idpb', $idpb);
        $stmt->execute();

        echo "<h2>Danh sách Nhân viên trong phòng ban $idpb</h2>";
        echo "<table>";
        echo "<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['IDNV'] . "</td>";
            echo "<td>" . $row['HoTen'] . "</td>";
            echo "<td>" . $row['IDPB'] . "</td>";
            echo "<td>" . $row['DiaChi'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không tìm thấy mã phòng ban.";
    }

} catch(PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}

$conn = null;
?>

</body>
</html>
