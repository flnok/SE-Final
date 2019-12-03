<?php
require_once("../Controller/check_online.php");
?>

<style>
    .card-body {
        position: relative;
    }

    h4::before {
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        left: 10px;
        top: 5%;
        /* z-index: 2; */
    }

    h4::after {
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        right: 10px;
        top: 5%;
    }
</style>

<div id="" class="container-fluid">
    <div class="py-5 text-center">
        <h2>Thêm phòng</h2>
    </div>

    <div class="row">
        <div class="col-md order-md-1">
            <form action="../Controller/add_room.php" method="POST" enctype="multipart/form-data">
                <?php
                $name = $brand = $price = $description = $id = $file_name = "";
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    require_once("../conn.php");
                    $sql = "SELECT * FROM room WHERE id = $id";
                    $result = $conn->query($sql);
                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $name = $row["name"];
                        $brand = $row["brand"];
                        $price = $row["price"];
                        $description = $row["description"];
                        $file_name = $row["image"];
                    }
                }
                ?>
                <div class="mb-3">
                    <label for="name">Tên phòng</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Loại phòng</label>
                    <div class="input-group">
                        <select class="input-group" name="type">
                            <option value="singleroom" <?php if ($brand == "singleroom") echo "selected" ?>>Phòng đơn</option>
                            <option value="doubleroom" <?php if ($brand == "doubleroom") echo "selected" ?>>Phòng đôi</option>
                            <option value="quadrupleroom" <?php if ($brand == "quadrupleroom") echo "selected" ?>>Phòng tập thể</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="price">Giá tiền</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <div class="input-group">
                        <textarea class="form-control" id="description" name="description" value="<?php echo $name ?>" required></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fileUpload">Image</label>
                    <div class="input-group">
                        <?php

                        if (isset($_GET["id"])) {
                            echo '<img style="width:80px" id="fileUploadInSever" src="../Uploads/' . $file_name . '">';
                            echo '<input type="file" id="fileUpload" name="fileUpload">';
                        } else {
                            echo '<input type="file" id="fileUpload" name="fileUpload" required>';
                        }
                        ?>
                    </div>
                </div>

                <hr class="mb-4">
                <div class="d-flex justify-content-lg-around justify-content-center align-items-center">
                    <button class="btn btn-success btn-lg w-25" type="submit">
                        <?php

                        if (isset($_GET["id"])) {
                            echo "Update";
                        } else {
                            echo "Add";
                        }
                        ?>
                    </button>
                    <button class="btn btn-secondary btn-lg w-25" onclick="goBack()">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function goBack() {
        $("#page_content").load("admin_rooms.php");
    }
</script>