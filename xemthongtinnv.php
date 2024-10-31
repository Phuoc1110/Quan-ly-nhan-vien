<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Nhân viên</title>
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
    // Kết nối đến cơ sở dữ liệu
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn dữ liệu từ bảng nhanvien
    $sql = "SELECT * FROM nhanvien";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Tạo bảng HTML để hiển thị dữ liệu
    echo "<table>";
    echo "<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>";

    // Duyệt qua từng dòng dữ liệu và hiển thị
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['IDNV'] . "</td>";
        echo "<td>" . $row['HoTen'] . "</td>";
        echo "<td>" . $row['IDPB'] . "</td>";
        echo "<td>" . $row['DiaChi'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch(PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>

</body>
</html>
