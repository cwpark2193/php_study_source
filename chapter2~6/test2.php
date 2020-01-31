<?php
echo "- 이름 : ***"."</br>";
echo "- 휴대폰 번호 : ###-####-####"."</br>";
echo "- 주소 : *********************"."</br>";
echo "- 이메일 : ########@########.###"."</br>";
echo "</br>";
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <table border="2px;">
       <tr>
         <th>이름</th>
         <th>전화번호</th>
         <th>주소</th>
         <th>이메일</th>
       </tr>
       <tr>
         <td><?php echo "***"?></td>
         <td><?php echo "###-####-####"?></td>
         <td><?php echo "*********************"?></td>
         <td><?php echo "########@########.###"?></td>
       </tr>
     </table>
     <br><br>
   </body>
 </html>

 <?php
 $child_fee = 5000;
 $adult_fee = 8000;
 $num_child = 3;
 $num_adult = 2;
 $total_fee = $child_fee*$num_child+$adult_fee*$num_adult;
 echo "전체 입장료 : $total_fee 원";
 echo "</br>";
  ?>

 <?php
 $money = 3000;
 $price = 800;
 $num = 3;

 $change = $money - $price*$num;

 echo "물건 가격 : $price 원<br>";
 echo "구매 개수 : $num 개<br>";
 echo "지불액 : $money 원<br>";
 echo "거스름돈은 $change 원 입니다. <br>";
 echo "</br>";
 ?>

 <?php
 $num1 = "991111";
 $num2 = "1011111";
 $id = $num1."-".$num2;
 echo "주민등록번호 : $id"."</br>";

 $email1 = "master";
 $email2 = "codingschool.info";
 $email = $email1."@".$email2;
 echo "이메일 주소 : $email";
 echo "</br></br>";
 ?>

 <?php
 $a = 3;
 $b = 2;

 $a = $a + $b;
 $b = $a + 5;
 $c = $a * $b;

 $c = $c % 2;
 $a = $b + $c;
 $b = $a * $b;

 echo "a: $a, b: $b, c : $c";
 ?>
