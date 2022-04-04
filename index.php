<?php
    session_start();
    ?>
<?php
    if(isset($_COOKIE["UID"])){
        $cookieUID=$_COOKIE["UID"];
        echo "感謝".$cookieUID."回到本系統";
    }else{
        echo "歡迎初次來本系統";
    }
    ?>
<html>
    <head>
        <title>Login登入</title>
    </head>
    <body>
        <center><h1>Login登入</h1></center>
        <center><form action="" method="get" style="width: 80%;" enctype="multipart/form-data">
        帳號ID：<input type="text" name="id" placeholder="id('user/admin')" required><br><br>
        密碼PWD：<input type="password" name="password" placeholder="PWD('123')" required><br><br>
        <input type="submit"><br><br>
    </center></form>
    <?php
        echo "<body bgcolor='#feffd9'>" ;
        $link = @mysqli_connect(//連接資料庫
            'localhost',//主機名稱
            'test',//使用者名稱
            '123951',//密碼
            'php'//資料庫名稱
        );
        $dbname="php";

        if(isset($_GET["id"]) && isset($_GET["password"])){//euserid是否存在
            if($_GET["id"]!=null && $_GET["password"]){//euserid是否為不是空值
                $id=$_GET["id"];
                $password=$_GET["password"];
                $SQL="SELECT * FROM user WHERE Name='$id'";
                $result=mysqli_query($link,$SQL);
                if(mysqli_num_rows($result)==1){//查詢完的結果是否只有1行
                    if($id=='user'){
                        $_SESSION['name']=$id;
                        $_SESSION['password']=$password;
                        setcookie("UID",$id,time()+17280);
                        header("Location:register.php");
                    }else{
                        $_SESSION['name']=$id;
                        $_SESSION['password']=$password;
                        setcookie("UID",$id,time()+17280);
                        header("Location:admin.php");
                    }
                }else{
                        header("Location:index.php");
                }
            }
        }

        
        ?>
    </body>
</html>