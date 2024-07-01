<?php
    function get_mail(){
        $sql = "SELECT * FROM mail ";
        return pdo_query($sql);
    }
    function insert_email($email){
        $sql = "INSERT INTO mail(email) VALUES (?)";
        return pdo_execute($sql,$email);
    }
?>