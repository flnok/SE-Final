<?php
require_once("../Controller/check_online.php");
?>

<div class="container">
	<h1 class="text-center">Thống kê thu nhập</h1>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Tổng số lượt đặt phòng</th>
					<th>Thu nhập</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once("../conn.php");
				$sql = "SELECT SUM(price), COUNT(id) FROM receipt";
				$result = $conn->query($sql);
				$data = mysqli_fetch_row($result);
				//print_r($data);
				if ($result->num_rows > 0) {
					$sum = $data[0];
					$count = $data[1];
					?>
					<tr class="item">
						<td><?php echo $count ?></td>
						<td><?php echo $sum ?>$</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>