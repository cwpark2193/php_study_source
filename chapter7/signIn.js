let $name,$name_exp,$birth_year,$birth_year_exp,$birth_month,$birth_month_exp,$birth_day,$birth_day_exp,$year,
$password,$password_exp,$email,$email_exp,$call_number,$call_number_one,$call_number_two,$call_number_one_exp,
$call_number_two_exp,$home_number_one,$home_number_two,$home_number_one_exp,$home_number_two_exp,$address,
$address_detail,$status,$root;
let id_pass=0;
$(document).ready(function() {
  $("#double_check").click(function(){
    //아이디
    $id = $("#sign_id").val();
    $id_exp= /[\w\W]{6,12}$/;
    if($id.match($id_exp)){
      if($id==="cwpark2193"){
        alert("중복된 아이디입니다.");
      }else{
        alert("사용가능한 아이디입니다.");
        id_pass=1;
      }
    }else{
      alert("적합하지 않은 아이디입니다. 다시 입력해주세요.");
    }
  });
  $("input:radio[name=root]").click(function(){
    if($("input:radio[name=root]:checked").val()==='etc'){
      $("#etc_reason").attr("disabled",false).attr("readonly",false);
    }else{
      $("#etc_reason").val(null);
      $("#etc_reason").attr("disabled",true).attr("readonly",true);
    }
  })
  $("#sign_in").click(function(){
    //이름
    $name = $("#name").val();
    $name_exp = /^[가-힣]{2,4}|[a-zA-z]{7,15}$/;
    //생일
    $birth_year = $("#birth_year").val();
    $birth_year_exp = /^19[0-9]{2}|20[0-1]{1}[0-9]{1}$/;
    // $birth_year_exp = /^[1]{1}[9]{1}[0-9]{2}|[2]{1}[0]{1}[0-1]{1}[0-9]{1}$/;
    $birth_month = $("#birth_month").val();
    $birth_month_exp = /^0[0-9]{1}|1[0-2]{1}$/;
    // $birth_month_exp = /^[0]{1}[0-9]{1}|[1]{1}[0-2]{1}$/;
    $birth_day = $("#birth_day").val();
    $birth_day_exp = /^[0-2]{1}[0-9]{1}|[3]{1}[0-1]{1}$/;
    $year = $("input:radio[name=year]").val();
    //아이디
    $id = $("#sign_id").val();
    $id_exp= /[\w\W]{6,12}$/;
    //비번
    $password = $("#sign_password").val();
    $password_check = $("#sign_password_check").val();
    $password_exp= /[\w\W]{8,12}$/;
    //이메일
    $email = $("#email").val();
    $email_exp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
    //전화번호
    $call_number = $("select[name=call_number]").val();
    $call_number_one = $("input:text[name=call_number_one]").val();
    $call_number_two = $("input:text[name=call_number_two]").val();
    $call_number_one_exp = /^[0-9]{3}|[0-9]{4}$/;
    $call_number_two_exp = /^[0-9]{4}$/;
    //주소
    $home_number_one = $("input:text[name=home_number_one]").val();
    $home_number_two = $("input:text[name=home_number_two]").val();
    $home_number_one_exp = /^[0-9]{2}$/;
    $home_number_two_exp = /^[0-9]{3}$/;
    $address = $("#address").val();
    // let $address_exp = /^(([\\x{ac00}-\\x{d7af}]|(\\d{1,5}(~|-)\\d{1,5})|\\d{1,5})+(\uB85C|\uAE38))$/;
    $address_detail = $("#address_detail").val();
    // let $address_detail_exp =/^[0-9]{3}$/;
    //직업
    $status = $("select[name=status]").val();
    //경로
    $root = $("input:radio[name=root]").val();

    // if($call_number.match($name_exp)){
    //   console.log("9 패스");
    // }else{
    //   console.log("9 걸림");
    // }

    if(($name.match($name_exp))&&($birth_year.match($birth_year_exp))&&($birth_month.match($birth_month_exp))
    &&($birth_day.match($birth_day_exp))&&(($year==='solar')||($year==='luna'))&&($id.match($id_exp))&&(id_pass === 1)
    &&($password.match($password_exp))&&($password_check.match($password_exp))&&($password === $password_check)
    &&($email.match($email_exp))
    &&($call_number_one.match($call_number_one_exp))&&($call_number_two.match($call_number_two_exp))
    &&($home_number_one.match($home_number_one_exp))&&($home_number_two.match($home_number_two_exp))
    &&($address !== null)&&($address_detail !== null)&&($status !== null)&&($root !== null)){
      alert("회원가입에 성공하셨습니다.");
      // window.open("./login.html","_self",true);
    }else{
      alert("회원가입 실패");
    }
  });
  $("#back_to_login").click(function(){
    window.open("./login.html","_self",true);
  });
});
