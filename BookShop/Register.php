<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Register.css">  
    <title>Đăng ký</title>
</head>
<body>
    <div class="title-main"><h1>Chào mừng đến với nhà sách TankB!</h1></div>
    <form class="a00" action="#" method="post">
        <img class="img-tankb" src="./tankb.jpg" alt="TankB" />
        <h1>Đăng ký</h1>
        <div class="a01">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="username" id="">
        </div>
        <div class="a01">
            <label for="">Mật khẩu</label>
            <input type="password" name="pass1" id="">
        </div>
        <div class="a01">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="pass2" id="">
        </div>
        <div class="a02">
            <button class="a02-button2" name="registerButton" type="submit">Đăng ký</button>
        </div>
    </form>
    <?php
        $servername = "localhost";
        $user = "root";
        $pass = "";
        if(isset($_POST['registerButton'])){
            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $pass1 = isset($_POST['pass1']) ? $_POST['pass1'] : "";
            $pass2 = isset($_POST['pass2']) ? $_POST['pass2'] : "";
            if($pass1 == $pass2){
                $connect = new mysqli($servername, $user, $pass, "registeraccount");
                if ($connect->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query1 = "SELECT USERNAME FROM ACCOUNT WHERE USERNAME = '".$username."'";
                $result = $connect->query($query1);
                if ($result->num_rows > 0) {
                echo '<script type="text/javascript">
                        alert ("Tên đăng nhập đã tồn tại!");
                    </script>';
                } else {
                    $query = "INSERT INTO ACCOUNT(USERNAME, PASSWORD) VALUES ('".$username."', '".$pass1."')";
                    mysqli_query($connect, $query);
                    $connect->close();
                    echo '<script type="text/javascript">
                        alert ("Đăng ký thành công!");
                        window.location = "Login.php";
                    </script>';
                }
                }
                else if($pass1 != $pass2){
                echo '<script type="text/javascript">
                        alert ("Mật khẩu không trùng khớp!");
                    </script>';
            }
        }
    ?>
</body>
</html>