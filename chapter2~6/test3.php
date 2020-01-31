<?php
echo "시간당 급여<br>";
echo "- 주간 근무 : 9,500원<br>";
echo "- 야간 근무 : 주간 시급 * 1.5<br>";

$hour_rate = 9500;

$day_night = "주간";
$work_time = 8;

if($day_night == "주간"){
  $pay = $hour_rate * $work_time;
}else {
  $pay = $hour_rate * $work_time*1.5;
}
echo "$work_time 시간 동안 일한 $day_night 급여는 $pay 원입니다.<br><br>";
 ?>

 <?php
 $month = 12;

 if($month>=3&&$month<=5){
   $season = '봄';
   echo "{$month}월은 {$season}입니다.<br><br>";
 }elseif ($month>=6&&$month<=8) {
   $season = '여름';
   echo "{$month}월은 {$season}입니다.<br><br>";
}elseif ($month>=9&&$month<=11) {
   $season = '가을';
   echo "{$month}월은 {$season}입니다.<br><br>";
}elseif ($month>=12||$month==1||$month==2) {
   $season = '겨울';
   echo "{$month}월은 {$season}입니다.<br><br>";
 }else {
   echo "입력 오류<br><br>";
 }
  ?>

  <?php
  $score = 90;
  echo "시험 점수 : {$score}점<br>";
  if ($score>=90&&$score<=100)
  echo "등급 : 수<br><br>";
  elseif($score>=80&&$score<=90)
  echo "등급 : 우<br><br>";
  elseif($score>=70&&$score<=80)
  echo "등급 : 미<br><br>";
  elseif($score>=60&&$score<=70)
  echo "등급 : 양<br><br>";
  elseif($score>=50&&$score<=60)
  echo "등급 : 가<br><br>";
  else
  echo "점수 입력 오류<br><br>";
   ?>

 <?php
 $buy = 80000;
 if ($buy>=10000&&$buy<=50000)
  $rate = 5.0;
 elseif($buy>=50000&&$buy<=300000)
  $rate = 7.5;
 elseif($buy>=300000)
  $rate = 10.0;
  else
  $rate = 0;

  $discount = $buy * $rate / 100;
  $pay = $buy - $discount;
  echo "구매액 : {$buy}원<br>";
  echo "할인율 : {$rate}%<br>";
  echo "할인금액 : {$discount}원<br>";
  echo "지불액 : {$pay}원<br><br>";
  ?>
  <?php
  $price = 30000;
  $service = "매우 만족";
  echo "서비스 만족도 : $service<br>";
  if($service=="매우 만족")
  $tip = $price * 0.2;
  elseif ($service=="만족")
  $tip = $price * 0.1;
  else
  $tip = $price * 0.05;

  echo "팁 : {$tip}원<br><br>";
   ?>
