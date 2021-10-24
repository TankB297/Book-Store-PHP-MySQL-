<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Trang chủ</title>
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
            <h1>Tất cả</h1>
        </div>
        <div class="a03-row">
            <?php
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT ID, BookName, Image, Price FROM BOOK";
        $result = $connect->query($query);
        while($row = mysqli_fetch_array($result, 1)){
            echo '
            <form action="#" method="post" class="a03-item">
                <a class="viewDetail" href="ProductDetail.php?id='.$row['ID'].'"><img src="'.$row['Image'].'" alt="Sach van hoc 01"></a>
                <a class="viewDetail" href="ProductDetail.php?id='.$row['ID'].'">"><h2 class="title-item">
                '.$row['BookName'].'
            </h2></a>
            <a class="viewDetail" href="ProductDetail.php?id='.$row['ID'].'">
                <h2 class="price-item">'.$row['Price'].' đ</h2>
            </a>
            <button name="addToCartButton" class="addToCart">
                <a class="linkAddToCart" href="Dashboard.php?id='.$row['ID'].'">
                    Thêm vào giỏ hàng
                </a>
            </button>
            </form>
            ';
            }
            $connect->close();
            ?>
        </div>
    </div>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $inputAmount = isset($_POST['inputAmount']) ? (int)$_POST['inputAmount'] : 1;
        $query1 = "SELECT *
        FROM Book
        WHERE ID = $id";
        $result1 = $connect->query($query1);
        $row = mysqli_fetch_assoc($result1);
        $Total = $row['Price']*$inputAmount;
        $query3 = "INSERT INTO CART(ID, IMAGE, BOOKNAME, CATEGORY, PRICE, AMOUNT, TOTAL	
        ) VALUES ('".$row['iD']."', '".$row['Image']."', '".$row['BookName']."', '".$row['Category']."', '".$row['Price']."', '".$inputAmount."', '".$Total."')";
        $result01 = $connect->query($query3);
        $connect->close();
        if(isset($result01)){
            echo '<script type="text/javascript">
                    alert ("Thêm vào giỏ hàng thành công!");
                  </script>';
        }
    else{
    echo '<script type="text/javascript">
    alert("Mất kết nối với cơ sở dữ liệu!");
    </script>';
    }
}
    ?>
    <div class="a04">
        <h2>
            Bản quyền thuộc về TankBee Company
        </h2>
    </div>
</body>

</html>