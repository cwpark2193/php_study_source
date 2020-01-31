<?php
$score = array(87,76,98,87,87,93,79,85,88,63);
$sum = 0;
for ($i=0; $i < sizeof($score) ; $i++) {
  $sum += $score[$i];
}
$avg = $sum/10;

echo "입력된 점수 : ";
for ($i=0; $i < count($score); $i++) {
  echo "$score[$i] ";
}
echo "<br>";
echo "합계 : {$sum}, 평균 : {$avg}<br><br>";
 ?>
<?php
$subject = array("파이썬","PHP","자바스크립트","사진","영화감상");
$name = array("1**","2**","3**","4**","5**","6**","7**","8**","9**","10*");
$score = array(array(80,79,90,89,100,87,85,83,96,99),
array(70,88,70,85,60,95,77,89,82,93),
array(80,79,90,89,100,87,85,83,96,99),
array(70,88,70,85,60,95,77,89,82,93),
array(80,79,90,89,100,87,85,83,96,99));
for ($i=0; $i <= count($subject); $i++) {
  $sum=0;
  for ($j=0; $j <= count($name) ; $j++) {
    $sum += $score[$i][$j];
  }
  $avg = $sum/10;
  echo "{$subject[$i]}의 합계 : $sum, 평균 : $avg <br>";
}
echo "<br><br>";
 ?>

<?php
$subject = array("파이썬","PHP","자바스크립트","사진","영화감상");
$name = array("1**","2**","3**","4**","5**","6**","7**","8**","9**","10*");
$score = array(array(80,79,90,89,100,87,85,83,96,99),
array(70,88,70,85,60,95,77,89,82,93),
array(80,79,90,89,100,87,85,83,96,99),
array(70,88,70,85,60,95,77,89,82,93),
array(80,79,90,89,100,87,85,83,96,99));
for ($i=0; $i < count($name); $i++) {
  $sum=0;
  for ($j=0; $j < count($subject) ; $j++) {
    $sum += $score[$j][$i];
  }
  $avg = $sum/5;
  echo "{$name[$i]}의 합계 : $sum, 평균 : $avg <br>";
}
echo "<br><br>";
 ?>
 <?php
 echo "<table border=1>";
 echo "<tr align =center>";
 for ($i=2; $i <= 9; $i++) {
   echo "<th width=100>{$i}단</th>";
 }
 echo "</tr>";
 for ($i=0; $i <= 7; $i++) {
   for ($j=0; $j <= 8; $j++) {
     $result[$i][$j] = ($i+2)*($j+1);
   }
 }
 for ($j=0; $j <= 8; $j++) {
   echo "<tr align =center>";
   for ($i=0; $i <=7 ; $i++) {
     $a = $i+2;
     $b = $j+1;
     $c = $result[$i][$j];
     echo "<td>$a x $b = $c</td>";
   }
   echo "</tr>";
 }
 echo "</table><br><br>";
  ?>
<?php
$num = array(15,13,9,7,6,12,19,30,28,26);
echo "정렬 전 : ";
for ($i=0; $i < count($num); $i++) {
  echo "$num[$i] ";
}
echo "<br>";
for ($i=count($num)-2; $i >=0 ; $i--) {
  for ($j=0; $j <=$i ; $j++) {
    if ($num[$j]>$num[$j+1]) {
      $tmp = $num[$j];
      $num[$j]=$num[$j+1];
      $num[$j+1]=$tmp;
    }
  }
}
echo "정렬 후 : ";
for ($i=0; $i < count($num); $i++) {
  echo "$num[$i] ";
}
echo "<br>";
 ?>
