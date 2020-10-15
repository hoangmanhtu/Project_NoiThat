<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh Sách Đơn Hàng</li>
    </ol>
</nav>
<div style="margin: 10px 250px">
    <input style="padding: 22px 12px !important;" type="text" id="search_shopping" name="search_shopping" class="form-control" placeholder="Nhập họ tên hoặc SĐT đơn hàng cần tìm kiếm  .......">
</div>

<div align="right" style="margin:0px 0px 15px 0px;">
    <a class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn xác nhận toàn bộ ?')" href="index.php?area=backend&controller=ShoppingCart&action=send_statusAll"><i class="fa fa-check"></i> Xác nhận toàn bộ đơn hàng</a>
</div>

<?php
?>
<div class="box box-success" id="order">

    <table class="table table-bordered">
        <thead>
        <tr class="table-active">
            <th scope="col">Mã ĐH</th>
            <th style="width: 10%;" scope="col">Tên người nhận</th>
            <th style="width: 17%;" scope="col">Địa chỉ</th>
            <th style="width: 15%;" scope="col">Email</th>
            <th style="width: 10%;" scope="col">Số điện thoai</th>
            <th style="width: 15%;" scope="col">Trạng thái đơn hàng</th>
            <th style="width: 15%;" scope="col">Phương thức thanh toán</th>
            <th style="width:8%;" scope="col">Ngày tạo</th>
            <th style="text-align: center;width: 10%;">Chi tiết ĐH</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($carts)):?>

            <?php
            foreach ($carts as $cart):
                ?>
                <tr>
                    <td><?php echo $cart["id"];?></td>
                    <td><?php echo $cart["fullname"];?></td>
                    <td><?php echo $cart["address"];?></td>
                    <td><?php echo $cart["email"]; ?></td>
                    <td>0<?php echo $cart["mobile"];?></td>
                    <td>
                        <?php
                        if($cart["status"] == 0)
                        {
                            echo "<i style='color: red' class='fa fa-retweet'></i> <span style='color:red'> Đang xử lý</span>";
                        }
                        elseif ($cart["status"] == 1)
                        {
                            echo "<i style='color: #0bb827' class='fa fa-check'></i> <span style='color: #0bb827'>Đã xác nhận thành công</span>";
                        }
                        elseif($cart["status"] == 3)
                        {
                            echo "<i style='color: red' class='fa fa-check'></i> <span style='color:red'> đơn hàng đã bị hủy</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if($cart["payment_status"] == 0)
                        {
                            echo "<p style='color:blue'>Thanh toán tại nhà </p>";
                        }
                        elseif ($cart["status"] == 1)
                        {
                            echo "<p style='color:green'>Đã thanh toán</p>";
                        }
                        ?>
                    </td>
                    <td><?php echo date('d/m/Y',strtotime($cart["created_at"]));?></td>
                    <td style="text-align: center">
                        <a href="index.php?area=backend&controller=ShoppingCart&action=detail&id=<?php echo $cart["id"]; ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                        <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không ?')" href="index.php?area=backend&controller=ShoppingCart&action=delete&id=<?php echo $cart["id"]; ?>"><i class="fa fa-trash"></i></a>
                    </td>

                </tr>
            <?php  endforeach;?>
        <?php  else: ?>
            <tr>
                <td colspan="9">No data found</td>
            </tr>
        <?php endif;?>
    </table>

    <div align="center">
        <ul class='pagination text-center' id="pagination_order">
            <?php if($numPage == 1){
                return '';
            }
            ?>
            <?php  if($page > 1):
                $prev_page=$page-1;
                ?>
                <li class="page-item" id="<?php echo $prev_page; ?>">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for($i=1;$i<= $numPage;$i++):
                if($i == $page): ?>
                    <li class="page-item active" id="<?php echo $i ?>">
                        <a class="page-link active" href="#"><?php echo $i; ?></a>
                    </li>
                <?php else: ?>
                    <li class="page-item" id="<?php echo $i ?>">
                        <a class="page-link " href="#"><?php echo $i ?></a>
                    </li>
                <?php endif;
            endfor; ?>
            <?php   if($page < $numPage ):
                $next_page=$page + 1;
                ?>
                <li class="page-item" id="<?php echo $next_page; ?>">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif;?>
    </div>
