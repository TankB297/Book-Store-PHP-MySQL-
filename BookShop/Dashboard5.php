<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Dashboard5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Liên hệ</title>
</head>

<body>
    <form action="#" method="post" class="a00-top">
        <img class="tankb-img" src="tankb.jpg" alt="TankBShop" />
        <h1 class="title-top">Nhà sách TankB</h1>
        <div action="#" method="post" class="a00-input">
            <input type="text" name="searchBookName" id="" placeholder="Tìm kiếm tên sách..." />
            <button name="searchBookButton" class="search-button" type="submit">
                <img class="search-img" src="search.png" alt="Search">
            </button>
        </div>
        <button name="moveToCart" class="cart-button" type="submit">
            <img class="cart-img" src="Cart.png" alt="Cart">
        </button>
    </form>
    <?php
            if(isset($_POST['searchBookButton'])){
                if(isset($_POST['searchBookName'])){
                $searchBookName = $_POST['searchBookName'];
                $servername = "localhost";
                $user = "root";
                $pass = "";
                $connect = new mysqli($servername, $user, $pass, "registeraccount");
                if ($connect->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "SELECT ID FROM BOOK WHERE BookName = '".$searchBookName."'";
                $result = $connect->query($query);
                $row = mysqli_fetch_assoc($result);
                if(isset($row)){
                        echo '<script type="text/javascript">
                            window.location = "Search.php?id='.$row['ID'].'";
                          </script>
            ';
            $connect->close();
            }
            else{
                echo '<script type="text/javascript">
                        alert("Không có sản phẩm này!");
                      </script>';
            }
    }
}
    ?>
    <?php
        if(isset($_POST['moveToCart'])){
            echo '<script type="text/javascript">
            window.location = "TheCart.php";
        </script>';
        }
    ?>
    <form action="#" method="post" class="a00">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars" id="active"></i>
        </label>
        <button name="Dashboard" class="a01-main">
            <h1>Trang chủ</h1>
        </button>
        <div class="a01-main">
            <input type="checkbox" id="navbar">
            <label for="navbar" class="navbar-button">
                <h1>Thể loại</h1>
            </label>
            <div class="a01-content">
                <button name="Literature" class="a02">
                    <h1>Văn học</h1>
                </button>
                <button name="Economic" class="a02">
                    <h1>Kinh tế</h1>
                </button>
                <button name="Skills" class="a02">
                    <h1>Kỹ năng</h1>
                </button>
            </div>
        </div>
        <button name="Policy" class="a01-main">
            <h1>Chính sách</h1>
        </button>
        <button name="Contact" class="a01-main">
            <h1>Liên hệ</h1>
        </button>
    </form>
    <?php
        if(isset($_POST['Dashboard'])){
            echo '<script type="text/javascript">
            window.location = "Dashboard.php";
        </script>';
        }
        else if(isset($_POST['Literature'])){
            echo '<script type="text/javascript">
            window.location = "Dashboard1.php";
        </script>';
        }
        else if(isset($_POST['Economic'])){
            echo '<script type="text/javascript">
            window.location = "Dashboard2.php";
        </script>';
        }
        else if(isset($_POST['Skills'])){
            echo '<script type="text/javascript">
            window.location = "Dashboard3.php";
        </script>';
        }
        else if(isset($_POST['Policy'])){
            echo '<script type="text/javascript">
            window.location = "Dashboard4.php";
        </script>';
        }
        else if(isset($_POST['Contact'])){
            echo '<script type="text/javascript">
            window.location = "Dashboard5.php";
        </script>';
        }
    ?>
    <div class="a03">
        <div class="title-mid">
            <h1>Liên hệ với chúng tôi</h1>
        </div>
        <form action="#" method="post" class="contact-content">
            <div class="contact-item">
                <button type="submit">
                    <img src="Hotline.png" alt="Hotline">
                </button>
                <h2>Hotline: 0966.505.646</h2>
            </div>

            <div class="contact-item">
                <button name="fb" type="submit">
                    <img src="Facebook.png" alt="Facebook">
                </button>
                <h2><a href="https://www.facebook.com/tank.nguyen.92/">Facebook: Nguyễn Tuấn Anh</a></h2>
            </div>

            <div class="contact-item">
                <button name="ins" type="submit">
                    <img src="Instagram.png" alt="Instagram">
                </button>
                <h2><a href="https://www.instagram.com/tankbee297/">Instagram: @tankbee297</a></h2>
            </div>

            <div class="contact-item">
                <button type="submit">
                    <img src="Gmail.png" alt="Gmail">
                </button>
                <h2>Gmail: tankjerry511@gmail.com</h2>
            </div>
        </form>
        <?php
        if(isset($_POST['fb'])){
            echo '<script type="text/javascript">
            window.location = "https://www.facebook.com/tank.nguyen.92/";
        </script>';
        }
        else if(isset($_POST['ins'])){
            echo '<script type="text/javascript">
            window.location = "https://www.instagram.com/tankbee297/";
        </script>';
        }
    ?>
    </div>
    </div>
    <div class="a04">
        <h2>
            Bản quyền thuộc về TankBee Company
        </h2>
    </div>
</body>

</html>