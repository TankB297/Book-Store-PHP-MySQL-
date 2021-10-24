<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Dashboard4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Chính sách</title>
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
            <h1>Chính sách bảo mật</h1>
        </div>
        <div class="policy-content">
            <p>
                Việc bảo lưu thông tin cá nhân của quý khách nhằm giúp chúng tôi có điều kiện nâng cao chất lượng dịch
                vụ để phục vụ quý khách hàng ngày một tốt hơn. Nhà sách TankB cam kết sử dụng thông tin khách hàng một
                cách hợp lý và bảo mật nhất.<br>
                <br>
                ● Về Việc Bảo Lưu Thông Tin Khách Hàng<br>

                Để sử dụng và trải nghiệm các dịch vụ của Nhà sách TankB, bạn cần đăng ký tài khoản và cung cấp một số
                thông tin như: email, họ tên, số điện thoại, địa chỉ và một số thông tin khác. Bạn có thể tùy chọn không
                cung cấp cho chúng tôi một số thông tin nhất định nhưng sẽ có một chút bất tiện vì khi đó, bạn sẽ không
                thể được hưởng một số tiện ích mà những tính năng của chúng tôi cung cấp.<br>

                Mọi thông tin bạn nhập trên website sẽ được lưu trữ để sử dụng cho mục đích phản hồi yêu cầu của khách
                hàng, đưa ra những gợi ý‎ phù hợp cho từng khách hàng khi mua sắm tại website, nâng cao chất lượng hàng
                hóa dịch vụ và liên lạc với khách hàng khi cần thiết.<br>
                <br>
                ● Mục Đích Sử Dụng Thông Tin<br>

                Mục đích của việc bảo lưu thông tin là nhằm xây dựng Nhà sách TankB trở thành một website bán hàng trực
                tuyến mang lại nhiều tiện ích nhất cho khách hàng. Vì thế, việc sử dụng thông tin sẽ phục vụ những hoạt
                động sau:
                <br>
                - Gửi newsletter giới thiệu sản phẩm mới và những chương trình khuyến mãi của Nhà sách TankB.
                <br>
                - Cung cấp một số tiện ích, dịch vụ hỗ trợ khách hàng.
                <br>
                - Nâng cao chất lượng dịch vụ khách hàng của Nhà sách TankB.
                <br>
                - Làm cơ sở giải quyết các vấn đề khiếu nại, tranh chấp phát sinh liên quan đến việc sử dụng sản phẩm,
                dịch vụ tại website Nhà sách TankB.
                <br>
                - Ngăn chặn những hoạt động vi phạm pháp luật Việt Nam
                <br><br>
                ● Chia Sẻ Thông Tin
                <br>
                Chúng tôi sẽ không chia sẻ thông tin của bạn trừ những trường hợp cụ thể sau đây:
                <br>
                - Để bảo vệ Nhà sách TankB và các bên thứ ba khác: Chúng tôi chỉ đưa ra thông tin tài khoản và những
                thông tin cá nhân khác khi tin chắc rằng việc đưa những thông tin đó là phù hợp với luật pháp, bảo vệ
                quyền lợi, tài sản của người sử dụng dịch vụ, của Nhà sách TankB và các bên thứ ba khác.
                <br>
                - Theo yêu cầu pháp l‎ý từ một cơ quan chính phủ hoặc khi chúng tôi tin rằng việc làm đó là cần thiết và
                phù hợp nhằm tuân theo các yêu cầu pháp l‎ý.
                <br>
                - Trong những trường hợp còn lại, chúng tôi sẽ có thông báo cụ thể cho bạn khi phải tiết lộ thông tin
                cho một bên thứ ba và thông tin này chỉ được cung cấp khi được sự phản hồi đồng ‎ý‎ từ phía bạn.
                <br><br>
                ● Chính Sách Cam Kết Bảo Mật Thông Tin Khách Hàng
                <br>
                - Chúng tôi cam kết không tiết lộ thông tin khách hàng, không bán hoặc chia sẻ thông tin khách hàng của
                Nhà sách TankB cho bên thứ ba nào khác vì mục đích thương mại.
                <br>
                - Chúng tôi cam kết mọi thông tin thanh toán giao dịch trực tuyến của khách hàng đều được bảo mật và an
                toàn. Các thông tin tài khoản ngân hàng, thông tin thẻ tín dụng hay thông tin tài chính đều không bị lưu
                lại dưới bất kỳ hình thức nào.
                <br>
                - Quý khách không nên trao đổi những thông tin cá nhân và thông tin thanh toán của mình cho bên thứ ba
                nào khác để tránh rò rỉ thông tin. Khi sử dụng chung máy tính với nhiều người, vui lòng thoát khỏi tài
                khoản sau khi sử dụng dịch vụ của website chúng tôi để tự bảo vệ thông tin về mật khẩu truy cập của
                mình.
                <br><br>
                Nhà sách TankB hiểu rằng quyền lợi của bạn trong việc bảo vệ thông tin cá nhân cũng chính là trách nhiệm
                của chúng tôi nên trong bất kỳ trường hợp có thắc mắc, góp ý nào liên quan đến chính sách bảo mật của
                Nhà sách TankB, vui lòng liên hệ với chúng tôi qua số điện thoại 0966.505.646 để được phúc đáp, giải
                quyết thắc mắc trong thời gian sớm nhất.
            </p>
        </div>
    </div>
    </div>
    <div class="a04">
        <h2>
            Bản quyền thuộc về TankBee Company
        </h2>
    </div>
</body>

</html>