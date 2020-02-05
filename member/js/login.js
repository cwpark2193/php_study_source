function login_start(){
  var id = document.getElementById("login_id").value;
  var id_exp= /[\w\W]{6,12}$/;
  var password = document.getElementById("login_password").value;
  var password_exp= /[\w\W]{8,12}$/;
  var form = document.login_form;
  if((id==="") ||(password==="")){
    alert("아이디 또는 비밀번호를 입력하세요.")
  }else if(id.match(id_exp)&&password.match(password_exp)){
    form.submit();
  }else{
    alert("아이디 또는 비밀번호가 맞는 자리수가 아닙니다. 다시 설정하세요.");
  }
}
