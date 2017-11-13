<?php
require(dirname(pathinfo(__FILE__, PATHINFO_DIRNAME)) . "/SiteSettings.php" );
//AllowLoggedIn();
if (isset($_SESSION['ControllerMsg'])) {
  $MsgSlug = "<p>" .$_SESSION['ControllerMsg']."</p>\n";
  unset($_SESSION['ControllerMsg']);
} else {
  $MsgSlug = '';
}
$TheForm = "
$MsgSlug
<main class=\"Row\">
  <div class=\"Col-6\">
    <h2>Menu</h2>
    <ul>
      <li><a href=\"index.html\">Home Page</a></li>
      <li><a href=\"form.php\">Membership Application</a></li>
   </ul>
  </div>
  <div class=\"Col-6\">
   <h2>LinStall Reports</h2>
    <ul>
      <li><a href=\"linStallReports.php?View=TopTen\">Top Ten Sales</a></li>
      <li><a href=\"linStallReports.php?View=ByRegion\">Sales by Region</a></li>
      <li><a href=\"linStallReports.php?View=SelectRegion\">Details for Selected Region</a></li>
    </ul>
  </div>
</main>
";
$FormTemplate = file_get_contents('template.html');
//$FormTemplate = str_replace('[[[LoginAdvice]]]', LoginAdvice(''), $FormTemplate);
$FormTemplate = str_replace('[[[DynamicContent]]]', $TheForm, $FormTemplate);
echo $FormTemplate;
exit;
?>
