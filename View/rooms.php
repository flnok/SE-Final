<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rooms</title>

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
            background-color: #fefefe;
            width: 100%;
            top: 50px;
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
            <a class="navbar-brand" href="../Controller/delete_temporary.php" id="logo_homestay">EAT Homestay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../Controller/delete_temporary.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead pt-5">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <!-- Show list rooms -->
                    <!-- Phong don -->
                    <div class="row">
                        <?php
                        require_once("../conn.php");
                        $sql = "SELECT * FROM room WHERE type='singleroom'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-md-7">
                                    <a href="../Controller/check_temporary.php?id=<?php echo $row["id"] ?>">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="../Uploads/<?php echo $row["image"] ?>" style="width: 400px;" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Phòng đơn</h3>
                                    <h6><?= $row["name"] ?></h6>
                                    <p>Giá phòng: <?php echo $row["price"] ?>$</p>
                                    <p><?php echo $row["description"] ?></p>
                                    <a class="btn btn-primary" href="../Controller/check_temporary.php?id=<?php echo $row["id"] ?>">Đặt phòng này</a>
                                </div>

                                <hr class="my-3">
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
                    <!-- Phong doi -->
                    <div class=" row">
                        <?php
                        require_once("../conn.php");
                        $sql = "SELECT * FROM room WHERE type='doubleroom'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-md-7">
                                    <a href="../Controller/check_temporary.php?id=<?php echo $row["id"] ?>">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="../Uploads/<?php echo $row["image"] ?>" style="width: 400px;" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Phòng đôi</h3>
                                    <h6><?= $row["name"] ?></h6>
                                    <p>Giá phòng: <?php echo $row["price"] ?>$</p>
                                    <p><?php echo $row["description"] ?></p>
                                    <a class="btn btn-primary" href="../Controller/check_temporary.php?id=<?php echo $row["id"] ?>">Đặt phòng này</a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
                    <!-- Phong tap the -->
                    <div class="row">
                        <?php
                        require_once("../conn.php");
                        $sql = "SELECT * FROM room WHERE type='quadrupleroom'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-md-7">
                                    <a href="../Controller/check_temporary.php?id=<?php echo $row["id"] ?>">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="../Uploads/<?php echo $row["image"] ?>" style="width: 400px;" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Phòng tập thể</h3>
                                    <h6><?= $row["name"] ?></h6>
                                    <p>Giá phòng: <?php echo $row["price"] ?>$</p>
                                    <p><?php echo $row["description"] ?></p>
                                    <a class="btn btn-primary" href="../Controller/check_temporary.php?id=<?php echo $row["id"] ?>">Đặt phòng này</a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
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
</body>

</html>