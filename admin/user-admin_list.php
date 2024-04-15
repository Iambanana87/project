<?php
include "header.php";
include "slider.php";
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

// Truy vấn để lấy danh sách tài khoản
$sql = "SELECT * FROM user_form";
$result = $conn->query($sql);

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #ff6666;
            color: #fff;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="admin-content-right">
<div class="admin-content-right-cartegory-list">
    <h1>Account List</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>User Type</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['user_type'] . "</td>";
                echo "<td><button class='delete-btn' onclick='deleteAccount(" . $row['id'] . ")'>Xóa</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No accounts found.</td></tr>";
        }
        ?>
    </table>

    <script>
        function deleteAccount(accountId) {
                if (confirm("Bạn có chắc muốn xóa tài khoản này không?")) {
                    // Gửi yêu cầu Ajax đến server để xóa tài khoản
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "delete_account.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Xử lý kết quả trả về từ server (nếu cần)
                            var response = xhr.responseText;
                            alert(response); // Hiển thị thông báo từ server
                            // Reload trang để cập nhật danh sách tài khoản sau khi xóa
                            location.reload();
                        }
                    };
                    xhr.send("id=" + accountId);
                }
            }
    </script>

</body>
</html>