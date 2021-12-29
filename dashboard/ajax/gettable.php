<?php
include_once("../helper/koneksi.php");
include_once("../helper/function.php");

if(post("table") == null|| post("url") == null){
  echo json_encode(array('status' => false,'message'=>'parameter cant null'));
}else{
  $datatable = getDataByTable(post("table"));
  if($datatable['status'] == true){
    if(is_array($datatable['message'])){
      // $getdatatd = count($datatable['message'][0]);
      switch (post("table")) {
        case 'account':
        $datatr = data_account($datatable['message']);
        break;
        case 'post':
        $datatr = data_post($datatable['message']);
        break;
        default:
        echo json_encode(array('message'=>'Wrong'));
        break;
      }
    }
  }
  $data1 = implode("",$datatr);
  echo json_encode(array('status' => true,'message'=>$data1));

}

function data_account($data){
  global $dashboard_url;
  $no = 1;
  foreach ($data as $datalist) {
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
  return $datatr;
}
function data_post($data){
  global $dashboard_url,$main_url;
  $no = 1;
  foreach ($data as $datalist) {
    $urlstatus = $dashboard_url."ajax/updatestatus.php";
    $nonya = $no++;
    $id = $datalist['id'];
    $judul = $datalist['judul'];
    $category = $datalist['category'];
    $thumb = $datalist['thumb'];
    $tags = $datalist['tags'];
    $creator = $datalist['creator'];
    $datatr[] = "<tr>
    <td> $nonya </td>
    <td>$judul</td>
    <td>$category</td>
    <td><img src='{$main_url}asset/images/post/{$thumb}' width='100px'></td>
    <td>$tags</td>
    <td>$creator</td>
    <td>
    <span><a class='btn btn-success' target='_blank' href='{$main_url}blog-detail.php?p={$datalist['id']}'><i class='fas fa-eye'></i></a>
    <a class='btn btn-danger' href='posting.php?act=hapus&id={$datalist['id']}'><i class='fas fa-trash'></i></a></span>
    </td>
    </tr>";
  }
  return $datatr;
}

?>
