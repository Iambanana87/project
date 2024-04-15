<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy ID tài khoản từ yêu cầu Ajax
$accountId = $_POST['id'];

// Thực hiện xóa tài khoản trong cơ sở dữ liệu
$sql = "DELETE FROM user_form WHERE id = $accountId";
if ($conn->query($sql) === TRUE) {
    echo "Tài khoản đã được xóa thành công!";
} else {
    echo "Lỗi khi xóa tài khoản: " . $conn->error;
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
