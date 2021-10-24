<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Login.css">  
    <title>Đăng nhập</title>
</head>
<body>
    <div class="title-main"><h1>Chào mừng đến với nhà sách TankB!</h1></div>
    <form action="#" class="a00" method="post">
    <img class="img-tankb" src="./tankb.jpg" alt="TankB" />
        <h1>Đăng nhập</h1>
        <div class="a01">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="username" id="">
        </div>
        <div class="a01">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" id="">
        </div>
        <div class="a02">
            <button class="a02-button1" name="loginButton" type="submit">Đăng nhập</button>
            <button class="a02-button2" type="submit"><a href="Register.php">Đăng ký</a></button>
        </div>
        <button class="button3" type="submit">Dành cho nhà phát triển</button>
    </form>
    <?php
        $servername = "localhost";
        $user = "root";
        $pass = "";
        if(isset($_POST['loginButton'])){
            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $connect = new mysqli($servername, $user, $pass, "registeraccount");
            if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $query = "SELECT USERNAME, PASSWORD FROM ACCOUNT WHERE USERNAME = '".$username."' AND PASSWORD = '".$password."'";
            $result = $connect->query($query);
            if ($result->num_rows > 0) {
                echo '<script type="text/javascript">
                        alert ("Đăng nhập thành công!");
                        window.location = "Dashboard.php";
                    </script>';
            } 
            else {
                echo '<script type="text/javascript">
                        alert ("Tài khoản hoặc mật khẩu không chính xác!");
                    </script>';
              }
            $connect->close();
        }
    ?>
</body>
</html>