<?php
    session_start();//開始session，一定要加

    echo "<body bgcolor='#feffd9'>" ;
        $link = @mysqli_connect(//連接資料庫
            'localhost',//主機名稱
            'test',//使用者名稱
            '123951',//密碼
            'php'//資料庫名稱
        );
        $dbname="php";
        
        
        if(isset($_SESSION['name'])){//如果變數存在
            $id=$_SESSION['name'];
            $password=$_SESSION['password'];
            $SQL="SELECT * FROM user WHERE Name='$id' AND Password='$password'";
            $result=mysqli_query($link,$SQL);
            if(mysqli_num_rows($result)==1){
                echo "<body bgcolor='#e0effc'>" ;
                echo "<center>"."<a href=logout.php>登出系統</a>";
                echo "<center>"."Welcome to Admin";
            }else{
                echo "<body bgcolor='#ffe8fd'>" ;
                echo "<center>"."非法進入"."<br>";
                echo "<a href=index.php>回登入頁</a>";
                exit();//不加會連html一起跑出來
            }
        }else{
            echo "變數沒出現";
            exit();
        }
    ?>