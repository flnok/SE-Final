<?php
require_once("../Controller/check_online.php");
?>
<style>
    th,
    td {
        text-align: center;
    }

    /* Modal styles */
    .modal .modal-dialog {
        max-width: 400px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
        padding: 20px 30px;
    }

    .modal .modal-content {
        border-radius: 3px;
    }

    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }

    .modal textarea.form-control {
        resize: vertical;
    }

    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal form label {
        font-weight: normal;
    }
</style>
<div class="container-fluid">
    <h1 class="text-center">Quản lý tài khoản</h1>
    <div class="d-flex justify-content-end align-items-center">
        <h4 class="text-right mr-2"><a href="#addEmployeeModal" data-toggle="modal" id="otherRoom" class="btn btn-info h-100"> <i class="fas fa-user-plus"></i>
                <br> <span>Thêm tài khoản mới </span></a></h4>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Loại tài khoản</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../conn.php");
                $sql = "SELECT * FROM admin";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="item">
                            <td><?php echo $row["type"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["phone"] ?></td>
                            <td>
                                <a href="#editEmployeeModal" data-toggle="modal"><i class=" fas fa-cog"></i></a> | <a href="../Controller/delete_admin.php?id=<?php echo $row["id"] ?>" class="delete" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
                <?php
                require_once("../conn.php");
                $sql = "SELECT * FROM guest";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="item">
                            <td><?php echo $row["type"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["phone"] ?></td>
                            <td>
                                <a href="#!" data-toggle="modal"><i class="fas fa-cog"></i></a> | <a href="../Controller/delete_user.php?id=<?php echo $row["id"] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create Account -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../Controller/add_admin.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="input-group" name="type" required>
                            <option value="admin">Staff</option>
                            <option value="guest">Guest</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>