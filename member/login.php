<?php
    $login_id = $_POST["login_id"];
    $login_password = $_POST["login_password"];

   $connect = mysqli_connect("localhost", "root", "123456", "myPage");
   $sql = "select * from members where sign_id='$login_id'";
   $result = mysqli_query($connect, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match)
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["login_password"];

        mysqli_close($connect);

        if($pass != $db_pass)
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["userid"] = $row["sign_id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];

            echo("
              <script>
                location.href = 'index.php';
              </script>
            ");
        }
     }
?>
