<?php

function MakeTheForm($ValidationErrors) {
  if (isset($_POST['fName'])) {
    extract($_POST);
  } 
  else {
    //Set defaults
    $fName      = '';
    $lName      = '';
    $email      = '';
    $uname      = '';
    $street     = '';
    $city       = '';
    $state      = '';
    $zip        = '';
    $pass1      = '';
    $pass2      = '';
    $linuxLove  = '';
    $favDistro  = '';
    $distroUsed = '';
    $hatedDist  = '';
    $bio        = '';
  }

  // error symbol 
  $RedSplat = " <span class=\"Flag\">* </span> ";

  $TheForm = "<h3>Create an account and talk to other Linux enthusiest!</h3>";
  
    // first name
    if (isset($ValidationErrors['fName'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"fName\">$SplatSlug First Name:</label>
            <input class=\"form-control\" type=\"text\" name=\"fName\" id=\"fName\" value=\"$fName\"/></p><br /> \n";
  
    // last name
    if (isset($ValidationErrors['lName'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"lName\">$SplatSlug Last Name:</label>
            <input class=\"form-control\" type=\"text\" name=\"lName\" id=\"lName\" value=\"$lName\"/></p><br /> \n";
  
    // email
    if (isset($ValidationErrors['email'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "       <p><label class=\"col-sm-2 control-label\" for=\"email\">$SplatSlug Email:</label>
            <input class=\"form-control\" type=\"text\" name=\"email\" id=\"email\" value=\"$email\"/></p><br />  \n";
  
    // username
    if (isset($ValidationErrors['uName'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"uName\">$SplatSlug Username:</label>
            <input class=\"form-control\" type=\"text\" name=\"uName\" id=\"uName\" value=\"$uName\"/>
            </p>  <br />   \n";
  
    // password
    if (isset($ValidationErrors['pass1'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      
            <p><label class=\"col-sm-2 control-label\" for=\"pass1\">$SplatSlug Password:</label>
            <input class=\"form-control\" type=\"text\" name=\"pass1\" id=\"pass1\" value=\"$pass1\"/>
          </p><br /> \n";
    $TheForm .= "      
            <p><label class=\"col-sm-2 control-label\" for=\"pass2\">Password, again:</label>
            <input class=\"form-control\" type=\"text\" name=\"pass2\" id=\"pass2\" value=\"$pass2\"/>
          </p><br /> \n";

    // street
    if (isset($ValidationErrors['street'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"street\">$SplatSlug Street:</label>
            <input class=\"form-control\" type=\"text\" name=\"street\" id=\"street\" value=\"$street\"/>
            </p>  <br />   \n";
            
    // city
    if (isset($ValidationErrors['city'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"city\">$SplatSlug City:</label>
            <input class=\"form-control\" type=\"text\" name=\"city\" id=\"city\" value=\"$city\"/>
            </p>  <br />   \n";

    // state
    if (isset($ValidationErrors['state'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"uName\">$SplatSlug State:</label>
            <input class=\"form-control\" type=\"text\" name=\"state\" id=\"state\" value=\"$state\"/>
            </p>  <br />   \n";
    
    // zip 
    if (isset($ValidationErrors['zip'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
    $TheForm .= "      <p><label class=\"col-sm-2 control-label\" for=\"zip\">$SplatSlug Zip:</label>
            <input class=\"form-control\" type=\"text\" name=\"zip\" id=\"zip\" value=\"$zip\"/>
            </p>  <br />   \n";


  $TheForm .= "    <h3>Tell us about yourself!</h3>
    <br><br>\n";

  $distroFile = fopen('../distros','r');

  $favDistro= '';

  // distros used label
  $TheForm .= "       <label for=\"distroUsed\" class=\"form-control wide-label\">What distros have you used?</label>\n";

  // build check boxes
  while ($distro = fgets($distroFile)) {

    $distro= trim($distro);
    
    //Used to make id with no spaces so extract() will work 
    $distroNoSpaces = str_replace(' ','',$distro);  

    $TheForm .= "<input type=\"checkbox\" name=\"distrosUsed[]\" id=\"distroUsed\" value=\"$distro\" $CheckedSlug />$distro> ";

    if (isset($distrosUsed) and $distrosUsed != '' and in_array($distro, $distroUsed)) {
      $CheckedSlug = 'checked';
    } else {
      $CheckedSlug = '';
    }
  }
  

    // favorite distro label
    $favDistro .= "       <label for=\"favDistro\" class=\"form-control wide-label\">Favorite Distro</label>";

  // build check boxes
  while ($distro = fgets($distroFile)) {

  $TheForm .= "      <input type=\"radio\" name=\"favDistro\" id=\"favDistro\" value=\"$distro\" $CheckedSlug />$distro
       </label>";

    if (isset($favDistro) and $distro == $favDistro) {
      $CheckedSlug = 'checked';
    } else {
      $CheckedSlug = '';
    }
  }

  $TheForm .= "    </label></div>\n
      <div class=\"Row\">\n";

  // add bio to the form
  if (isset($ValidationErrors['bio'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "   <div class=\"Col-12 justify-content-center\">       
          <label for=\"bio\" class=\" WideLabel\">$SplatSlug Bio: </label>      
            <textarea name=\"bio\" id=\"bio\">$bio</textarea>
        </div>
        </div>
      <div class=\"Row\"><br />";

  //Hard coded small select for most hated distro
  if (isset($ValidationErrors['hatedDist'])) { $SplatSlug = $RedSplat; } else { $SplatSlug = ''; }
  $TheForm .= "
        <div class=\"Col-4 justify-content-center\">
           <label class=\"col-sm-2 control-label\" for=\"hatedDist\" class=\"WideLabel\">$SplatSlug Most hated distro?</label>
           <select name=\"hatedDist\" id=\"hatedDist\" size=\"5\">
 ";
  if ($hatedDistro == "Fedora") { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "            <option value=\"fedora\" $SelectedSlug>Fedora</option>\n";
  if ($MALeastFavoriteWeather == 'Debian') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Debian\" $SelectedSlug>Debian</option>\n";
  if ($MALeastFavoriteWeather == 'Arch') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Arch\" $SelectedSlug>Arch</option>\n";
  if ($MALeastFavoriteWeather == 'Ubuntu') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Ubuntu\" $SelectedSlug>Ubuntu</option>\n";
  if ($MALeastFavoriteWeather == 'Suse') { $SelectedSlug = "selected"; } else { $SelectedSlug = ''; }
  $TheForm .= "             <option value=\"Suse\" $SelectedSlug>Suse</option>";
  $TheForm .= "
           </select>
        </div>\n";

  //Multi-select using contents of text file with Options...
  $TheForm .= "
        <div class=\"Col-4 justify-content-center\">
          <label class=\"wide-label form-control\" for=\"languages\">Programming Languages known?<br />
          <span class=\"FinePrint\">(Ctrl-click for multiple)</span></label>
          <select name=\"languagesKnown[]\" id=\"languagesKnown\" size=\"12\" multiple>\n";

  $languageFile = fopen('../languages','r');

  // build language options
  while ($language = fgets($languageFile)) {
    $language = trim($language);

    if (isset($language) and $languages != '' and in_array($language, $languagesKnown)) { $SelectedSlug = 'selected'; } else { $SelectedSlug = ''; }
    $TheForm .= "             <option value=\"$language\" $SelectedSlug >$language</option>\n";
  }

  $TheForm .= "          </select>
        </div>\n";

  $TheForm .= "    </div>\n\n";
  return $TheForm;
}

//Mainline 
//Set if initially $PoppedUp or not, then track it, used to control Close Window button
if (!isset($_REQUEST['View'])) {
  $View = 'First';
} 
else {
  $View = $_REQUEST['View'];
}

// first time viewing today
if ($View == 'First') {
  //This is their first time at the page, explain stuff and make the form with empty $_POST...
  $UI = "  <h2>LinStall Forum Signup</h2>
   <form method=\"POST\" name=\"signup\" action=\"form.php\" onSubmit=\"return ValidateForm();\">\n";

  $UI .= MakeTheForm('');
  $UI .= " 
     <p>Click <input type=\"submit\" name=\"View\" value=\"Submit Form\"> to submit your completed form to LinStall.  </p>
     <p>Uncheck the box to disable JS ValidateForm: <input type=\"checkbox\" name=\"RunJS\" id=\"RunJS\" checked=\"checked\"></p>
     <p>Click <a href=\"#\" onClick=\"PopupAbout()\">About the Form</a> to pop up notes about the form, JavaScript, and PHP.</p>
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
  if (!isset($fName) or $fName == '') $ValidationErrors['fName'] = "Your first name is missing or empty. Please enter your name before clicking Submit.";

  // last name
  if (!isset($lName) or $lName == '') $ValidationErrors['lName'] = "Your last name is missing or empty.  Please enter your name before clicking Submit.";

  // email
  if (!isset($email) or $email == '') {
    $ValidationErrors['email'] = "The email address is empty.  Please enter your email address before clicking Submit.";
  }
  elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $ValidationErrors['email'] = "The email  is not a valid format.";
  }

  // zip
  if (!isset($zip) or strlen($zip) < 5) $ValidationErrors['zip'] = "Please enter your zip code.";

  // bio
  if (!isset($bio) or strlen($bio) < 50) $ValidationErrors['bio'] = "Please give a short description about yourself.";

  // hated distro
  if (!isset($hatedDist) or $hatedDist == '') {
    $_POST['hatedDist'] = '';
    $ValidationErrors['hatedDist'] = "Please select your least favorite distro.";
  }

  // favorite distro
  if (!isset($favDistro) or $favDistro== '') $ValidationErrors['favDistro'] = "Please select the distro you like the most.";

  // least favorite distro 
  if (!isset($hatedDist) or $hatedDist == '') $ValidationErrors['hatedDist'] = "You must select your least favorite distro.";

  // password
  if ((!isset($pass1) or $pass1  == '') or (!isset($pass2) or $pass2  == '')) {
    $ValidationErrors['pass1'] = "Enter your password twice, please.";
  }
  elseif ($pass1 != $pass1) {
    $ValidationErrors['pass1'] = "Passwords do not match.";
  }

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
  $UI .= "<form method=\"POST\" name=\"signup\" action=\"form.php\" onSubmit=\"return ValidateForm();\">\n";
  $UI .= "<h2>Linstall Account Creation</h2>\n";

  // append the js validator
  $UI .= MakeTheForm($ValidationErrors);
  $UI .= " <p>Run JS ValidateForm: <input type=\"checkbox\" name=\"RunJS\" id=\"RunJS\" checked=\"checked\">  Click <input type=\"submit\" name=\"View\" value=\"Submit Form\"> if changes have been made.  </p>
 </form>\n";
  
} 
// error figuring out the view
else {
  $UI = "<p>Somehow we don't know what your next view should be '$View' is not valid...</p>";
}

// assemble the dynamic content
$FormTemplate = file_get_contents('template.html');
$FormTemplate = str_replace('[[[DynamicContent]]]', $UI, $FormTemplate);
echo $FormTemplate;
exit;

?>
