<?php
require_once("../Controller/check_online.php");
?>
<style>
    th,
    td {
        text-align: center;
    }
</style>

<div class="container-fluid">
    <h1 class="text-center">Quản lý tất cả các phòng</h1>
    <div class="d-flex justify-content-end align-items-center">
        <h4 class="text-right mr-2"><a href="#" id="otherRoom" class="btn btn-info h-100"> <i class="fas fa-door-closed"></i>
                <br> <span>Xem đơn đặt phòng </span></a></h4>
        <h4 class="text-right mr-2"><a href="#" id="otherAdd" class="btn btn-success h-100"> <i class="fas fa-door-open"></i>
                <br> <span>Thêm phòng mới</span></a></h4>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên Phòng</th>
                    <th>Giá tiền</th>
                    <th>Mô tả</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../conn.php");
                $sql = "SELECT * FROM room";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="item">
                            <td><img src="../Uploads/<?php echo $row["image"] ?>" style="width:300px"></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td>
                                <a href="#!"><i class="fas fa-cog"></i></a> | <a href="../Controller/delete_room.php?id=<?php echo $row["id"] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

                <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
                    <td colspan="5">
                        <p>Số lượng phòng: <?= $result->num_rows ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#otherRoom").click(function(e) {
        e.preventDefault();
        $("#orders").click();
    });
    $("#otherAdd").click(function() {
        $("#page_content").load("admin_add_room.php");
    });
</script>