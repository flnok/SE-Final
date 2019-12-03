<?php
require_once("../Controller/check_online.php");
require_once("../Controller/check_guest.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }

        h1 {
            font-family: 'Montserrat', san-serif;
            font-weight: 500;
            font-size: 32px;
            margin: 20px 0;
        }

        #logo_admin {
            font-family: 'Montserrat', san-serif;
            font-weight: 500;
        }

        .active {
            background-color: red !important;
            border: none
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-secondary border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-light" id="logo_admin"> Administration </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action" id="orders">Đơn đặt phòng</a>
                <a href="#" class="list-group-item list-group-item-action" id="rooms">Quản lý phòng</a>
                <a href="#" class="list-group-item list-group-item-action" id="accounts">Quản lý tài khoản</a>
                <a href="#" class="list-group-item list-group-item-action" id="analytics">Xem thống kê</a>
            </div>
        </div>
        <!--/ Sidebar -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary border-bottom">
                <button class="btn btn-danger" id="menu-toggle">Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Controller/sign_out.php">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page_content"></div>
        </div>
    </div>


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
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#sidebar-wrapper a").click(function() {
            // If this isn't already active
            if (!$(this).hasClass("active")) {
                // Remove the class from anything that is active
                $("a.active").removeClass("active");
                // And make this active
                $(this).addClass("active");
                if ($(this).is("#rooms")) {
                    $("#page_content").load("admin_rooms.php");
                } else if ($(this).is("#analytics")) {
                    $("#page_content").load("admin_analytics.php");
                } else if ($(this).is("#accounts")) {
                    $("#page_content").load("admin_accounts.php");
                } else if ($(this).is("#orders")) {
                    $("#page_content").load("admin_orders.php");
                }
            }
        });
        // Load page first time
        $("#page_content").load("admin_orders.php");
    </script>
</body>

</html>