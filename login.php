<?php
    session_start();
    include "koneksi.php"; 
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewreport" content="width-device-width, initial-scale=1.0"/>
        <title>LOGIN</title>
        <link rel="stylesheet" href="login/assets/css/style_login.css">
        <meta name="viewreport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>
        <div id="card">
            <div id="card-content">
                <div id="card-title">
                    <h2>LOGIN</h2>
                    <div class="underline-title"></div>
                </div>
            </div>
            <form method="post" class="form">
                <label for="user-email" style="padding-top: 20px;">&nbsp;
                    EMAIL
                </label>
                <input id="user-email" class="form-content" type="email" style="width: 200px;"
                 name="email_customer" autocomplete="on" required/>
                <div class="form-border"></div>

                <label for="user-password" style="padding-top: 20px;">&nbsp;
                    PASSWORD 
                </label>
                <input id="user-password" class="form-content" type="password" name="password" required/>
                <div class="form-border"></div>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN">
                <a href="signin.html" id="signup">Belum Punya akun?</a>
            </form>
        </div>
    </body>
</html>
<!--<form action="" method = "POST">
<table align="center">
    <tr>
        <th colspan = "2" height = "40">LOGIN</th>
    </tr>
    <tr>
        <td width = "100">EMAIL</td>
        <td> <input type="text" name="email_customer"></td>
    </tr>
    <tr>
        <td>PASSWORD</td>
        <td> <input type="password" name="password"></td>
    </tr>
    <tr>
        <td></td>
        <td> <input type="submit"  value="login" name="proceclog"></td>
    </tr>
</table>
</form> -->

<?php
    if(isset($_POST['submit'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM customer WHERE email_customer = '$_POST[email_customer]'
        AND password = '$_POST[password]'");

        $cek = mysqli_num_rows($sql);
        if($cek > 0){
            $_SESSION['email_customer'] = $_POST['email_customer'];

            echo "<meta http-equiv=refresh content=0;URL='profil.php'>";
        }else{
            echo "<p align= center><b> EMAIL DAN PASSWORD SALAH ! </b></p>";
            echo "<meta http-equiv=refersh content=2;URL='login.php'>";
        }
    }
?>