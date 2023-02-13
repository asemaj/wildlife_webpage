
var form = document.getElementById('submit_form');
form.addeventListener('submit', event => {
    event.preventDefault();
});

function validatePassword() {
  let error_message_minChar = document.getElementById("min_char");
  let error_message_minNum = document.getElementById("min_num");
  let error_message_specialChar = document.getElementById("special_char");
  let check_mark = document.getElementById("password_CheckMark");
  var x = document.getElementById("password1").value;
  var y = x.search(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/);
    if (y !== -1){
      check_mark.style.opacity ='1';
      check_mark.style.color = "green";
      document.getElementById("password1").style.border = "3px solid green";
      return true;
    } else if (y == -1) {
      check_mark.style.opacity ='1';
      check_mark.style.color = "red";
      document.getElementById("password1").style.border = "2px solid red";

      if(x.search(/^[A-Za-z\d@$!%*?&]{8,}/) == -1){
        error_message_minChar.style.display = "block";
      }else{
        error_message_minChar.style.display = "none";
      }
      if(x.search(/[@$!%*?&]/) == -1){
        error_message_specialChar.style.display = "block";
      }else{
        error_message_specialChar.style.display = "none";
      }
      if(x.search(/[0-9]/) == -1){
        error_message_minNum.style.display = "block";
      }else{
        error_message_minNum.style.display = "none";
      }
      return false;
    }
  }

  function confirm_password(){
    var error_message_match_pass = document.getElementById("confirm_password");
    let check_mark_confirm = document.getElementById("password_confirm_CheckMark");
    var pass1 = document.getElementById("password1").value;
    var pass2 = document.getElementById("password2").value;
    if(pass1 != pass2){
      error_message_match_pass.style.display = "none";
      check_mark_confirm.style.display = "block";
      check_mark_confirm.style.color = "red";
      document.getElementById("password2").style.border = "2px solid red";
      return false;
    }
    else {
      error_message_match_pass.style.display = "none";
      check_mark_confirm.style.display = "block";
      check_mark_confirm.style.color = "green";
      document.getElementById("password2").style.border = "2px solid green";
      return true;
    }
  }

  function check_input(){
    var first_name = document.getElementById("fname");
    var last_name = document.getElementById("lname");
    var check_mark1 = document.getElementById("fname_CheckMark");
    var check_mark2 = document.getElementById("lname_CheckMark");
    val = false;

    first_name.addeventListener("onclick", function(){
      if(first_name.value == "" ){  
        first_name.style.border = "3px solid red";
        check_mark1.style.color = "red"
        val = false;
      }
      else{
        first_name.style.border = "3px solid green";
        check_mark1.style.color = "green"
        val = true;
      }
      if(last_name.value == ""){ 
        last_name.style.border = "3px solid red";
        check_mark2.style.color = "red"
        val = false;
      }else{
        last_name.style.border = "3px solid green";
        check_mark2.style.color = "green"
        val = true;
      }
      return val;
    });
  }

  function email_validation(){
    var email = document.getElementById("email").value;
    var y = email.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)
    if(email === ""){
      document.getElementById("email_alert").innerHTML = "Please enter an email"
    }
    else if(y == -1){
      error_message_specialChar.innerHTML.style.display = "block";
    }
    else if(y !== -1){
      alert("success");
    }
  }
function Tos(){
  var test1 = document.getElementById("tos2_check");
    if(!test1.checked){
        alert("please accept the terms of service to proceed")
        return false;
    }
    else{
        return true;
    }
}


function validation_test(e){
  if(validatePassword() == false){
    e.preventDefault();
  }
  if(Tos() == false){
    e.preventDefault();
  }
  if(confirm_password() == false){
    e.preventDefault();
  }
  if(check_input() == false){
    e.preventDefault();
  }
}



  
