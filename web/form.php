<?php

function MakeTheForm($ValidationErrors) 
{
  if (isset($_POST['fName'])) 
  {
    extract($_POST);
  } 
  else 
  {
    //Set defaults
    $fName          = '';
    $lName          = '';
    $email          = '';
    $uname          = '';
    $street         = '';
    $city           = '';
    $state          = '';
    $zip            = '';
    $pass1          = '';
    $pass2          = '';
    $favDistro      = '';
    $distroUsed     = '';
    $hatedDist      = '';
    $bio            = '';
    $languagesKnown = '';
  }

  // error symbol 
  $RedSplat = " <span class=\"Flag\">* </span> ";

  $TheForm = "<h3>Create an account and talk to other Linux enthusiest!</h3>";
  
    // first name
    if (isset($ValidationErrors['fName'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"fName\">$SplatSlug First Name:</label>
            <input class=\"form-control\" type=\"text\" name=\"fName\" id=\"fName\" value=\"$fName\"/></p><br /> \n";
  
    // last name
    if (isset($ValidationErrors['lName'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"lName\">$SplatSlug Last Name:</label>
            <input class=\"form-control\" type=\"text\" name=\"lName\" id=\"lName\" value=\"$lName\"/></p><br /> \n";
  
    // email
    if (isset($ValidationErrors['email'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "       <p><label class=\"col-sm-5 control-label\" for=\"email\">$SplatSlug Email:</label>
            <input class=\"form-control\" type=\"text\" name=\"email\" id=\"email\" value=\"$email\"/></p><br />  \n";
  
    // username
    if (isset($ValidationErrors['uName'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"uName\">$SplatSlug Username:</label>
            <input class=\"form-control\" type=\"text\" name=\"uName\" id=\"uName\" value=\"$uName\"/>
            </p>  <br />   \n";
  
    // password
    if (isset($ValidationErrors['pass1'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      
            <p><label class=\"col-sm-5 control-label\" for=\"pass1\">$SplatSlug Password:</label>
            <input class=\"form-control\" type=\"text\" name=\"pass1\" id=\"pass1\" value=\"$pass1\"/>
          </p><br /> \n";
    $TheForm .= "      
            <p><label class=\"col-sm-5 control-label\" for=\"pass2\">Password, again:</label>
            <input class=\"form-control\" type=\"text\" name=\"pass2\" id=\"pass2\" value=\"$pass2\"/>
          </p><br /> \n";

    // street
    if (isset($ValidationErrors['street'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"street\">$SplatSlug Street:</label>
            <input class=\"form-control\" type=\"text\" name=\"street\" id=\"street\" value=\"$street\"/>
            </p>  <br />   \n";
            
    // city
    if (isset($ValidationErrors['city'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"city\">$SplatSlug City:</label>
            <input class=\"form-control\" type=\"text\" name=\"city\" id=\"city\" value=\"$city\"/>
            </p>  <br />   \n";

    // state
    if (isset($ValidationErrors['state'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"uName\">$SplatSlug State:</label>
            <input class=\"form-control\" type=\"text\" name=\"state\" id=\"state\" value=\"$state\"/>
            </p>  <br />   \n";
    
    // zip 
    if (isset($ValidationErrors['zip'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-5 control-label\" for=\"zip\">$SplatSlug Zip:</label>
            <input class=\"form-control\" type=\"text\" name=\"zip\" id=\"zip\" value=\"$zip\"/>
            </p>  <br />   \n";


  $TheForm .= "    <h3>Tell us about yourself!</h3>
    <br><br>\n";

  $distroFile = fopen('../distros','r');

  // distros used label
  if (isset($ValidationErrors['distroUsed'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "       <div class=\"justify-content-center\">
          <label for=\"distroUsed\" class=\"wide-label\"> $SplatSlug What distros have you used?</label>\n
          <div class=\"form-control\">";

  // build check boxes
  while ($distro = fgets($distroFile)) 
  {

    $distro = trim($distro);
    
    //Used to make id with no spaces so extract() will work 
    $distroNoSpaces = str_replace(' ','',$distro);  

    // [] at the end of distroUsed
    $TheForm .= "<input type=\"checkbox\" name=\"distroUsed\" id=\"distroNoSpaces\" value=\"$distro\"/> $CheckedSlug $distro ";

    if (isset($distroUsed) and $distroUsed != '' and in_array($distro, $distroUsed)) 
    {
      $CheckedSlug = 'checked';
    } 
    else 
    {
      $CheckedSlug = '';
    }
  }
  
  // reopen file for parsing 
  $distroFile = fopen('../distros','r');

  // favorite distro label
  if (isset($ValidationErrors['favDistro'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "\n</div>\n</div\n><br>
          <div class=\"justify-content-center\">\n
            <label for=\"favDistro\" class=\" wide-label\">$SplatSlug Favorite Distro</label>\n
            <div class=\"form-control\">";

  // build favDistro check boxes
  while ($distro = fgets($distroFile)) 
  {
    $distro= trim($distro);
    
    //Used to make id with no spaces so extract() will work 
    $distroNoSpaces = str_replace(' ','',$distro);  

    $TheForm .= "<input type=\"radio\" name=\"favDistro\" id=\"distroNoSpaces\" value=\"$distro\"> $CheckedSlug $distro ";

    if (isset($distroNoSpaces) and $distroNoSpaces == $distro) 
    {
      $CheckedSlug = 'checked';
    } 
    else 
    {
      $CheckedSlug = '';
    }
  }

  $TheForm .= "    </div></div><br><br>\n";

  // add bio to the form
  if (isset($ValidationErrors['bio'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "   <div class=\"justify-content-center\">       
          <label for=\"bio\" class=\" WideLabel\">$SplatSlug Bio</label>      
          <br>
          <div class=\"form-control\">
            <textarea name=\"bio\" id=\"bio\">$bio</textarea>
          </div>
        </div>
      <div class=\"container\"><br />";

  //Hard coded small select for most hated distro
  if (isset($ValidationErrors['hatedDist'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "
        <div class=\"Col-4 justify-content-center\">
           <label for=\"hatedDist\" class=\"WideLabel control-label\">$SplatSlug Most hated distro?</label>
           <div class=\"form-control\">
           <select name=\"hatedDist\" id=\"hatedDist\" size=\"5\">
 ";
  if ($hatedDistro == "Fedora") { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "            <option value=\"fedora\" $SelectedSlug>Fedora</option>\n";
  if ($hatedDist == 'Debian') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Debian\" $SelectedSlug>Debian</option>\n";
  if ($hatedDist == 'Arch') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Arch\" $SelectedSlug>Arch</option>\n";
  if ($hatedDist == 'Ubuntu') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Ubuntu\" $SelectedSlug>Ubuntu</option>\n";
  if ($hatedDist == 'Suse') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Suse\" $SelectedSlug>Suse</option>";
  $TheForm .= "
           </select>
           </div>
        </div>\n";

  //Multi-select using contents of text file with Options...
  if (isset($ValidationErrors['languagesKnown'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "
        <div class=\"Col-4 justify-content-center\">
          <label class=\"sm-col-4\" for=\"languages\">$SplatSlug Programming Languages known?<br />
          <span class=\"FinePrint\">(Ctrl-click for multiple)</span></label>
          <select name=\"languagesKnown[]\" id=\"languagesKnown\" size=\"12\" multiple>\n";

  $languageFile = fopen('../languages','r');

  // build language options
  while ($language = fgets($languageFile)) 
  {

    $language = trim($language);

    if (isset($languagesKnown) and $languagesKnown != '' and in_array($language, $languagesKnown)) { $SelectedSlug = 'selected'; } else { $SelectedSlug = ''; }

    $TheForm .= "             <option value=\"$language\">$SelectedSlug $language</option>\n";
  }

  $TheForm .= "          </select>
        </div>\n";

  $TheForm .= "    </div><br><br>\n\n";
  return $TheForm;
}

//Mainline 
//Set if initially visited or not, then track it, used to control Close Window button
if (!isset($_REQUEST['View'])) {
  $View = 'First';
} 
else 
{
  $View = $_REQUEST['View'];
}

// first time viewing today
if ($View == 'First') 
{
  $UI = "  <h2>LinStall Forum Signup</h2>
   <form method=\"POST\" name=\"signup\" action=\"form.php\" onSubmit=\"return ValidateForm();\">\n";

  $UI .= MakeTheForm('');
  $UI .= " 
     <p>Click <input type=\"submit\" name=\"View\" value=\"Submit Form\"> to submit your completed form to LinStall.  </p>
     <p>Uncheck the box to disable JS ValidateForm: <input type=\"checkbox\" name=\"RunJS\" id=\"RunJS\" checked=\"checked\"></p>
</form>";
} 
// submitting the form
elseif ($View == 'Submit Form') {
  //They've filled in the form and clicked the Submit button, should be error free unless they've disabled JavaScript
  //on their browser or the content is submitted by a bot.  

  $ValidationErrors = '';
  extract($_POST);


  //Validate what came back.

  // first name
  if (!isset($fName) or $fName == '') $ValidationErrors['fName'] = "Please enter your first name.";

  // last name
  if (!isset($lName) or $lName == '') $ValidationErrors['lName'] = "Please enter your first name.";

  // email
  if (!isset($email) or $email == '') 
  {
    $ValidationErrors['email'] = "Enter your email address.";
  }
  elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
  {
    $ValidationErrors['email'] = "The email  is not a valid format.";
  }

  // password
  if ((!isset($pass1) or $pass1  == '') or (!isset($pass2) or $pass2  == '')) 
  {
    $ValidationErrors['pass1'] = "Enter your password twice, please.";
  }
  elseif ($pass1 != $pass1) {
    $ValidationErrors['pass1'] = "Passwords do not match.";
  }

  // username
  if (!isset($uName) or $uName== '') $ValidationErrors['uName'] = "Please enter your desired username.";

  // street
  if (!isset($street) or $street == '') $ValidationErrors['street'] = "Please enter your street address.";

  // city 
  if (!isset($city) or $city == '') $ValidationErrors['city'] = "Please enter the city where you live.";

  // zip
  if (!isset($zip) or strlen($zip) < 5) $ValidationErrors['zip'] = "Please enter your zip code.";

  // bio
  if (!isset($bio) or strlen($bio) > 50) $ValidationErrors['bio'] = "Please give a short description about yourself.";

  // hated distro
  if (!isset($hatedDist) or $hatedDist == '') {
    $_POST['hatedDist'] = '';
    $ValidationErrors['hatedDist'] = "Please select your least favorite distro.";
  }

  // favorite distro
  if (!isset($favDistro) or $favDistro== '') $ValidationErrors['favDistro'] = "Please select the distro you like the most.";

  // least favorite distro 
  if (!isset($hatedDist) or $hatedDist == '') $ValidationErrors['hatedDist'] = "You must select your least favorite distro.";

  // languages known
  if (!isset($languagesKnown) or $languagesKnown == '') $ValidationErrors['languagesKnown'] = "You need to learn a language, pick one you are interested in!";

  // error output
  $UI = '';
  if (is_array($ValidationErrors)) {
    $ErrorCount = count($ValidationErrors);

    if ($ErrorCount == 1) {
      $UI .= "<p>Please correct this error, then click Submit Form:</p>\n";
    }
    else {
      $UI .= "<p>Please correct $ErrorCount errors, then click Submit Form:</p>\n";
    }

    $UI .= "<ul>\n";
    foreach ($ValidationErrors as $AnErrorMessage) {
      $UI .= "   <li>$AnErrorMessage</li>\n ";
    }
    $UI .= "</ul>\n";
  } 
  else {
    $UI .= "<p>Your form appears correct and would have been applied to the database
    if we felt like it.  You're welcome to make any corrections that might be 
    needed click Submit Form...</p>";
  }

  // build form tags
  $UI .= "<form method=\"POST\" id=\"singup\" name=\"signup\" action=\"form.php\" onSubmit=\"return ValidateForm();\">\n";
  $UI .= "<h2>Linstall Account Creation</h2>\n";

  // append the js validator
  $UI .= MakeTheForm($ValidationErrors);
  $UI .= " <p>Run JS ValidateForm: <input type=\"checkbox\" name=\"RunJS\" id=\"RunJS\" checked=\"checked\">  Click <input type=\"submit\" name=\"View\" value=\"Submit Form\"> if changes have been made.  </p>
 </form>\n";
  
} 
else {
// error figuring out the view
  $UI = "<p>Somehow we don't know what your next view should be '$View' is not valid...</p>";
}

// assemble the dynamic content
$FormTemplate = file_get_contents('template.html');
$FormTemplate = str_replace('[[[DynamicContent]]]', $UI, $FormTemplate);
echo $FormTemplate;
exit;

?>
