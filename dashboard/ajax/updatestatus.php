<?php
include_once("../helper/koneksi.php");
include_once("../helper/function.php");

if(post("value") == null || post("id") == null|| post("table") == null){
  echo json_encode(array('status' => false,'message'=>'parameter cant null'));
}else{
  $table = post("table");
  $id = post("id");
  $value = post("value");
  $q = "UPDATE  $table set status = '$value' where id = '$id'";
  $ex = mysqli_query($koneksi,$q);
  echo json_encode(array('status' => true,'message'=> "update id $id berhasil"));
}
?>
