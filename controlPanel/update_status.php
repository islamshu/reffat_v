<?php
include "master.php";

 $id = $_POST['cat_id'];
 $status = $_POST['status'];

 $sql = "Select * from subclasses where id = $id";
 $rs = $db->dbQuery($sql);
 $row = $db->dbFetchRecord($rs);
 $sql = "UPDATE `subclasses` SET `statuss` = '$status' WHERE `subclasses`.`id` = $id";
 $rs = $db->dbQuery($sql);


 ?>
<div id="snackbar" class="">تم التعديل بنجاح</div>