function gettable(table,url) {
  $.ajax({
    type:'POST',
    data:{table:table,url:url},
    url:url
  }).done(function(data) {
    var json = data,
    obj = JSON.parse(json);
    if(obj.status === true){
      $("#tablenya").html(obj.message);
    }else{
      $("#tablenya").text("error ajax ");
    }
  });
}
function updatestatus(table,value,id,url) {
  $.ajax({
    type:'POST',
    data:{table:table,value:value,id:id,url:"pengaturan.php"},
    url:url
  }).done(function(data) {
    var json = data,
    obj = JSON.parse(json);
    console.log(obj.url);
    if(obj.status === true){
      toastr.success('Sukses', obj.message);
      window.location.href = "pengaturan.php";
    }else{
      alert("ajax updatestatus error");
    }
  });
}
