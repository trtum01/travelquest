<?php
        echo "<script language=\"JavaScript\">";
        echo "alert('ออกจากระบบเรียบร้อย');";
        echo "</script>";
        session_start();
        unset ( $_SESSION["Username"] );
        session_destroy();
        echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=home.php'>";
?>