<?php
    echo "<body bgcolor='#ffe8fd'>" ;
    session_start();
    session_destroy();
    setcookie("UID",$id,time()-3600);//刪除cookie
    header("Location:index.php");
    ?>