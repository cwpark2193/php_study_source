<?php
$num = 1;
while ($num <= 1000) {
  if ($num%2==0) {
    echo "$num ";
  }
  $num++;
}
echo "<br><br>";
 ?>

<?php
$count = 0;
for($num=100;$num<=500;$num++){
  if ($num%2==0) {
    echo "$num ";
    $count++;
  }
  if ($count%2==0) {
    echo "<br>";
  }
}
echo "<br><br>";
 ?>
<?php
$num=300;
$sum=0;
while ($num <= 3000) {
  if ($num%2==1) {
    $sum+=$num;
  }
  $num++;
}
echo "300~3000 홀수의 합 : $sum <br><br>";
 ?>

 <?php
 $sum = 0;

 for ($num=100; $num <= 900; $num++) {
   if ($num%3 != 0) {
     $sum +=$num;
     echo "{$num}까지의 합 : $sum<br>";
   }
 }
 echo "<br><br>";
 ?>

 <?php
$sum = 1;

for ($num=1; $num <= 10 ; $num++) {
  $sum *= $num;
  echo "{$num}! = $sum<br>";
}
echo "<br>";
  ?>

<?php
$count = 0;
for ($num=1; $num <=500 ; $num++) {
  if ($num%5==0) {
    echo "$num ";
    $count++;
    if ($count%10==0) {
      echo "<br>";
    }
  }
}
echo "<br><br>";
?>
<?php
echo "--------------------<br>";
echo "야드 미터<br>";
echo "--------------------<br>";
for ($yard=10; $yard <= 300 ; $yard+=10) {
  $meter = $yard * 0.9144;
  echo "$yard $meter<br>";
}
echo "--------------------<br><br>";
 ?>
 <?php
echo "<table border = 1>";

echo "<tr align =center><td width = 150>야드</td><td width=150>미터</td></tr>";

for ($yard=10; $yard <= 300 ; $yard+=10) {
  $meter = $yard * 0.9144;
  echo "<tr align =center>";
  echo "<td>$yard</td><td>$meter</td>";
  echo "</tr>";
}
echo "</table>";
  ?>
<?php
echo "--------------------<br>";
echo "평 제곱미터<br>";
echo "--------------------<br>";
for ($meter=10; $meter <= 200 ; $meter+=10) {
  $pyoung = $meter * 0.3025;
  echo "$pyoung $meter<br>";
}
echo "--------------------<br><br>";
 ?>
