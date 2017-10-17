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
  //if (document.signup.lName.value == '')                                    
  //{                                                                         
  // test alert got this far                                                  
    //ValidationErrors += 'Last name is required!' + Crlf;                    
  //}                                                                         

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
        // works                                                              

  // uname                                                                    
  if (document.signup.uName.value == '')                                      
  {                                                                           
    ValidationErrors += 'Username is required!' + CrLf;                       
  }                                                                           

  // street                                                                   
  if (document.signup.street.value == '')                                     
  {                                                                           
    ValidationErrors += 'Street is required!' + CrLf;                         
  }                                                                           

  // city                                                                     
  if (document.signup.city.value == '')                                       
  {                                                                           
    ValidationErrors += 'City is required!' + CrLf;                           
  }                                                                           

  // state                                                                    
  if (document.signup.state.value == '')                                      
  {                                                                           
    ValidationErrors += 'State is required!' + CrLf;                          
  }                                                                           

  // zip                                                                      
  if (document.signup.zip.value == '')                                        
  {                                                                           
    ValidationErrors += 'Zip is required!' + CrLf;                            
  }                                                                           

  // used distro                                                          
  if (document.signup.favDistro.value == '')                                  
  {                                                                           
    ValidationErrors += 'Your favorite distro is required!' + CrLf;           
  }                                                                           

  // favorite distro                                                          
  if (document.signup.favDistro.value == '')                                  
  {                                                                           
    ValidationErrors += 'Your favorite distro is required!' + CrLf;           
  }                                                                           

  // hated distro                                                          
  if (document.signup.favDistro.value == '')                                  
  {                                                                           
    ValidationErrors += 'You must enter a distro you hate!!' + CrLf;           
  }                                                                           

  // languages known
  if (document.signup.languagesKnown.value == '')                                  
  {                                                                           
    ValidationErrors += 'How do you expect to eat your puddin\' if you don\'t learn to code' + CrLf;           
  }                                                                           

  //alert(ValidationErrors);                                                    

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
