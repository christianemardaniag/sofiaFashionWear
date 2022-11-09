<?php
require("../config.php");

if (isset($_POST["transaction"])) {
    $query = "SELECT order_data.*, user_table.name FROM order_data INNER JOIN user_table ON user_table.ID=order_data.customer_id WHERE order_status != 'PENDING' ORDER BY transaction_date DESC;";
    $data = array();
    $sql = mysqli_query($sqlcon, $query);
    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        $oid = $row['order_id'];
        $oid = $row['order_no'];
        $custName = $row["name"];
        $pname = $row["prod_name"];
        $qty = $row["qty"];
        $total = $row["total"];
        $orderstatus = $row["order_status"];
        $data[] = (object) [
            "orderID" => $row['order_id'],
            "transactionNo" => $row['order_no'],
            "customerName" => $row["name"],
            "productName" => $row["prod_name"],
            "quantity" => $row['qty'],
            "total" => $row['total'],
            "dateTime" => date_format(date_create($row["date"]),'M d, Y'),
            "orderStatus" => $row['order_status'],
            "transactionDate" => date_format(date_create($row["transaction_date"]),'M d, Y h:i a'),
        ];
    }
    echo json_encode($data);
}
