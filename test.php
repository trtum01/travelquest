<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>DevLabs - Get driving directions</title>
  <style>
    html, body{
    padding: 0;
    margin: 0;
    height: 100%;
    width: 100%;
  }
  /* ADD */
  .esri-view .esri-directions {
    position: fixed;
    right: 5px;
  }
  .esri-view .esri-component.esri-attribution {
    position: fixed;
  }
    p1 {
      font-size: 30px;
    }
  #viewDiv {
      padding: 0;
      margin: 0;
      height: 100%;
    }
  </style>

  <link rel="stylesheet" href="https://js.arcgis.com/4.6/esri/css/main.css">
  <script src="https://js.arcgis.com/4.6/"></script>
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
    require([
        "esri/Map",
        "esri/views/MapView",
        "esri/Graphic",
        "esri/widgets/Directions",
        "esri/symbols/SimpleMarkerSymbol",
        "esri/tasks/Locator",
        "dojo/domReady!"
      ], 
      function(Map, MapView,Graphic, Directions, SimpleMarkerSymbol,Locator) {

      var map = new Map({
        basemap: 'streets'
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
        
      });
    });
  </script>
</head>
<body>

<table width="100%" height="100%" border="1px">
  <tbody><tr>      
    <td id="viewDiv"></td>
    <td width="30%" valign="top" align="center" style="text-align:center">
      <table width="100%" border="0"><tr>
        <td width="40%">ชื่อสถานที่ :</td>
        <td id="station" width="60%"></td>
      </tr><tr>
        <td width="40%">ประเภทเควส :</td>
        <td id= "quest" width="60%"></td>
      </tr>
    </table></td>
  </tr></tbody>
</table>
   
</body>
</html>