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
    <h1 class="text-center">Quản lý lượt đặt phòng</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Tên phòng</th>
                    <th>Loại phòng</th>
                    <th>Số lượng phòng</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../conn.php");
                $sql = "SELECT * FROM receipt";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="item">
                            <td><?php echo $row["guest_name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["phone"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["type"] ?></td>
                            <td><?php echo $row["amount"] ?></td>
                            <td><?php echo $row["checkin"] ?></td>
                            <td><?php echo $row["checkout"] ?></td>
                            <td>
                                <a href="../Controller/delete_receipt.php?id=<?php echo $row["id"] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
                <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
                    <td colspan="9">
                        <p>Số lượng đơn hàng: <?= $result->num_rows ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--/ Table Responsive -->
</div>