<?php
    function show_bl($idsp){
        $sql = "SELECT * FROM comment WHERE trangthai=0 AND idsp = ? ORDER BY id  DESC limit 5 ";
        return pdo_query($sql,$idsp);
    }

    function get_namsp($idsp){
        $sql = " SELECT tensp FROM sanpham WHERE id= ? ";
        return  pdo_query_value($sql,$idsp);
    }
    

    function insert_bl($iduser,$name,$idsp,$noidung,$tensp){
        $sql="INSERT INTO comment (iduser, name, idsp, noidung , tensp) VALUES ('$iduser','$name','$idsp','$noidung' , '$tensp')";
        return pdo_execute($sql);
    }
    // Hàm get_comments_html có thể giống như sau:
    function get_cmt(){
        $sql = "SELECT comment.id, comment.noidung, comment.ngaybl, comment.trangthai, user.hoten AS hoten, sanpham.tensp AS tensp
        FROM comment
        JOIN user ON comment.iduser = user.id
        JOIN sanpham ON comment.idsp = sanpham.id ";
        return pdo_query($sql);
    }
    function up_trangthai($id){
        $sql="UPDATE comment SET trangthai=1  WHERE id=".$id;      
        pdo_execute($sql);
        $tb="Duyệt thành công!";       
        return $tb;
    }
    function hid_trangthai($id){
        $sql="UPDATE comment SET trangthai = CASE WHEN trangthai = 1 THEN 2 ELSE 1 END  WHERE id=".$id;  
        pdo_execute($sql);
         // Lấy giá trị mới của duyet từ cơ sở dữ liệu
        $sql_select = "SELECT trangthai FROM comment WHERE id=".$id;
        $duyet = pdo_query_one($sql_select)['trangthai'];
        if ($duyet == 1) {
            $tb = "Hiện thành công!";
        } else{
            $tb = "Ẩn thành công!";
        }
        return $tb;
       
    }
    function delete_cmt($id){
        $sql="DELETE FROM comment WHERE id=".$id;      
        pdo_execute($sql);
        $tb="Xóa thành công!";       
        return $tb;
    }
  

?>