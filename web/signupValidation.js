// modified example to meet my use case

function ValidateForm() 
{

  // verify validaiton is required
  if (! document.signup.RunJS.checked) 
  {
    return true;
  }

  var ValidationErrors = '';
  var CrLf = "\r\n\r\n";

  // first name
  if (document.signup.fName.value == '') 
  { 
    ValidationErrors += 'First name is required!' + CrLf;
  }
  

  // last name
  if (document.signup.lName.value == '') 
  {
  // test alert got this far
    ValidationErrors += 'Last name is required!' + Crlf;
    // second test spot
    alert(ValidationErrors);
  }
    
  // alert failed here

  // email
  if (document.signup.email.value == '') 
  {
    ValidationErrors += 'Email is required!' + CrLf;
  }
    
  // test failed here

  // password
  if ((document.signup.pass1.value == '') || (document.signup.pass2.value == '')) 
  {
    ValidationErrors += 'Please enter your password, twice.' + CrLf;
  } 
  else if (document.signup.MAPass1.value != document.signup.MAPass2.value) 
  {
    ValidationErrors += 'Passwords entered are not the same.' + CrLf;
  }

  // uname
  if (document.signup.uName.value == '') 
  {
    ValidationErrors += 'Username is required!' + CrLf;
  }
    
  // street
  if (document.signup.street.value == '') 
  {
    ValidationErrors += 'Street address is required!' + Crlf;
  }

  // city
  if (document.signup.city.value == '') 
  {
    ValidationErrors += 'We want to know where you live!' + Crlf;
  }

  // state
  if (document.signup.state.value == '') 
  {
    ValidationErrors += 'We want to know what state we can find you in!' + Crlf;
  }
    
  // favorite distro
  if (document.signup.favDistro.value == '')
  {
    ValidationErrors += 'We need to know what your favorite Linux distrobution!' + Crlf;
  }

  // distros used
  if (document.signup.distroUsed.value == '')
  {
    ValidationErrors += 'Have you even used linux before?' + Crlf;
  }

  // hated distro
  if (document.signup.hatedDist.value == '')
  {
    ValidationErrors += 'I guess you like Tux too much to hate Linux!'+ Crlf;
  }

  // bio
  if (document.signup.bio.value == '')
  {
    ValidationErrors += 'Everyone one has a story, but summarize your\'s in 50 char or less' + Crlf;
  }
  
  // return true if no error otherwise false
  if (ValidationErrors == '') 
  {
    return true;
  } 
  else 
  {
    alert(ValidationErrors);
    return false;
  }
}
