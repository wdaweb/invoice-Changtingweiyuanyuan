<?php
include_once "base.php";

// 拿到期數了 放進sql
$period=ceil(date("m")/2);
echo $period;

$sql="select * from `invoices` where period='$period' order by date desc";

$rows=$pdo->query($sql)->fetchAll();
?>

<table class="table text-center">
    <tr>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>
    </tr>
    <?php
    // 把rows(二維陣列)拆成row(一維陣列) 再去呼叫裡面的value
    foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['code'].$row['number'];?></td>
        <td><?=$row['date'];?></td>
        <td><?=$row['payment'];?></td>
        <td>
            <button class="btn btn-sm btn-light"><a class="text-dark" href="?do=edit_invoice&id=<?=$row['id'];?>">編輯</a></button>
            <button class="btn btn-sm alert-danger"><a class="text-dark" href="?do=del_invoice&id=<?=$row['id'];?>">刪除</a></button>
            <button class="btn btn-sm alert-success"><a class="text-dark" href="?do=award&id=<?=$row['id'];?>">兌獎</a></button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

