<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Purchase.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Thanh toán</title>
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
            <h1>Thanh toán</h1>
        </div>
        <?php
            $servername = "localhost";
            $user = "root";
            $pass = "";
            $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query1 = "SELECT *
        FROM Cart";
        $result = $connect->query($query1);
        while($row = mysqli_fetch_array($result, 1)){
            echo '
        <form action="#" method="post" class="theCart-main">
            <div class="theCart-item">
                <h1>Sản phẩm</h1>
                <img class="productIMG" src="'.$row['Image'].'" alt="sachvanhoc">
            </div>
            <div class="theCart-item">
                <h1>Tên sản phẩm</h1>
                <h2>'.$row['BookName'].'</h2>
            </div>
            <div class="theCart-item">
                <h1>Loại sản phẩm</h1>
                <h2>'.$row['Category'].'</h2>
            </div>
            <div class="theCart-item">
                <h1>Đơn giá</h1>
                <h2>'.$row['Price'].' đ</h2>
            </div>
            <div class="theCart-item">
                <h1>Số lượng</h1>
                <h2>'.$row['Amount'].'</h2>
            </div>
            <div class="theCart-item">
                <h1>Tổng tiền</h1>
                <h2>'.$row['Total'].' đ</h2>
            </div>
            <div class="theCart-item">
                <h1>Xóa</h1>
                <a name="deleteItem" href="Purchase.php?id='.$row['Id'].'">
                        <img class="deleteButton" src="bin.png" alt="deleteButton">
                </a>
            </div>
        </form>
    ';
    }
    $connect->close();
    ?>
        <div class="clientMain">
            <h2>Thông tin thanh toán:</h2>
            <div class="clientInfor">
                <div class="inforLabel">
                    <h2>Họ và tên:</h2>
                    <h2>Địa chỉ:</h2>
                    <h2>Số điện thoại:</h2>
                    <h2>Ghi chú thêm</h2>
                </div>
                <div class="inforInput">
                    <input type="text" name="fullName" id="">
                    <input type="text" name="address" id="">
                    <input type="text" name="phoneNumber" id="">
                    <input type="text" name="note" id="">
                </div>
            </div>
        </div>
        <?php
            $servername = "localhost";
            $user = "root";
            $pass = "";
            $connect = new mysqli($servername, $user, $pass, "registeraccount");
            if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $query04 = "SELECT SUM(Total) AS T FROM Cart";
            $result04 = $connect->query($query04);
            $row04 = mysqli_fetch_assoc($result04);
            echo "<h2 class='Total'>Tổng tiền: ".$row04['T']." đ</h2>";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            if(isset($id) && $id != ""){
            $query03 = "DELETE FROM Cart WHERE Id = $id";
            $result03 = $connect->query($query03);
            $connect->close();
            echo '<script type="text/javascript">
            alert("Xóa thành công khỏi giỏ hàng!");
            window.location = "Purchase.php";
        </script>';
        }
    ?>
        <form action="#" method="post">
            <button name="final" class="purchase">Đặt hàng</button>
        </form>
        <?php
            if(isset($_POST['final'])){
                   Alert();
            }

            function Alert(){
                echo '<script type="text/javascript">
                alert("Đặt hàng thành công, xin mời quý khách tiếp tục xem những sản phẩm khác!");
                window.location = "Dashboard.php";
                </script>';
            }
        ?>
    </div>
    <div class="a04">
        <h2>
            Bản quyền thuộc về TankBee Company
        </h2>
    </div>
</body>

</html>