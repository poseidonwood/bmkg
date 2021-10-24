<?php
include_once("../helper/koneksi.php");
include_once("../helper/function.php");

if(post("table") == null|| post("url") == null){
  echo json_encode(array('status' => false,'message'=>'parameter cant null'));
}else{
  $datatable = getDataByTable('account');
  if($datatable['status'] == true){
    $no = 1;
    foreach ($datatable['message'] as $datalist) {
      $urlstatus = $dashboard_url."ajax/updatestatus.php";
      $nonya = $no++;
      $id = $datalist['id'];
      $username = $datalist['username'];
      $level = $datalist['level']=='1'?"<span class='badge badge-danger'>ADMIN</span>":"<span class='badge badge-primary'>MEMBER</span>";
      $status_check = $datalist['status']=='1'?"checked":NULL;
      $status = $datalist['status']=='0'?'NON-ACTIVE':'ACTIVE';
      $valuestatus = $datalist['status'] == '0'?'1':'0';
      $datatr[] = "<tr>
      <td> $nonya </td>

      <td>$username</td>
      <td>$level</td>
      <td>
      <div class='custom-control custom-switch'>
      <input type='checkbox' class='custom-control-input' id='customSwitch$id' $status_check onclick=updatestatus('account','$valuestatus','$id','$urlstatus') >
      <label class='custom-control-label' for='customSwitch$id'>$status</label>
      </div>
      </td>
      <td>
      <a class='btn btn-danger' href='pengaturan.php?act=hapus&id=".$datalist['id']."'><i class='fas fa-trash'></i></a>
      </td>
      </tr>";
    }
  }
  $data1 = implode("",$datatr);
  echo json_encode(array('status' => true,'message'=>$data1));

}
?>
