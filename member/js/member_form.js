//모든 자료가 로드가 되면 자동으로 이 함수를 실행
$(document).ready(function(){
  var sign_id = $("#sign_id"),idSubMsg = $("#idSubMsg");
  $("#sign_id").blur(function(){
    var idValue = sign_id.val();
    var exp = /^[a-zA-z0-9]{6,12}$/;
    if(idValue === ""){
      idSubMsg.html("<span style='color : red'>아이디 입력 요망</span>");
    }else if (!exp.test(idValue)) {
      idSubMsg.html("<span style='color : red'>형식 안 맞습니다.</span>");
    }else{
      //여기가 ajax 처리 부분
      $.ajax({
        url: './member_check_id.php',
        type : 'POST',
        data : {"sign_id": idValue},
        success: function(data){
          if(data === "1"){
            idSubMsg.html("<span style='color : red'>중복된 아이디. 다시 입력 요망</span>");
          }else if (data ==="0") {
            idSubMsg.html("<span style='color : green'>사용 가능 아이디</span>");
          }else{
            idSubMsg.html("<span style='color : red'>심각한 오류</span>");
          }
        }
      })
      .done(function(){
        console.log("success");
      })
      .fail(function(){
        console.log("error");
      })
      .always(function(){
        console.log("complete");
      });
    }
  });//innerblur
});//document.ready
