<?php
require_once("../Controller/check_online.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checking...</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <style>
        .masthead {
            position: relative;
            height: 100vh;
            min-height: 500px;
            background-color: rgba(0, 0, 0, .6);
            width: 100%;
        }

        #logo_homestay {
            background-color: #FEE140;
            background-image: linear-gradient(90deg, #FEE140 0%, #FA709A 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html" id="logo_homestay">EAT Homestay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/account.php">Account</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../View/rooms.php">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <!-- Show Content -->
                    <?php
                    require_once("../conn.php");
                    $sql = "SELECT * FROM temporary";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_row($result);
                    if (empty($data)) {
                        ?>
                        <div id="contents-error"></div>
                    <?php
                    } else {
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                            require_once("../conn.php");
                            $sql = "SELECT * FROM room WHERE id = $id";
                            $result = $conn->query($sql);
                            if ($result->num_rows == 1) {
                                $row = $result->fetch_assoc();
                            }
                        }
                        ?>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
                            <h1 class="align-center border-bottom pb-3 inline-block align-content-center text-success">Bạn đã chọn phòng
                                <?php echo $row["name"] ?> ! </h1>
                            <div class="inline-block align-middle">
                                <h2 class="font-weight-normal lead"></h2>
                                <a class="btn btn-success text-center" href="../View/confirm_booking.php?id=<?php echo $row["id"] ?>"> <i class="fas fa-hotel"></i> Bấm vào đây để tiếp tục</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>


    <!-- Scripts -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#contents-error").load('../View/error_checkin.html');
        });
    </script>
</body>

</html>