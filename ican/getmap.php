<?php
$Longitude = $_GET['Longitude'];
$Latitude = $_GET['Latitude'];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>電動車資訊位置圖</title>
<style type="text/css">   /*從此段開始都是css*/
html { height: 100% } /*網頁高度100%*/
body { height: 100%; margin: 10px; padding: 25px } /*margin外距 padding內距 */

/*http://pinkyvivi.pixnet.net/blog/post/1131260-css%E2%88%A5%E6%8E%92%E7%89%88%E8%A7%80%E5%BF%B5-boxmodel%3Emargin%E3%80%81padding*/

#map_canvas { height: 100% } /*建立div 元素(命名為「map_canvas」) 來容納「地圖」*/
</style>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script>
var lon = <?php echo $Longitude ?>;
var lat = <?php echo $Latitude ?>;
var map;
$(document).ready(function () {
  //取得地圖div標籤物件 Get the element with the specified ID:
  var myCanvas = document.getElementById("map_canvas");
  //建立座標物件
  var myLatlng = new google.maps.LatLng(lat,lon);
  //var myLatlng = new google.maps.LatLng(25.034384,121.577734);
  //建立地圖參數
  var myOptions = {
    zoom: 18,  /*Zoom - displays a slider or "+/-" buttons to control the zoom level of the map*/
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP  /*修改地圖類型*/ 
    /*https://developers.google.com/maps/documentation/javascript/maptypes?hl=zh-tw*/
  };

  //建立地圖物件
  map = new google.maps.Map(myCanvas, myOptions);
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: 'Here!'
  });

});
</script>
<?php
  if(isset($_GET['Longitude'])){
    unset($_GET['Longitude']);
    unset($_GET['Latitude']);
}
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQhNukU-sEshEijjJClTz6o-53RFLvSsM&callback=initMap"   type="text/javascript"></script>
</head>
<body>
<div id="map_canvas" style="width:100%; height:100%"></div>
</body>
</html>