<?php
include "../config.php";
if (isset($_POST['GET_DASHBOARD_DATA'])) {
    $data = array();
    $query = "SELECT * FROM order_data";
    $result = mysqli_query($sqlcon, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (object) [
                "total" => $row['total'],
                "transaction_date" => $row['transaction_date'],
                "status" => $row['order_status'],
            ];
        }
    }
    echo json_encode((array)$data);
}
