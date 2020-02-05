<meta charset="utf-8">
<?php
    $sign_id = $_GET["sign_id"];

    $name = $_POST["name1"];
    $birth_year = $_POST["birth_year"];
    $birth_month = $_POST["birth_month"];
    $birth_day = $_POST["birth_day"];
    $year = $_POST["year"];
    $sign_password = $_POST["sign_password"];
    $email = $_POST["email1"];
    $call_number = $_POST["call_number"];
    $call_number_one = $_POST["call_number_one"];
    $call_number_two = $_POST["call_number_two"];
    $phone_number = $_POST["phone_number"];
    $phone_number_one = $_POST["phone_number_one"];
    $phone_number_two = $_POST["phone_number_two"];
    $home_number_one = $_POST["home_number_one"];
    $home_number_two = $_POST["home_number_two"];
    $address = $_POST["address"];
    $address_detail = $_POST["address_detail"];
    $status = $_POST["status"];
    $root = $_POST["root"];
    if ($root ==="etc") {
      $etc_reason = $_POST["etc_reason"];
      $root = $etc_reason;
    }
    if ($year ==="solar") {
      $cal_year = "양력";
    }elseif ($year ==="luna") {
      $cal_year = "음력";
    }
    $birth_date = $cal_year."-".$birth_year."-".$birth_month."-".$birth_day;
    $home_number = $home_number_one."-".$home_number_two;
    $call_number = $call_number."-".$call_number_one."-".$call_number_two;
    $phone_number = $phone_number."-".$phone_number_one."-".$phone_number_two;
    $address = $address."/".$address_detail;

    $connect = mysqli_connect("localhost", "root", "123456", "myPage");
    $sql = "update members set sign_password='$sign_password', name='$name' ,
    birth_date='$birth_date', email='$email', call_number='$call_number',
    phone_number='$phone_number', home_number='$home_number', address='$address',
    status='$status', root='$root'";
    $sql .= " where sign_id='$sign_id'";
    mysqli_query($connect, $sql);

    mysqli_close($connect);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
