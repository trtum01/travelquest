    </<!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1, user-scalable=no">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>Travel Quest</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
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

                h2 {
                    font-family: THSarabunNewRegular;
                    color: white;
                    font-size: 40px;
                    font-weight: bold;
                }
                
                h3{
                    font-family: THSarabunNewRegular;
                    color: white;
                    font-size: 36px;
                }

                p1 {
                    font-family: THSarabunNewRegular;
                    color: white;
                    font-size: 30px;
                    font-weight: bold;
                }

                body{
                    background-color: white;
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

                 li a:hover {
                    background-color: #111;
                }

                .navbar-brand {
                    padding: 5px 5px;
                    line-height: 0;
                }

                html, body, #viewDiv {
                    padding: 0;
                    margin: 0;
                    height: 90%;
                    width: 100%;
                }

                .centered {
                    
                    font-family: THSarabunNewRegular;
                    color: white;
                    text-align: center;
                    font-size: 100px;
                    font-weight: bold;
                    background-color: black;
                    width: 100%;
                    margin-top: 100px; 
                    margin-bottom: 10px;
                }
                
                img{
                    opacity: 0.5;
                    filter: alpha(opacity=50);
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 100%;
                    height: 100%;

                    z-index: -1;
                    position: absolute;
                }

                a.button {
                    background-color: #333;
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    margin-top: 10px;
                    margin-bottom: 100px;
                    cursor: pointer;
                }
                
                .button5 {font-size: 24px;}

            </style>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <ul class="main"><li class="active">
                <a ><p1>Travel Quest</p1></a>
        </li></ul></nav>
        <img src="hotel-8.jpg">    
        <div class="centered">Travel Quest</div>
        <br><br><br><br>
            <h2 align="center">About App</h2>
                <h3 align="center">เป็นเว็บแอพลิเคชั่นที่ช่วยกระตุ้นเรื่องการท่องเที่ยว <br>
                    โดยจะมีภารกิจมอบหมายให้ผู้ใช้งานนั้นได้ทำ <br>
                    ภารกิจจะเป็นยังไงนั้นลองไปดูกันเลย</h3>
         <br> <br><br>   
        <div style="width:200px; margin:0 auto;">
        <a href="login.php" class="button button5">Let's Start
        </a></div>
    </body>
    </html>