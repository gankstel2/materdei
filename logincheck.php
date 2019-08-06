<?php
  session_start();

    if(isset($_REQUEST['Username'])){

      include("connection.php");

                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
        //query
                  $sql="SELECT * FROM tb_admin Where Username ='".$Username."' and Password='".$Password."' ";
                
                  $result = mysqli_query($con,$sql);
                //   var_dump($sql);\
                if(mysqli_num_rows($result)==1){
                  $row = mysqli_fetch_array($result);

                  $_SESSION["id"] = $row["id"];
                  $_SESSION["Name"] = $row["Name"];
                  $_SESSION["status"] = $row["status"];

                  if($_SESSION["status"]=="Admin"){ 

                    Header("Location: dashboard.php");
                  }
              if ($_SESSION["status"]=="User"){ 

                    Header("Location: materdei-backend/add_menu.php");
                  }
              }else{
                echo "<script>";
                    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                    echo "window.history.back()";
                echo "</script>";

              }
    }else{

         Header("Location: materdei-backend/login.php"); //user & password incorrect back to login again

    }
                            
?>