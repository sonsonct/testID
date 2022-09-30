<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    if(empty($fname)){
        echo "vui long nhap fname";
    }if(empty($lname)){
        echo "vui long nhap lname";
    }if(empty($email)){
        echo "vui long nhap email";
    }
}

$link = mysqli_connect("localhost", "root", "", "testid");
 
// Kiểm tra kết nối
if($link === false){
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}
 
// Cố gắng thực hiện câu lệnh INSERT
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$fname', '$lname', '$email')";
if(mysqli_query($link, $sql)){
    // Lấy ID đã chèn cuối cùng
    $last_id = mysqli_insert_id($link);
    echo "Chèn bản ghi thành công. ID đã chèn cuối cùng là: " . $last_id;
} else{
    echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($link);
}
 
// Đóng kết nối
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<body>

<h2>Nhập Thông Tin</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br>
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>

