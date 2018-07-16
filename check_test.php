<?php
        session_start();
        
        $serverName = "localhost";
        $userName = "root";
        $userPassword = "";
        $dbName = "modelmap";
        
        $objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    
        mysqli_set_charset($objCon, "utf8");
    
        $strSQL = " SELECT * FROM location WHERE id = '1' ";
        $objQuery = mysqli_query($objCon,$strSQL);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

        if($_SESSION["id"] == $objResult["id"]){

            echo "<script language=\"JavaScript\">";
            echo "alert('It's ok);";
            echo "</script>";
            exit();	

            $_SESSION["longitude"] = $objResult["longitude"];
            $_SESSION["latitude"] = $objResult["latitude"];
            session_write_close();
        }
        mysqli_close($objCon);
?>