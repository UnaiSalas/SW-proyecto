
function validar_email(email) {

    var expresion_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  
    if (email.value.match(expresion_email)) {
  
      alert("Valid email address!");
  
      return true;
  
    } else {
  
      alert("Invalid email address!");
  
  
      return false;
  
    }
  
  }