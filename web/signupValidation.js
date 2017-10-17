// modified example to meet my use case

function ValidateForm() {

  // verify validaiton is required
  if (! document.signup.RunJS.checked) {
    return true;
  }

  alert("It works!");

  var ValidationErrors = '';
  var CrLf = "\r\n\r\n";

  // first name
  if (document.signup.fName.value == '') { 
    ValidationErrors += 'First name is required!' + CrLf;
  }

  // last name
  if (document.signup.lName.value == '') {
    ValidationErrors += 'Last name is required!' + Crlf;
  }

  // email
  if (document.signup.email.value == '') {
    ValidationErrors += 'Email is required!' + CrLf;
  }

  // street
  if (document.signup.street.value == '') {
    ValidationErrors += 'Street address is required!' + Crlf;
  }

  // city
  if (document.signup.city.value == '') {
    ValidationErrors += 'We want to know where you live!' + Crlf;
  }

  // state
  if (document.signup.state.value == '') {
    ValidationErrors += 'We want to know what state we can find you in!' + Crlf;
  }
    
  // username 
  if (document.signup.uName.value == '') {
    ValidationErrors += 'You need to pick a username!' + Crlf;
  }

  // password
  if ((document.signup.pass1.value == '') || (document.signup.pass2.value == '')) {
    ValidationErrors += 'Please enter your password, twice.' + CrLf;
  } else if (document.signup.MAPass1.value != document.signup.MAPass2.value) {
    ValidationErrors += 'Passwords entered are not the same.' + CrLf;
  }

  // return true if no error otherwise false
  if (ValidationErrors == '') {
    return true;
  } else {
    alert(ValidationErrors);
    return false;
  }
}
