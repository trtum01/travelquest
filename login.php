<!DOCTYPE html>
<?php session_start(); ?>
<html>
        <head>
            <meta charset="utf-8" charset="tis-620">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <style>
                @font-face {
                    font-family: 'THSarabunNewRegular';
                    src: url('thsarabunnew.eot');
                    src: url('thsarabunnew.eot') format('embedded-opentype'),
                    url('thsarabunnew.woff') format('woff'),
                    url('thsarabunnew.ttf') format('truetype'),
                    url('thsarabunnew.svg#THSarabunNewRegular') format('svg');
                }
                .webfont {
                    font-family: THSarabunNewRegular;
                }
                h1 {
                    font-family: THSarabunNewRegular;
                    color:black;
                    font-size:40px;
                    font-weight: bold;
                }
                p1 {
                    font-family: THSarabunNewRegular;
                    color:white;
                    font-size:30px;
                    font-weight: bold;
                }
                td {
                    font-family: THSarabunNewRegular;
                    color:black;
                    font-size:30px;
                    font-weight: bold;
                }
                p2 {
                    font-family: THSarabunNewRegular;
                    color:black;
                    font-size:18px;
                    font-style: italic;
                }
                p3 {
                    font-family: THSarabunNewRegular;
                    color:black;
                    font-size:24px;
                    font-weight: bold;
                }
                div{
                    background-color: white;
                    border: 1px solid black;
                    
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
            </style>
        </head>
        <body>
            <br><br>
            <center><div style="width:500px;text-align:left;padding:10px 10px">
            <form name="form1" method="post" action="check_login.php">
                <center><h1>ลงทะเบียน</h1></center>
                <center><table width="400px" border="0" style="width:600px;">
                    <tbody>
                        <tr>
                            <td width="125" style="padding:10px 5px;"><center>Username<center></td>
                            <td width="180">
                                <input name="txtUsername" type="text" id="txtUsername">
                            </td>
                        </tr>
                    <tr>
                            <td style="padding:10px 5px;"><center>Password</center></td>
                        <td>
                            <input name="txtPassword" type="password" id="txtPassword">
                        </td>
                    </tr>
                    </tbody>
                </table></center>
                <br>
                <center><input type="submit" name="Submit" value="Login"></center>
                </form>
            </div></center>
            <br><br>
        </body>
</html>