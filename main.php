<?php
        session_start();
        if(empty($_SESSION)){
            $_SESSION["Username"] = "";
        }
?>
<!DOCTYPE html>
<html>
        <head>
        <title>ModelMap</title>
            <meta name="viewport" content="initial-scale=1.0,maximum-scale=1, user-scalable=no">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://js.arcgis.com/4.7/esri/css/main.css">
            <script src="https://js.arcgis.com/4.7/"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <style>
                @font-face {
                    font-family: 'THSarabunNewRegular';
                    src: url('thsarabunnew.eot');
                    src: url('thsarabunnew.eot') format('embedded-opentype'),
                    /*url('thsarabunnew.woff') format('woff'),*/
                    url('thsarabunnew.ttf') format('truetype'),
                    url('thsarabunnew.svg#THSarabunNewRegular') format('svg');
                }
                /* Always set the map height explicitly to define the size of the div
                * element that contains the map. */
                h1 {
                    font-family: THSarabunNewRegular;
                    color: black;
                    font-size: 40px;
                    font-weight: bold;
                }

                p1 {
                    font-family: THSarabunNewRegular;
                    color: white;
                    font-size: 30px;
                    font-weight: bold;
                }
                td {
                    font-family: THSarabunNewRegular;
                    color: black;
                    font-size: 25px;
                    font-weight: bold;
                }
                
                black {
                    overflow: hidden;
                    background: black;
                }

                ul.main {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    height: 50px;
                    overflow: hidden;
                    background-color: #333;
                }

                li a {
                    float: left;
                    display: block;
                    color: white;
                    text-align: center;
                    padding: 10px 20px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    text-decoration: none;
                }

                .navbar-brand {
                    padding: 5px 5px;
                    line-height: 0;
                }
                #map {
                    height: 100%;
                }
                /* Optional: Makes the sample page fill the window. */
                html, body, #viewDiv {
                    padding: 0;
                    margin: 0;
                    height: 100%;
                    width: 100%;
                }
                .esri-view .esri-directions {
                    position: fixed;
                    right: 5px;
                }
                .esri-view .esri-component.esri-attribution {
                    position: fixed;
                }
            </style>
            <script>
                //ศูนย์กีฬา, สวนธนบุรีรัมย์,KMUTT Science Center Learning ,KMUTT Garden ,ตลาด Gen
                var i = 0;
                var longitude = [100.4939071,100.491390,100.494848,100.494659,100.496047];
                var latitude = [13.6478558,13.652103,13.653674,13.650891,13.652088];
                var station_name = ["ศูนย์กีฬาเฉลิมพระเกียรติ",
                        "สวนธนบุรีรัมย์",
                        "KMUTT Science Center Learning",
                        "KMUTT Garden",
                        "ตลาด Gen"];
                var scription = ["รายสัปดาห์",
                     "รายสัปดาห์",
                     "รายเดือน",
                     "ฉุกเฉิน",
                     "Festival"];
                var description = ["เข้าสู่สนามวิ่งและวิ่งให้ครบ 10 km",
                    "เข้าใช้บริกาสถานที่ให้ครบ 5 ชั่วโมง",
                    "เข้าใช้บริการสถานที่ให้ครบ 15 วัน และมีผู้ใช้งานที่อยู่ในรายชื่อ Friends มากกว่า 5 คนขึ้นไป",
                    "แอด Friend ที่อยู่ในบริเวณนี้ 2 คน",
                    "เข้าร่วมตลาด Gen และซื้อสินค้า ณ ร้านค้าที่มีสัญลักษณ์ App 1 ร้าน"];
                var count = ["1 ครั้ง",
                        "1 ครั้ง",
                        "1 ครั้ง",
                        "1 ครั้ง",
                        "3 ครั้ง"];
                var getpoint = ["150 pt/ต่อครั้ง",
                        "100pt/ต่อครั้ง",
                        "700pt/ต่อครั้ง",
                        "200pt/ต่อครั้ง",
                        "120pt/ต่อครั้ง"];
                var date = ["1 มิ.ย. 61 เวลา 00.00 น ถึง 7 มิ.ย. 61 เวลา 23.59 น",
                        "1 มิ.ย. 61 เวลา 00.00 น ถึง 7 มิ.ย. 61 เวลา 23.59 น",
                        "1 มิ.ย. 61 เวลา 00.00 น ถึง 30 มิ.ย. 61 เวลา 23.59 น",
                        "1 มิ.ย. 61 เวลา 16.00 น ถึง 7 มิ.ย. 61 เวลา 17.00 น",
                        "1 มิ.ย. 61 เวลา 00.00 น ถึง 7 มิ.ย. 61 เวลา 23.59 น"];
                require([
                    "esri/Map",
                    "esri/views/MapView",
                    "esri/Graphic",
                    "esri/widgets/Directions",
                    "esri/symbols/SimpleMarkerSymbol",
                    "esri/tasks/Locator",
                    "dojo/domReady!"], 
                function(Map, MapView,Graphic, Directions, SimpleMarkerSymbol,Locator) {

                var map = new Map({
                    basemap: 'osm'
                });

                var view = new MapView({
                    container: "viewDiv",
                    map: map,
                    center: [100.4941512, 13.6511842],
                    zoom: 16
                });
                // Create a symbol for drawing the point
                var markerSymbol = {
                    type: "simple-marker", // autocasts as new SimpleMarkerSymbol()
                    style: "square",
                    color: [226, 119, 40],
                    outline: { // autocasts as new SimpleLineSymbol()
                        color: [255, 255, 255],
                        width: 2
                    }
                };

                for(i=0;i<5;i++){
                    var point = {
                    type: "point", // autocasts as new Point()
                    longitude: longitude[i],
                    latitude: latitude[i]
                }
                var pointGraphic = new Graphic({
                    geometry: point,
                    symbol: markerSymbol
                }); 
                view.graphics.add(pointGraphic);
                }

                view.on("click", function(event){
                    event.stopPropagation();
                    var tla = event.mapPoint.latitude;
                    var tlo = event.mapPoint.longitude;
                    var countltt = 0 ;
                    var countlgt = 0 ;
                    var id = 0;
                 for(i=0;i<5;i++){
                    var ltt = Math.abs(tla - latitude[i]);
                    var lgt = Math.abs(tlo - longitude[i]);
                if(i == 0){
                    countltt = ltt;
                    countlgt = lgt; 
                }
                else if(ltt < countltt){
                    if(lgt < countlgt){
                    countltt = ltt;
                    countlgt = lgt;
                    id = i;
                    }
                }
            }
            document.getElementById("station").innerHTML=station_name[id];
            document.getElementById("quest").innerHTML=scription[id];
            document.getElementById("description").innerHTML=description[id];
            document.getElementById("count").innerHTML=count[id];
            document.getElementById("getpoint").innerHTML=getpoint[id];
            document.getElementById("date").innerHTML=date[id];
            });
        });
    </script>
    </head>
    <body>
        <nav class="navbar navbar-default">
        <center>
            <ul class="main">
                <li class="active"><a href="main.php"><p1>หน้าแรก</p1></a></li>
                <li><a href="reward.php"><p1>ของรางวัล</p1></a></li>
                <?php if($_SESSION["Username"] != ""): ?>
                    <li><a href="logout.php" style="float: right;"><p1>ออกจากระบบ</p1></a></li>
                    <li><a href="user.php" style="float: right;"><p1>หน้า User</p1></a></li>
                    <li><a herf="user.php" style="float: right;"><p1>ขอต้อนรับคุณ <?php echo " ".$_SESSION["Username"].""; ?></p1></a></li>
                <?php else: ?>
                    <li><a href="register.php" style="float: right;"><p1>ลงทะเบียน</p1></a></li>
                    <li><a href="login.php" style="float: right;"><p1>เข้าสู่ระบบ</p1></a></li>
                <?php endif; ?>
            </ul>
        </center>
    </nav>
    <table width="100%" height="100%" border="1px">
        <tbody><tr>      
            <td id="viewDiv"></td>
            <td width="35%" valign="top" align="center" >
            <table width="100%" border="1px"><tr>
            </tr><tr>
                <td width="45%" style="text-align:left">&nbsp;ชื่อสถานที่ :</td>
                <td id="station" width="60%"><h1></td>
            </tr><tr>
                <td width="45%" style="text-align:left">&nbsp;ประเภทเควส :</td>
                <td id= "quest" width="60%"><h1></td>
            </tr><tr>
                <td width="45%" style="text-align:left">&nbsp;รายละเอียด :</td>
                <td id="description" width="60%"><h1></td>
            </tr><tr>
                <td width="45%" style="text-align:left">&nbsp;จำนวนครั้งที่สามารถทำได้ :</td>
                <td id="count" width="60%"><h1></td>
            </tr><tr>
                <td width="45%" style="text-align:left">&nbsp;Point ที่ได้รับ :</td>
                <td id="getpoint" width="60%"><h1></td>
            </tr><tr>
                <td width="45%" style="text-align:left">&nbsp;ระยะเวลา :</td>
                <td id="date" width="60%"><h1></td>
            </tr><tr>
                <td style="text-align:center"><a href="getquest.php" class="button button5">รับเควส</a></td>
                <td style="text-align:center"><a href="completequest.php" class="button button6">ยืนยันสำเร็จเควส</a></td>
            </tr></table></td>
        </tr></tbody>
    </table>
    </body>
</html>