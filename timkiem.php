<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Thông Tin Nhân Viên</title>
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

    <h2>Tìm Kiếm Thông Tin Nhân Viên</h2>

    <form method="POST" action="">
        <label>IDNV</label>
        <input type="radio" name="search_type" value="idnv" checked> 
        <label>Họ tên</label>
        <input type="radio" name="search_type" value="hoten"> 
        <label>Địa chỉ</label>
        <input type="radio" name="search_type" value="diachi"> 
        <br><br>

        <label>Nhập vào thông tin: </label>
        <input type="text" name="search_value" required> 
        <button type="submit" name="search">OK</button>
        <button type="reset">Reset</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $search_type = $_POST['search_type'];
            $search_value = $_POST['search_value'];

            if ($search_type == "idnv") {
                $sql = "SELECT * FROM nhanvien WHERE IDNV = :search_value";
            } elseif ($search_type == "hoten") {
                $sql = "SELECT * FROM nhanvien WHERE Hoten LIKE :search_value";
                $search_value = "%$search_value%"; 
            } elseif ($search_type == "diachi") {
                $sql = "SELECT * FROM nhanvien WHERE Diachi LIKE :search_value";
                $search_value = "%$search_value%"; 
            }

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':search_value', $search_value);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<h3>Kết quả tìm kiếm:</h3>";
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
                echo "<p>Không tìm thấy kết quả phù hợp.</p>";
            }

        } catch(PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>

</body>
</html>
