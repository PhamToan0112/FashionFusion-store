<?php 
    function get_voucher($voucher){
        $sql = "SELECT * FROM voucher WHERE discount_code = ? AND trangthai = 1 ";
        return pdo_query_one($sql,$voucher);
    }

?>