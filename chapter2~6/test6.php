<?php
 function computeMaxGong($x,$y){
  if($x>$y){
    $small = $y;
  }
  else {
    $small = $x;
  }
  for ($i=1; $i <= $small; $i++) {
    if ($x%$i ==0 and $y%$i ==0) {
      $result = $i;
    }
  }
  return $result;
}
$num1 = 9;
$num2 = 33;
$max_gong = computeMaxGong($num1,$num2);
echo "{$num1}와(과) {$num2}의 최대공약수 : $max_gong <br><br>";
 ?>
 <?php
 function maxTwo($i,$j) {
   if($i>$j){
     return $i;
   }else{
     return $j;
   }
 }
 function maxThree($x,$y,$z) {
  return maxTwo(maxTwo($x,$y),maxTwo($y,$z));
 }
 $a=10;
 $b=5;
 $c=7;
 $max_num= maxThree($a,$b,$c);
 echo "$a $b $c 중 가장 큰 수 : $max_num<br><br>";
  ?>
<?php
function child_rate($cat){
  if($cat=="입장권")
    $price = 13000;
  elseif($cat=="자유 이용권 주간")
    $price = 25000;
  elseif($cat=="자유 이용권 야간")
    $price = 22000;
  else
    $price = 22000;
  return $price;
}
function youth_rate($cat){
  if($cat=="입장권")
    $price = 15000;
  elseif($cat=="자유 이용권 주간")
    $price = 28000;
  elseif($cat=="자유 이용권 야간")
    $price = 25000;
  else
    $price = 25000;
  return $price;
}
function adult_rate($cat){
  if($cat=="입장권")
    $price = 18000;
  elseif($cat=="자유 이용권 주간")
    $price = 32000;
  elseif($cat=="자유 이용권 야간")
    $price = 29000;
  else
    $price = 29000;
  return $price;
}
$age = 12;
$category = "자유 이용권 야간";
if($age>=0 && $age<=3)
  $fee = 0;
elseif($age>=4 && $age<=11)
  $fee = child_rate($category);
elseif($age>=4 && $age<=11)
  $fee = youth_rate($category);
else
  $fee = adult_rate($category);

  echo "입장권 종류 : $category<br>";
  echo "입장객 나이 : {$age}세<br>";
  echo "입장료 : {$fee}원";
 ?>
