<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ProductDetail.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Chi tiết sản phẩm</title>
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
            <h1>Chi tiết sản phẩm</h1>
        </div>
        <?php
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM BOOK WHERE ID = $id";
        $result = $connect->query($query);
        while($row = mysqli_fetch_array($result, 1)){
            echo '
            <div class="body01">
            <div class="body01-left">
                <img src="'.$row['Image'].'" alt="Sach van hoc 01">
            </div>
            <form action="#" method="post" class="body01-right">
                <h1>'.$row['BookName'].'</h1>
                <h1>'.$row['Price'].' đ</h1>
                <div class="body01-right-infor">
                    <div class="body01-right-infor-title">
                        <h2>Nhà bán hàng:</h2>
                        <h2>Mã sản phẩm:</h2>
                        <h2>Thể loại:</h2>
                        <h2>Còn hàng:</h2>
                        <h2>Số lượng:</h2>
                    </div>
                    <div class="body01-right-infor-content">
                        <h2>Nhà sách TankB</h2>
                        <h2>00'.$row['iD'].'</h2>
                        <h2>'.$row['Category'].'</h2>
                        <h2>'.$row['Amount'].' sản phẩm</h2>
                        <div class="body01-right-button">
                        <span class="input-number-decrement">–</span><input name="inputAmount" class="input-number" type="text" value="1" min="0" max="50"><span class="input-number-increment">+</span>
                        </div>
                    </div>
                </div>
                <div class="body01-right-infor-buynow">
                    <button name="buynowButton" class="btn03">Mua ngay</button>
                    <button name="addToCartButton" class="btn04">Thêm vào giỏ hàng</button>
                </div>
            </form>
        </div>
        <div class="body02-top">
            <h1>Mô tả sản phẩm</h1>
        </div>
        <div class="body02-mid">
            <p>
                '.$row['Description'].'
            </p>
        </div>
    ';
    }
    $connect->close();
    }
    else{
    echo '<script type="text/javascript">
    alert("Không tìm được sản phẩm!");
    window.location = "Dashboard.php";
    </script>';
    }
    ?>
        <div class="body03-title">
            <h1>Có thể bạn quan tâm</h1>
        </div>
        <div class="main">
            <div class="slider slider-nav">
                <?php
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        $query1 = "SELECT ID, Image, Price
        FROM Book
        WHERE Category = ANY(
        SELECT Category
        FROM Book
        WHERE ID = $id
        )";
        $result = $connect->query($query1);
        while($row = mysqli_fetch_array($result, 1)){
            echo '
            <div class="main-div">
                <a href="ProductDetail.php?id='.$row['ID'].'"><img class="main-img" src="'.$row['Image'].'" alt="sach van hoc"></a>
                <a href="ProductDetail.php?id='.$row['ID'].'"><h2>'.$row['Price'].' đ</h2></a>     
            </div>
    ';
    }
    $connect->close();
    //<a href="ProductDetail.php?id='.$row['ID'].'"></a>
    }
    else{
    echo '<script type="text/javascript">
    alert("Mất kết nối với cơ sở dữ liệu!");
    </script>';
    }
    ?>

            </div>
        </div>
        <script type="text/javascript">
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 9,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            focusOnSelect: true,
            autoplay: true,
            autoplaySpeed: 2000
        });
        </script>
        <script type="text/javascript">
        (function() {

            window.inputNumber = function(el) {

                var min = el.attr('min') || false;
                var max = el.attr('max') || false;

                var els = {};

                els.dec = el.prev();
                els.inc = el.next();

                el.each(function() {
                    init($(this));
                });

                function init(el) {

                    els.dec.on('click', decrement);
                    els.inc.on('click', increment);

                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if (!min || value >= min) {
                            el[0].value = value;
                        }
                    }

                    function increment() {
                        var value = el[0].value;
                        value++;
                        if (!max || value <= max) {
                            el[0].value = value++;
                        }
                    }
                }
            }
        })();
        inputNumber($('.input-number'));
        </script>
    </div>
    <div class="a04">
        <h2>
            Bản quyền thuộc về TankBee Company
        </h2>
    </div>
    <?php
    if(isset($_POST['addToCartButton'])){
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $inputAmount = isset($_POST['inputAmount']) ? (int)$_POST['inputAmount'] : 1;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
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
    }
    else{
    echo '<script type="text/javascript">
    alert("Mất kết nối với cơ sở dữ liệu!");
    </script>';
    }
    }
    ?>
    <?php
        if(isset($_POST['buynowButton'])){
            $servername = "localhost";
        $user = "root";
        $pass = "";
        $connect = new mysqli($servername, $user, $pass, "registeraccount");
        if ($connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $inputAmount = isset($_POST['inputAmount']) ? (int)$_POST['inputAmount'] : 1;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
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
                    alert ("Thêm vào giỏ hàng thành công! Chuyển tới thanh toán!");
                    window.location = "Purchase.php";
                  </script>';
        }
    }
    else{
    echo '<script type="text/javascript">
    alert("Mất kết nối với cơ sở dữ liệu!");
    </script>';
    }
        }
    ?>
</body>

</html>