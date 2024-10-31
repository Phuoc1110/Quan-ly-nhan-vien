<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dulieu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $id = $_GET['id'];

    $sql = "DELETE FROM nhanvien WHERE IDNV = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "Xóa thành công!";
    } else {
        echo "Lỗi khi xóa!";
    }

} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}

$conn = null;

header("Location: xoanv.php");
exit();
?>
