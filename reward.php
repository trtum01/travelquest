<?php
        session_start();
        if(empty($_SESSION)){
            $_SESSION["Username"] = "";
        }
?>
<!DOCTYPE html>
<html>
        <head>
        <title>Simple Map</title>
            <meta name="viewport" content="initial-scale=1.0,maximum-scale=1, user-scalable=no">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            <link rel="stylesheet" href="https://js.arcgis.com/4.7/esri/css/main.css">
            <script src="https://js.arcgis.com/4.7/"></script>
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
                    color: black;
                    font-size: 20px;
                    font-weight: bold;
                }
                p1 {
                    font-family: THSarabunNewRegular;
                    color: white;
                    font-size: 30px;
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
                    height: 90%;
                    width: 100%;
                }
                .wrapper{
                    /* max-width: 67.5rem; */
                    max-width: 1080px;
                    margin: 0 auto;
                }
                .wrapper{
    /* max-width: 67.5rem; */
    max-width: 1080px;
    margin: 0 auto;
}

/* Hero Image */
.wrapper-notice{
    position: relative;
    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('../picture/img-notice.jpg');
    /* background-image:linear-gradient(rgba(0, 0, 0, 0.5),
    rgba(0, 0, 0, 0.5)), url('./picture/img-notice.jpg'); */
    background-size: cover;
    left: -8px;
    top: -8px;
    height: 100vh;
    width: 100vw;
}
.title {
    position: absolute;
    top: calc(50% - 117.03px);
    left: calc(50% - 312.205px);
    /* transform: translate(-50%, -50%); */
    color: white;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 1.5px 1.5px #A07A0B;
}
.title p{
    font-size: 1.75rem;
    /* font-size: 28px; */
}
.title-ul{
    margin: 0;
    padding: 0;
}
.title-ul li{
    display: inline-block;
    padding: 0 18px 0 10px;
    font-size: 1.25rem;
}
.title-ul li span{
    display: list-item;
}
/* Wrapper menu Grid setting*/
.wrapper-menu{
    /* max-width: 71.25rem; */
    max-width: 1140px;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
}
.three-col-grid .grid-item{
    position: relative;
    width: calc((100% - 20px * 3) / 3);
    margin: 0 10px 20px 10px;    
    float: left;
    overflow: hidden;
    background-color: #E6E6FA;
    transition: all 0.2s ease-in-out;
}
/* Grid item Hover */
.three-col-grid .grid-item:hover{
    transform: scale(1.05);
    box-shadow: 2px 2px 3px #ACACAC;
}
/* Menu grid item Image */
.three-col-grid .grid-item a{
    display: block;
    /* border: 1px solid #000;     */
    text-decoration: none;
}
.three-col-grid .grid-item a img{
    display: block;
    width: 100%;
    transition: all 0.2s ease-in-out;
}
/* A tag Hover Image */
.three-col-grid .grid-item a:hover img{
    transform: scale(1.02);
}
/* Menu grid item Menu-Detail */
.three-col-grid .grid-item a .menu-detail{
    display: block;
    width: 100%;
    height: 50px;
    line-height: 50px;
}
.three-col-grid .grid-item a .menu-detail h2{
    color: #000;
    margin: 0 0 0 20px;
    padding: 0;
    float: left;
}
.three-col-grid .grid-item a .menu-detail img{
    width: 50px;
    float: right;
}

/* Media max-width: 768px */
@media (max-width: 768px){
    /* All Front Set */
    html{
        font-size: 87.5%;
    }
    /* Title notice Setting */
    .title {
        top: calc(50% - 89.845px);
        left: calc(50% - 273.18px);
    }
    /* Grid menu Setting */
    .three-col-grid .grid-item{
        position: relative;
        width: calc((100% - 20px * 2) / 2);
        margin: 0 10px 20px 10px;    
        float: left;
        overflow: hidden;
        background-color: #ffcc3b;
        transition: all 0.2s ease-in-out;
    } 
}

/* Media max-width: 620px */
@media (max-width: 620px) {
    /* All Front Set */
    html{
        font-size: 75%;
    }
    /* Title notice Setting */
    .title {
        top: calc(50% - 77.14px);
        left: calc(50% - 234.155px);
    }
    .wrapper-notice{
        left: -8px;
        /* top: -68px; */
    }
    /* Navigation Bar Setting */
    header{
        transition: all 0.2s ease-in-out;        
        height: 45px;
    }
    .nav-ul li{
        line-height: 45px;
    }
    /* Navigation Bar Link */
    .navbar .nav-ul li a{
        padding: 0 2.5rem;
    }    
    /* Menu Grid Setting */
    .wrapper-menu{
        margin-top: 50px;
    }
    .three-col-grid .grid-item{
        position: relative;
        width: calc(100% - 20px);
        margin: 0 10px 20px 10px;    
        float: left;
        overflow: hidden;
        background-color: #ffcc3b;
        transition: all 0.2s ease-in-out;
    }
}

            </style>

            
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
                <li><a herf="#" style="float: right;"><p1>ขอต้อนรับคุณ <?php echo " ".$_SESSION["Username"].""; ?></p1></a></li>
            <?php else: ?>
                <li><a href="register.php" style="float: right;"><p1>ลงทะเบียน</p1></a></li>
                <li><a href="login.php" style="float: right;"><p1>เข้าสู่ระบบ</p1></a></li>
            <?php endif; ?>
        </ul>
    </center>
</nav>
       
    <div class="wrapper-menu">
        <div class="three-col-grid">
            <div class="grid-item">
                <a href="#">
                    <img src="./picture/xxx.jpg" alt="">
                    <div class="menu-detail">
                        <h2>200,000 pt เกาะล้าน 2 วัน 1 คืน</h2>
                        <img src="./picture/img-detail.png" alt="">
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="#">
                     <img src="./picture/xxx.jpg" alt="">
                     <div class="menu-detail">
                        <h2>500,000 pt ดำน้ำเกาะล้าน</h2>
                        <img src="./picture/img-detail.png" alt="">
                    </div>
                </a>
            </div>
            <div class="grid-item">
                <a href="#">
                     <img src="./picture/xxx6.jpg" alt="">
                     <div class="menu-detail">
                        <h2>500,000 pt เชียงคาน 2 วัน 1 คืน</h2>
                        <img src="./picture/img-detail.png" alt="">
                    </div>
                 </a>
            </div>
            <div class="grid-item">
                <a href="#">
                        <img src="./picture/xxx3.jpg" alt="">
                        <div class="menu-detail">
                            <h2>300,000 pt ภูบักได</h2>
                            <img src="./picture/img-detail.png" alt="">
                        </div>
                    </a>
            </div>
            <div class="grid-item">
                <a href="#">
                         <img src="./picture/xxx4.jpg" alt="">
                         <div class="menu-detail">
                            <h2>300,000 pt ดูดาวเชียงดาว</h2>
                            <img src="./picture/img-detail.png" alt="">
                        </div>
                    </a>
            </div>
            <div class="grid-item">
                <a href="#">
                         <img src="./picture/xxx5.jpg" alt="">
                         <div class="menu-detail">
                            <h2>400,000 pt ภูกระดึง</h2>
                            <img src="./picture/img-detail.png" alt="">
                        </div>
                     </a>
            </div>
        </div>
    </div>
    <footer>

    </footer>

   
</html>