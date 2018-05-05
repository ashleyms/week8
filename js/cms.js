//Toggle Order Status
$('.status').change(function(){
  var value = $(this,'.status').val();
  var id = $(this, '.status').data("order");
  window.location.href = "actions/status.php?stat="+value+"&id="+id+"";
});
