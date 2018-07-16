<?php
        /***Connect to database***/
        session_start();
        $serverName = "localhost";
        $userName = "root";
        $userPassword = "";
        $dbName = "modelmap";
    
        $objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

        if(trim($_POST["txtUsername"]) == "")
        {
            echo "<script language=\"JavaScript\">";
            echo "alert('Please input Username');";
            echo "</script>";
            exit();	
        }
        
        if(trim($_POST["txtPassword"]) == "")
        {
            echo "<script language=\"JavaScript\">";
            echo "alert('Please input Password!');";
            echo "</script>";
            exit();	
        }	

        mysqli_set_charset($objCon, "utf8");

        /*** List Record ***/
        $strSQL = "SELECT * FROM user WHERE Username ='".mysqli_real_escape_string($objCon,$_POST['txtUsername'])."'
        and Password = '".mysqli_real_escape_string($objCon,$_POST['txtPassword'])."'";

        $objQuery = mysqli_query($objCon,$strSQL);

        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	    if(!$objResult)
	    {
		    echo "Username and Password Incorrect!";
        }
        else{
            
            $_SESSION["Username"] = $objResult["Username"];
            //$_SESSION["Firstname"] = $objResult["Firstname"];
            
            echo "<script language=\"JavaScript\">";
            echo "alert('เข้าสู่ระบบเรียบร้อย');";
            echo "</script>";
            echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=main.php'>";

			session_write_close();
        }
        mysqli_close($objCon);
?>